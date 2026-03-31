<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$res = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
echo "Total Categories: $res\n";

$stmt = $pdo->query("SELECT id, name, status FROM categories WHERE status != 'active'");
echo "\n--- INACTIVE CATEGORIES ---\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Name: {$row['name']} | Status: {$row['status']}\n";
}

$stmt = $pdo->query("SELECT id, name, status FROM categories WHERE name LIKE '%Coating%'");
echo "\n--- COATING CATEGORIES ---\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Name: {$row['name']} | Status: {$row['status']}\n";
}
?>
