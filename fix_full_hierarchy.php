<?php
/**
 * VIVA Engineering - Full Category & Product Hierarchy Fix
 * 
 * This script corrects the database to exactly match the user's desired product hierarchy.
 * 
 * PROBLEMS FOUND:
 * - Category ID:10 has slug 'coating-processing-machines' but name 'PVC Tape Cutting Machine' 
 *   and parent_id=9 (Slicer). It was repurposed during restructuring.
 * - Products 23-26 (Coating machines) point to this wrong category.
 * - "Coating Processing machines" doesn't exist as a proper top-level category.
 * - Category names are missing their numbering prefixes (1., 2., etc.)
 * - PVC products (21,22) incorrectly point to category 9 (Slicer) instead of a PVC sub-category.
 * - Masking tape Slicer products are missing.
 */

require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

echo "<h2>VIVA Engineering - Full Hierarchy Fix</h2><pre>\n";

// ============================================================
// STEP 1: Fix top-level category names with numbering
// ============================================================
echo "=== STEP 1: Fix top-level category numbering ===\n";

$top_level_fixes = [
    1 => '1. Slitting Rewinding Applications',
    2 => '2. Center Shaft Slitting Rewinding Machines',
    3 => '3. Roll to Roll Processing Machines',
    4 => '4. Aluminium Foil Processing Machines',
    5 => '5. Printing Converting & Processing Machines',
    6 => '6. Adhesive Tape Processing machines',
    // ID 10 will become "7. Coating Processing machines" (top-level) - handled below
    11 => '8. Plastic Film Embossing machine',
    12 => '9. Extra Converting machine & Equipment',
];

foreach ($top_level_fixes as $id => $name) {
    $stmt = $pdo->prepare("UPDATE categories SET name = ?, parent_id = NULL, status = 'active' WHERE id = ?");
    $stmt->execute([$name, $id]);
    echo "  Updated Category ID:$id -> '$name'\n";
}

// ============================================================
// STEP 2: Fix Category ID:10 - Convert to "7. Coating Processing machines" (top-level)
// ============================================================
echo "\n=== STEP 2: Fix Category ID:10 -> 7. Coating Processing machines ===\n";

$stmt = $pdo->prepare("UPDATE categories SET name = '7. Coating Processing machines', slug = 'coating-processing-machines', parent_id = NULL, status = 'active' WHERE id = 10");
$stmt->execute();
echo "  Fixed Category ID:10 -> '7. Coating Processing machines' (top-level)\n";

// ============================================================
// STEP 3: Fix sub-categories under "6. Adhesive Tape" (ID:6)
// ============================================================
echo "\n=== STEP 3: Fix Adhesive Tape sub-categories ===\n";

// ID:7 = "a. BOPP Tape Slitting & Rewinding Machine" (parent: 6) - already correct parent
$stmt = $pdo->prepare("UPDATE categories SET name = 'a. BOPP Tape Slitting & Rewinding Machine', parent_id = 6, status = 'active' WHERE id = 7");
$stmt->execute();
echo "  Updated Category ID:7 -> 'a. BOPP Tape Slitting & Rewinding Machine' (parent: 6)\n";

// ID:9 = "c. Slicer Cutting Machine" (parent: 6) - already correct parent
$stmt = $pdo->prepare("UPDATE categories SET name = 'c. Slicer Cutting Machine', slug = 'slicer-cutting-machine', parent_id = 6, status = 'active' WHERE id = 9");
$stmt->execute();
echo "  Updated Category ID:9 -> 'c. Slicer Cutting Machine' (parent: 6)\n";

// ============================================================
// STEP 4: Fix sub-categories under "c. Slicer Cutting Machine" (ID:9)
// ============================================================
echo "\n=== STEP 4: Fix Slicer sub-categories ===\n";

// ID:13 = "Masking tape Slicer Cutting Machine" (parent: 9) - already correct
$stmt = $pdo->prepare("UPDATE categories SET name = 'Masking tape Slicer Cutting Machine', parent_id = 9, status = 'active' WHERE id = 13");
$stmt->execute();
echo "  Updated Category ID:13 -> 'Masking tape Slicer Cutting Machine' (parent: 9)\n";

// We need a "PVC Tape Cutting Machine" category under Slicer (ID:9)
// Check if one already exists
$stmt = $pdo->prepare("SELECT id FROM categories WHERE slug = 'pvc-tape-cutting-machine'");
$stmt->execute();
$pvc_cat = $stmt->fetch(PDO::FETCH_ASSOC);

if ($pvc_cat) {
    $pvc_cat_id = $pvc_cat['id'];
    $stmt = $pdo->prepare("UPDATE categories SET name = 'PVC Tape Cutting Machine', parent_id = 9, status = 'active' WHERE id = ?");
    $stmt->execute([$pvc_cat_id]);
    echo "  Updated existing PVC category ID:$pvc_cat_id -> 'PVC Tape Cutting Machine' (parent: 9)\n";
} else {
    $stmt = $pdo->prepare("INSERT INTO categories (name, slug, parent_id, status) VALUES ('PVC Tape Cutting Machine', 'pvc-tape-cutting-machine', 9, 'active')");
    $stmt->execute();
    $pvc_cat_id = $pdo->lastInsertId();
    echo "  Created new PVC category ID:$pvc_cat_id -> 'PVC Tape Cutting Machine' (parent: 9)\n";
}

