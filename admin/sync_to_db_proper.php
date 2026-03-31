<?php
// C:\xampp\htdocs\VIVA\admin\sync_to_db_proper.php
require_once 'includes/db.php';
require_once 'includes/functions.php';

echo "<pre>";
echo "Starting Safe Image Migration...\n\n";

try {
    // 1. BACKUP TABLES
    echo "[1] Creating Database Backups...\n";
    $pdo->exec("CREATE TABLE IF NOT EXISTS products_backup_media AS SELECT * FROM products");
    echo "    ✔ products_backup_media created.\n";
    $pdo->exec("CREATE TABLE IF NOT EXISTS media_backup AS SELECT * FROM media");
    echo "    ✔ media_backup created.\n\n";

    // 2. SCHEMA MODIFICATIONS
    echo "[2] Updating Table Schemas...\n";
    $pdo->exec("CREATE TABLE IF NOT EXISTS `media` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `file_name` varchar(255) NOT NULL,
        `file_path` varchar(255) NOT NULL,
        `file_type` varchar(100) DEFAULT NULL,
        `file_size` int(11) DEFAULT NULL,
        `alt_text` varchar(255) DEFAULT NULL,
        `title` varchar(255) DEFAULT NULL,
        `hash` varchar(64) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    
    // Add hash column if missing to media
    $cols = $pdo->query("SHOW COLUMNS FROM media LIKE 'hash'")->fetchAll();
    if(empty($cols)) {
        $pdo->exec("ALTER TABLE media ADD COLUMN hash VARCHAR(64) DEFAULT NULL");
        echo "    ✔ Added 'hash' column to media table.\n";
    }

    $cols = $pdo->query("SHOW COLUMNS FROM media LIKE 'alt_text'")->fetchAll();
    if(empty($cols)) {
        $pdo->exec("ALTER TABLE media ADD COLUMN alt_text VARCHAR(255) DEFAULT NULL");
        $pdo->exec("ALTER TABLE media ADD COLUMN title VARCHAR(255) DEFAULT NULL");
        echo "    ✔ Added SEO columns to media table.\n";
    }

    // Modernize Products table
    $pcols = $pdo->query("SHOW COLUMNS FROM products LIKE 'featured_image'")->fetchAll();
    if(empty($pcols)) {
        $pdo->exec("ALTER TABLE products CHANGE COLUMN image featured_image VARCHAR(255) DEFAULT NULL");
        echo "    ✔ Renamed products.image to featured_image.\n";
    }
    
    $pcols = $pdo->query("SHOW COLUMNS FROM products LIKE 'gallery_images'")->fetchAll();
    if(empty($pcols)) {
        $pdo->exec("ALTER TABLE products CHANGE COLUMN gallery gallery_images TEXT DEFAULT NULL");
        echo "    ✔ Renamed products.gallery to gallery_images.\n";
    }
    echo "\n";

    // 3. HELPER FUNCTION TO INSERT/REUSE MEDIA
    function syncImageToMedia($pdo, $raw_path, $product_name = "") {
        // Clean path (remove leading slashes, handle VIVA prefix)
        $clean_path = ltrim($raw_path, '/');
        if(strpos($clean_path, 'VIVA/') === 0) {
            $clean_path = substr($clean_path, 5);
        }
        
        $full_path = '../' . $clean_path; // From admin context

        if (!file_exists($full_path)) {
            echo "    ❌ File not found physically: $full_path\n";
            return null; // Don't insert
        }

        // HASH CHECK (Duplicate Prevention)
        $hash = md5_file($full_path);
        
        $stmt = $pdo->prepare("SELECT id, file_path FROM media WHERE hash = ?");
        $stmt->execute([$hash]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            echo "    ✔ Reusing existing media (ID: {$existing['id']}) for $clean_path\n";
            return [
                'id' => $existing['id'],
                'path' => $existing['file_path'] // use the normalized path from DB
            ];
        }

        // Insert new entry
        $file_name = basename($clean_path);
        $file_size = filesize($full_path);
        $file_type = mime_content_type($full_path);
        $alt_text = $product_name . " Image";
        $title = $product_name;

        $insert = $pdo->prepare("INSERT INTO media (file_name, file_path, file_type, file_size, alt_text, title, hash) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$file_name, $clean_path, $file_type, $file_size, $alt_text, $title, $hash]);
        $new_id = $pdo->lastInsertId();

        echo "    ✔ Inserted new media (ID: $new_id) for $clean_path\n";

        return [
            'id' => $new_id,
            'path' => $clean_path
        ];
    }

    // 4. MIGRATING PRODUCTS
    echo "[3] Scanning Products Data...\n";
    $products = $pdo->query("SELECT id, name, featured_image, gallery_images FROM products")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $pid = $product['id'];
        $pname = $product['name'];
        echo "Processing Product #$pid: $pname\n";

        // Featured Image
        $new_featured_path = null;
        if (!empty($product['featured_image'])) {
            $media_res = syncImageToMedia($pdo, $product['featured_image'], $pname);
            if ($media_res) {
                // Keep the path logically so frontend doesn't break if it expects a path
                $new_featured_path = $media_res['path'];
            }
        }

        // Gallery Images
        $new_gallery_json = null;
        if (!empty($product['gallery_images'])) {
            // Check if already valid JSON (prevent double-migration)
            $decoded = json_decode($product['gallery_images'], true);
            if (is_array($decoded) && isset($decoded[0]['id'])) {
                echo "    ✔ Gallery is already in JSON format, skipping.\n";
                $new_gallery_json = $product['gallery_images'];
            } else {
                $raw_list = explode(',', $product['gallery_images']);
                $json_array = [];
                foreach ($raw_list as $img_path) {
                    $img_path = trim($img_path);
                    if ($img_path) {
                        $media_res = syncImageToMedia($pdo, $img_path, $pname);
                        if ($media_res) {
                            $json_array[] = [
                                'id' => (int)$media_res['id'],
                                'path' => $media_res['path']
                            ];
                        }
                    }
                }
                $new_gallery_json = !empty($json_array) ? json_encode($json_array) : null;
            }
        }

        // Update Product Record
        $update = $pdo->prepare("UPDATE products SET featured_image = ?, gallery_images = ? WHERE id = ?");
        $update->execute([$new_featured_path, $new_gallery_json, $pid]);
        echo "    ✔ Updated Product #$pid database record successfully.\n\n";
    }

    echo "===============================================\n";
    echo "MIGRATION COMPLETE!\n";
    echo "===============================================\n";
    echo "You may now safely view the unified Media Library.\n";

} catch (Exception $e) {
    echo "CRITICAL ERROR: " . $e->getMessage() . "\n";
}
echo "</pre>";
?>
