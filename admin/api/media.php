<?php
header('Content-Type: application/json');
require_once '../includes/functions.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'fetch':
        try {
            // Clear any previous output (whitespaces, notices) to ensure clean JSON
            if (ob_get_length()) ob_clean();
            
            // Proactive check if table exists
            $tableCheck = $pdo->query("SHOW TABLES LIKE 'media'");
            if ($tableCheck->rowCount() == 0) {
                echo json_encode(['success' => false, 'message' => 'Media table missing. Please run admin/setup_media.php']);
                exit;
            }

            // Pagination
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 12;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            // Total count for pagination UI
            $totalStmt = $pdo->query("SELECT COUNT(*) FROM media");
            $total = $totalStmt->fetchColumn();

            $stmt = $pdo->prepare("SELECT * FROM media ORDER BY id DESC LIMIT ? OFFSET ?");
            $stmt->execute([$limit, $offset]);
            $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode([
                'success' => true, 
                'data' => $media,
                'pagination' => [
                    'total' => (int)$total,
                    'limit' => $limit,
                    'page' => $page,
                    'pages' => ceil($total / $limit)
                ]
            ]);
        } catch (PDOException $e) {
            if (ob_get_length()) ob_clean();
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        break;

    case 'upload':
        if (!isset($_FILES['files'])) {
            echo json_encode(['success' => false, 'message' => 'No files uploaded.']);
            exit;
        }

        $files = $_FILES['files'];
        // Incoming contexts
        $product_name = $_POST['product_name'] ?? 'media';
        $keyword = $_POST['keyword'] ?? 'viva';
        
        $uploaded = [];
        $errors = [];

        // Normalize files array if multiple
        $file_count = is_array($files['name']) ? count($files['name']) : 1;

        for ($i = 0; $i < $file_count; $i++) {
            $file = [
                'name' => is_array($files['name']) ? $files['name'][$i] : $files['name'],
                'type' => is_array($files['type']) ? $files['type'][$i] : $files['type'],
                'tmp_name' => is_array($files['tmp_name']) ? $files['tmp_name'][$i] : $files['tmp_name'],
                'error' => is_array($files['error']) ? $files['error'][$i] : $files['error'],
                'size' => is_array($files['size']) ? $files['size'][$i] : $files['size'],
            ];

            if ($file['error'] !== UPLOAD_ERR_OK) {
                $errors[] = "Error uploading " . $file['name'];
                continue;
            }

            // Custom upload logic for media library
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            if (!in_array($file['type'], $allowed_types)) {
                $errors[] = $file['name'] . " has an invalid file type.";
                continue;
            }

            // SEO Naming (lowercase, hyphens)
            $clean_name = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $product_name));
            $clean_keyword = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $keyword));
            
            // Check MD5 hash to prevent duplication of raw uploads
            $hash = md5_file($file['tmp_name']);
            $stmt = $pdo->prepare("SELECT id, file_path, alt_text FROM media WHERE hash = ?");
            $stmt->execute([$hash]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                $uploaded[] = [
                    'id' => $existing['id'],
                    'file_name' => basename($existing['file_path']),
                    'file_path' => $existing['file_path'],
                    'alt' => $existing['alt_text']
                ];
                continue;
            }

            // WEBP Conversion & Saving
            $target_dir = '../../uploads/media/';
            if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
            
            $new_filename = $clean_name . '-' . $clean_keyword . '-' . uniqid() . '.webp';
            $target_file = $target_dir . $new_filename;

            // GD Compression to WEBP
            $source_img = null;
            if (strpos($file['type'], 'png') !== false) {
                $source_img = @imagecreatefrompng($file['tmp_name']);
                if ($source_img) {
                    imagepalettetotruecolor($source_img);
                    imagealphablending($source_img, true);
                    imagesavealpha($source_img, true);
                }
            } elseif (strpos($file['type'], 'webp') !== false) {
                $source_img = @imagecreatefromwebp($file['tmp_name']);
            } else {
                $source_img = @imagecreatefromjpeg($file['tmp_name']);
            }

            $saved = false;
            if ($source_img) {
                $saved = imagewebp($source_img, $target_file, 80); // 80 quality highly compressed
                imagedestroy($source_img);
            } else {
                // Fallback to move if GD fails
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $new_filename = $clean_name . '-' . $clean_keyword . '-' . uniqid() . '.' . $ext;
                $target_file = $target_dir . $new_filename;
                $saved = move_uploaded_file($file['tmp_name'], $target_file);
            }

            if ($saved) {
                $file_path = 'uploads/media/' . $new_filename;
                $file_size = filesize($target_file);
                $alt_text = $product_name . " " . $keyword;
                $title = $product_name;
                
                // Save to DB
                $stmt = $pdo->prepare("INSERT INTO media (file_name, file_path, file_type, file_size, alt_text, title, hash) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$new_filename, $file_path, 'image/webp', $file_size, $alt_text, $title, $hash]);
                $new_id = $pdo->lastInsertId();
                
                $uploaded[] = [
                    'id' => $new_id,
                    'file_name' => $new_filename,
                    'file_path' => $file_path,
                    'alt' => $alt_text
                ];
            } else {
                $errors[] = "Failed to process " . $file['name'];
            }
        }

        echo json_encode([
            'success' => count($uploaded) > 0,
            'uploaded' => $uploaded,
            'errors' => $errors
        ]);
        break;

    case 'delete':
        $id = $_POST['id'] ?? null;
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'No ID provided.']);
            exit;
        }

        try {
            $stmt = $pdo->prepare("SELECT file_path FROM media WHERE id = ?");
            $stmt->execute([$id]);
            $item = $stmt->fetch();

            if ($item) {
                $full_path = '../../' . $item['file_path'];
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
                
                $stmt = $pdo->prepare("DELETE FROM media WHERE id = ?");
                $stmt->execute([$id]);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Media not found.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        break;

    case 'update_meta':
        $id = $_POST['id'] ?? null;
        if (!$id) { echo json_encode(['success'=>false]); exit; }
        
        $alt = $_POST['alt_text'] ?? '';
        $title = $_POST['title'] ?? '';
        $stmt = $pdo->prepare("UPDATE media SET alt_text = ?, title = ? WHERE id = ?");
        $stmt->execute([$alt, $title, $id]);
        echo json_encode(['success'=>true]);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        break;
}
