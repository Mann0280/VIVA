<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("UPDATE categories SET status = 'active' WHERE status IS NULL OR status = ''");
$stmt->execute();
echo 'Updated ' . $stmt->rowCount() . ' category statuses to active.';
?>
