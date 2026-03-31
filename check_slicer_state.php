<?php
require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

$output = "";

// Check categories 9, 13, 14
$output .= "=== CATEGORIES ===\n";
foreach ([9, 13, 14] as $id) {
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $output .= "\n--- Category ID:$id ---\n";
    foreach ($row as $k => $v) {
        $output .= "  $k: " . ($v ?: '(empty)') . "\n";
    }
}

// Check products 21, 22, 34, 35
$output .= "\n\n=== PRODUCTS ===\n";
foreach ([21, 22, 34, 35] as $id) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $output .= "\n--- Product ID:$id ---\n";
    if ($row) {
        foreach ($row as $k => $v) {
            $val = $v ?: '(empty)';
            if (strlen($val) > 100) $val = substr($val, 0, 100) . '...';
            $output .= "  $k: $val\n";
        }
    } else {
        $output .= "  NOT FOUND\n";
    }
}

file_put_contents('c:/xampp/htdocs/VIVA/slicer_state.txt', $output);
echo "Done.\n";
?>
