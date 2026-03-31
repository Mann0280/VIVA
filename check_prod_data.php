<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("SELECT id, name, category_id, featured_image FROM products WHERE id = 33");
$stmt->execute();
$prod = $stmt->fetch(PDO::FETCH_ASSOC);
echo "--- PRODUCT 33 ---\n";
print_r($prod);
?>
