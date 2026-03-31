<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
require_once 'c:/xampp/htdocs/VIVA/admin/includes/functions.php';

$all = getCategoryTree();
echo "--- CATEGORY TREE ---\n";
echo "Count: " . count($all) . "\n";
foreach($all as $cat) {
    echo "ID: {$cat['id']} | Name: {$cat['display_name']} | Status: {$cat['status']}\n";
}
?>
