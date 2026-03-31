<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

$output = "";

$output .= "=== ALL CATEGORIES ===\n";
$stmt = $pdo->query("SELECT id, name, slug, status, parent_id FROM categories ORDER BY id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $parent = $row['parent_id'] ? $row['parent_id'] : 'NULL';
    $output .= "ID:{$row['id']} | Parent:{$parent} | Status:{$row['status']} | Slug:{$row['slug']} | Name:{$row['name']}\n";
}

$output .= "\n=== ALL PRODUCTS ===\n";
$stmt = $pdo->query("SELECT id, name, slug, status, category_id FROM products ORDER BY id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $output .= "ID:{$row['id']} | CatID:{$row['category_id']} | Status:{$row['status']} | Slug:{$row['slug']} | Name:{$row['name']}\n";
}

file_put_contents('c:/xampp/htdocs/VIVA/db_state.txt', $output);
echo "Done. Written to db_state.txt\n";
?>
