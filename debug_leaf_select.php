<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
require_once 'c:/xampp/htdocs/VIVA/admin/includes/functions.php';

$leaves = getLeafCategories();
echo "--- LEAF CATEGORIES ---\n";
echo "Count: " . count($leaves) . "\n";
foreach($leaves as $cat) {
    echo "ID: {$cat['id']} | Name: {$cat['name']} | Status: {$cat['status']} | Parent: {$cat['parent_id']}\n";
}

$tree = getCategoryTree();
echo "\n--- FULL TREE ---\n";
echo "Count: " . count($tree) . "\n";
foreach($tree as $cat) {
    echo "ID: {$cat['id']} | Name: {$cat['display_name']}\n";
}
?>
