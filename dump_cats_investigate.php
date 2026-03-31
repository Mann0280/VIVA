<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->query("SELECT id, name, parent_id, status FROM categories ORDER BY name ASC");
echo "--- ALL CATEGORIES ---\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . " | Name: " . $row['name'] . " | Parent: " . ($row['parent_id'] ?? 'NULL') . " | Status: " . $row['status'] . "\n";
}
?>
