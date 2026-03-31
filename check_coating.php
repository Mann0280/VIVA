<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

echo "--- COATING CATEGORY CHECK ---\n";
$stmt = $pdo->query("SELECT id, name, status, parent_id FROM categories WHERE name LIKE '%Coating%'");
while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$r['id']} | Name: {$r['name']} | Status: {$r['status']} | Parent: {$r['parent_id']}\n";
    
    // Check if it's a child and find parent
    if ($r['parent_id']) {
        $stmt_p = $pdo->prepare("SELECT id, name, status FROM categories WHERE id = ?");
        $stmt_p->execute([$r['parent_id']]);
        $p = $stmt_p->fetch(PDO::FETCH_ASSOC);
        echo "  [PARENT] ID: {$p['id']} | Name: {$p['name']} | Status: {$p['status']}\n";
    }
}
?>
