<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->query("SELECT id, name, status, parent_id FROM categories WHERE name LIKE '%Coating%'");
$found = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "--- COATING CATEGORIES ---\n";
print_r($found);

if (empty($found)) {
    echo "No categories found with 'Coating' in the name.\n";
}
?>
