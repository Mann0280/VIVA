<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
// Force all categories to active status to ensure they appear in dropdowns
$stmt = $pdo->prepare("UPDATE categories SET status = 'active'");
$stmt->execute();
echo "Updated " . $stmt->rowCount() . " categories to active status.\n";
?>
