<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->query("SELECT id, name, status, parent_id FROM categories");
while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $r['id'] . '|' . $r['name'] . '|' . $r['status'] . '|' . $r['parent_id'] . "\n";
}
?>
