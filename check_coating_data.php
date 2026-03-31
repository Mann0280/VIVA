<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = 23");
$stmt->execute();
$cat = $stmt->fetch(PDO::FETCH_ASSOC);
echo "--- CATEGORY 23 (COATING) ---\n";
print_r($cat);
?>
