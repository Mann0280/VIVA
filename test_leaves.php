<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
require_once 'c:/xampp/htdocs/VIVA/admin/includes/functions.php';

$leaves = getLeafCategories();
echo "LEAF CATEGORIES COUNT: " . count($leaves) . "\n";
foreach($leaves as $cat) {
    echo "ID: {$cat['id']} | Name: {$cat['name']}\n";
}
?>