// ============================================================
// STEP 5: Create missing Masking Tape Slicer products
// ============================================================
echo "\n=== STEP 5: Create missing Masking Tape Slicer products ===\n";

$masking_slicer_products = [
    ['Manual Model Slicer Cutting machine', 'manual-model-slicer-cutting-machine', 13],
    ['Semiauto Model Slicer Cutting Machine', 'semiauto-model-slicer-cutting-machine', 13],
];

foreach ($masking_slicer_products as $p) {
    $stmt = $pdo->prepare("SELECT id FROM products WHERE slug = ?");
    $stmt->execute([$p[1]]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare("INSERT INTO products (name, slug, category_id, status, featured) VALUES (?, ?, ?, 'active', 0)");
        $stmt->execute([$p[0], $p[1], $p[2]]);
        echo "  Created Product: '{$p[0]}' (cat: {$p[2]})\n";
    } else {
        // Update category assignment
        $stmt = $pdo->prepare("UPDATE products SET category_id = ?, status = 'active' WHERE slug = ?");
        $stmt->execute([$p[2], $p[1]]);
        echo "  Updated Product: '{$p[0]}' -> cat: {$p[2]}\n";
    }
}

// ============================================================
// STEP 6: Move PVC products to the correct PVC category
// ============================================================
echo "\n=== STEP 6: Move PVC products to PVC category (ID:$pvc_cat_id) ===\n";

$pvc_products = [
    'manual-pvc-tape-cutting-machine',
    'fully-auto-double-shaft-pvc-tape-cutting-machine',
];

foreach ($pvc_products as $slug) {
    $stmt = $pdo->prepare("UPDATE products SET category_id = ? WHERE slug = ?");
    $stmt->execute([$pvc_cat_id, $slug]);
    echo "  Moved Product '$slug' -> PVC category (ID:$pvc_cat_id)\n";
}

// ============================================================
// STEP 7: Move Coating products to the correct Coating category (ID:10)
// ============================================================
echo "\n=== STEP 7: Move Coating products to Coating category (ID:10) ===\n";

$coating_products = [
    'bopp-tape-coating-machine',
    'water-base-coating-machine',
    'paper-coating-machine',
    'foam-tape-coating-machine',
];

foreach ($coating_products as $slug) {
    $stmt = $pdo->prepare("UPDATE products SET category_id = 10 WHERE slug = ?");
    $stmt->execute([$slug]);
    echo "  Moved Product '$slug' -> Coating category (ID:10)\n";
}

// ============================================================
// STEP 8: Verify "b. Masking Tape Rewinding machine" exists as product under cat 6
// ============================================================
echo "\n=== STEP 8: Verify Masking Tape Rewinding product ===\n";
$stmt = $pdo->prepare("SELECT id, name, category_id FROM products WHERE slug = 'masking-tape-rewinding-machine'");
$stmt->execute();
$masking = $stmt->fetch(PDO::FETCH_ASSOC);
if ($masking) {
    echo "  Found Product ID:{$masking['id']} -> '{$masking['name']}' (cat: {$masking['category_id']})\n";
    // Ensure it's under cat 6 (Adhesive Tape)
    if ($masking['category_id'] != 6) {
        $stmt = $pdo->prepare("UPDATE products SET category_id = 6 WHERE id = ?");
        $stmt->execute([$masking['id']]);
        echo "  Moved to category 6 (Adhesive Tape)\n";
    }
} else {
    echo "  NOT FOUND! Creating...\n";
    $stmt = $pdo->prepare("INSERT INTO products (name, slug, category_id, status, featured) VALUES ('b. Masking Tape Rewinding machine', 'masking-tape-rewinding-machine', 6, 'active', 0)");
    $stmt->execute();
    echo "  Created Product: 'b. Masking Tape Rewinding machine'\n";
}

// ============================================================
// FINAL: Dump the corrected state
// ============================================================
echo "\n\n========================================\n";
echo "=== FINAL STATE AFTER FIX ===\n";
echo "========================================\n\n";

echo "--- CATEGORIES ---\n";
$stmt = $pdo->query("SELECT id, name, slug, status, parent_id FROM categories ORDER BY id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $parent = $row['parent_id'] ? $row['parent_id'] : 'NULL';
    $indent = $row['parent_id'] ? '  ' : '';
    
    // Second level indent
    if ($row['parent_id']) {
        $stmt2 = $pdo->prepare("SELECT parent_id FROM categories WHERE id = ?");
        $stmt2->execute([$row['parent_id']]);
        $pp = $stmt2->fetch(PDO::FETCH_ASSOC);
        if ($pp && $pp['parent_id']) $indent = '    ';
    }
    
    echo "{$indent}ID:{$row['id']} | Parent:{$parent} | [{$row['status']}] {$row['name']}\n";
}

echo "\n--- PRODUCTS ---\n";
$stmt = $pdo->query("SELECT p.id, p.name, p.slug, p.status, p.category_id, c.name as cat_name FROM products p JOIN categories c ON p.category_id = c.id ORDER BY p.category_id ASC, p.id ASC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "  ID:{$row['id']} | Cat:{$row['category_id']} ({$row['cat_name']}) | [{$row['status']}] {$row['name']}\n";
}

echo "\nDONE!\n";
echo "</pre>";
?>
