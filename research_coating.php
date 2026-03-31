<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("SELECT * FROM categories WHERE name LIKE '%Coating%'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "--- CATEGORIES MATCHING 'Coating' ---\n";
print_r($results);

$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE '%Coating%'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "\n--- PRODUCTS MATCHING 'Coating' ---\n";
print_r($results);
?>
