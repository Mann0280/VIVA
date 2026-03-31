<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
// Standardizing parent_id to NULL for top-level categories
$stmt = $pdo->prepare("UPDATE categories SET parent_id = NULL WHERE parent_id = '' OR parent_id = '0' OR CAST(parent_id AS CHAR) = '0'");
$stmt->execute();
echo "Updated " . $stmt->rowCount() . " categories to have NULL parent_id.\n";
?>
