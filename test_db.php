<?php
require 'admin/includes/db.php'; 
$stmt = $pdo->query('SELECT id, name, image, gallery FROM products_backup_media LIMIT 3'); 
$backup = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query('SELECT id, featured_image, gallery_images FROM products LIMIT 3');
$current = $stmt2->fetchAll(PDO::FETCH_ASSOC);

file_put_contents('test_db_out.txt', print_r(['backup' => $backup, 'current' => $current], true));
