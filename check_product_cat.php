<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

echo "--- PRODUCT 33 ---\n";
$stmt = $pdo->prepare("SELECT id, name, category_id, featured_image, tagline FROM products WHERE id = 33");
$stmt->execute();
print_r($stmt->fetch(PDO::FETCH_ASSOC));

echo "\n--- CATEGORY 6 ---\n";
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = 6");
$stmt->execute();
print_r($stmt->fetch(PDO::FETCH_ASSOC));
?>
