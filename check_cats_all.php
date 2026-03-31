<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

echo "--- ALL CATEGORIES ---\n";
$stmt = $pdo->query("SELECT id, name, status, parent_id FROM categories");
while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$r['id']} | Name: {$r['name']} | Status: {$r['status']} | Parent: {$r['parent_id']}\n";
}
?>
