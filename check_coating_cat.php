<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';
$stmt = $pdo->prepare("SELECT id, name, parent_id, status FROM categories WHERE id = 23");
$stmt->execute();
$cat = $stmt->fetch(PDO::FETCH_ASSOC);
echo "--- CATEGORY 23 (Coating) ---\n";
print_r($cat);

if ($cat['parent_id']) {
    $parent_id = $cat['parent_id'];
    $stmt = $pdo->prepare("SELECT id, name, status FROM categories WHERE id = ?");
    $stmt->execute([$parent_id]);
    echo "\n--- PARENT CATEGORY ---\n";
    print_r($stmt->fetch(PDO::FETCH_ASSOC));
}
?>
