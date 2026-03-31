<?php
require 'admin/includes/db.php'; 

$stmt = $pdo->query('SELECT id, image, gallery FROM products_backup_media');
$backups = $stmt->fetchAll(PDO::FETCH_ASSOC);

$updateStmt = $pdo->prepare('UPDATE products SET featured_image = ?, gallery_images = ? WHERE id = ?');

foreach ($backups as $row) {
    $gallery_images = '';
    
    if (!empty($row['gallery'])) {
        $paths = explode(',', $row['gallery']);
        $json_array = [];
        $id_counter = 5000;
        foreach ($paths as $path) {
            $path = trim($path);
            if ($path) {
                $json_array[] = [
                    'id' => $id_counter++,
                    'path' => $path,
                    'alt' => 'Gallery image'
                ];
            }
        }
        if (!empty($json_array)) {
            $gallery_images = json_encode($json_array);
        }
    }
    
    $updateStmt->execute([
        $row['image'],
        $gallery_images,
        $row['id']
    ]);
}

echo "Done restoring images properly!";
