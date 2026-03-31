<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
require_once 'c:/xampp/htdocs/VIVA/admin/includes/functions.php';

$tree = getCategoryTree();
echo "--- CATEGORY TREE VERIFICATION ---\n";
foreach($tree as $cat) {
    if ($cat['id'] == 6 || $cat['id'] == 7 || $cat['id'] == 9 || $cat['id'] == 10 || $cat['id'] == 13) {
        echo "FOUND TAPE CAT: ID={$cat['id']} | NAME={$cat['display_name']} | STATUS={$cat['status']}\n";
    }
}
?>
