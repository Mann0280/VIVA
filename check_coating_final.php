<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = 23");
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);
if ($r) {
    echo "--- CATEGORY 23 (COATING) ---\n";
    foreach($r as $k => $v) {
        echo "$k: $v\n";
    }
} else {
    echo "Category 23 not found.\n";
}
?>
