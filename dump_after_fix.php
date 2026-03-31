<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

$output = "";

$output .= "=== CATEGORIES (AFTER FIX) ===\n";
$stmt = $pdo->query("SELECT id, name, slug, status, parent_id FROM categories ORDER BY id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $parent = $row['parent_id'] ? $row['parent_id'] : 'NULL';
    $indent = '';
    if ($row['parent_id']) {
        $indent = '  ';
        $stmt2 = $pdo->prepare("SELECT parent_id FROM categories WHERE id = ?");
        $stmt2->execute([$row['parent_id']]);
        $pp = $stmt2->fetch(PDO::FETCH_ASSOC);
        if ($pp && $pp['parent_id']) $indent = '    ';
    }
    $output .= "{$indent}ID:{$row['id']} | Parent:{$parent} | [{$row['status']}] {$row['name']} (slug: {$row['slug']})\n";
}

$output .= "\n=== PRODUCTS (AFTER FIX) ===\n";
$stmt = $pdo->query("SELECT p.id, p.name, p.slug, p.status, p.category_id, c.name as cat_name FROM products p JOIN categories c ON p.category_id = c.id ORDER BY p.category_id ASC, p.id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $output .= "  ID:{$row['id']} | Cat:{$row['category_id']} ({$row['cat_name']}) | [{$row['status']}] {$row['name']}\n";
}

file_put_contents('c:/xampp/htdocs/VIVA/db_state_after.txt', $output);
echo "Done. Written to db_state_after.txt\n";
?>
