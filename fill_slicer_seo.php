<?php
/**
 * VIVA Engineering - SEO Content Fill for Slicer Cutting Machine hierarchy
 * 
 * Fills:
 * - Category 9:  c. Slicer Cutting Machine
 * - Category 13: Masking tape Slicer Cutting Machine
 * - Category 14: PVC Tape Cutting Machine
 * - Product 34:  Manual Model Slicer Cutting machine
 * - Product 35:  Semiauto Model Slicer Cutting Machine
 */

require_once 'c:/xampp/htdocs/VIVA/admin/includes/db.php';

echo "<pre>\n=== VIVA SEO Content Fill: Slicer Cutting Machine ===\n\n";

// ============================================================
// CATEGORY 9: c. Slicer Cutting Machine (parent of 13 & 14)
// ============================================================
$pdo->prepare("UPDATE categories SET 
    description = ?,
    image = ?,
    seo_title = ?,
    seo_description = ?,
    meta_keywords = ?
WHERE id = 9")->execute([
    'Industrial Slicer Cutting Machines designed for precision slitting and cutting of adhesive tapes including masking tape and PVC electrical tape. VIVA Engineering offers a complete range from manual hand-operated models to semi-automatic servo-driven systems, engineered for consistent cut quality, minimal waste, and high-volume production environments.',
    'assets/images/categories/masking-tape.png',
    'Slicer Cutting Machine | Masking & PVC Tape Slicer | VIVA Engineering',
    'Industrial Slicer Cutting Machines for masking tape and PVC tape. Manual and semi-auto models with precision blades. Manufacturer and exporter from India - VIVA Engineering.',
    'slicer cutting machine, tape slicer, masking tape cutting machine, PVC tape slicer, adhesive tape cutter, tape slitting machine, VIVA Engineering'
]);
echo "Updated Category 9: c. Slicer Cutting Machine\n";

// ============================================================
// CATEGORY 13: Masking tape Slicer Cutting Machine
// ============================================================
$pdo->prepare("UPDATE categories SET 
    description = ?,
    image = ?,
    seo_title = ?,
    seo_description = ?,
    meta_keywords = ?
WHERE id = 13")->execute([
    'Masking Tape Slicer Cutting Machines engineered for clean, burr-free slicing of masking tape logs into finished rolls. Available in Manual and Semi-Automatic configurations, these machines feature hardened alloy steel circular blades, pneumatic log clamping, and adjustable width settings for precise, repeatable cuts across automotive-grade, general-purpose, and high-temperature masking tapes.',
    'assets/images/categories/masking-tape.png',
    'Masking Tape Slicer Cutting Machine | Manual & Semi-Auto | VIVA Engineering',
    'Masking Tape Slicer Cutting Machines - Manual and Semi-Automatic models for precision slicing of masking tape logs. Clean burr-free cuts, adjustable width. Manufacturer India - VIVA Engineering.',
    'masking tape slicer, masking tape cutting machine, tape slicer machine, manual tape slicer, semi auto tape slicer, masking tape slitting, VIVA Engineering'
]);
echo "Updated Category 13: Masking tape Slicer Cutting Machine\n";

// ============================================================
// CATEGORY 14: PVC Tape Cutting Machine
// ============================================================
$pdo->prepare("UPDATE categories SET 
    description = ?,
    image = ?,
    seo_title = ?,
    seo_description = ?,
    meta_keywords = ?
WHERE id = 14")->execute([
    'PVC Tape Cutting Machines purpose-built for high-precision slicing of PVC electrical insulation tape logs. VIVA Engineering offers Manual single-shaft and Fully Automatic double-shaft models featuring hardened steel blades, anti-vibration mounts, and servo-driven automation for consistent cut quality at production-grade speeds.',
    'assets/images/categories/masking-tape.png',
    'PVC Tape Cutting Machine | Manual & Fully Auto Double Shaft | VIVA Engineering',
    'PVC Tape Cutting Machines - Manual and Fully Auto Double Shaft models for electrical insulation tapes. Hardened blades, precision cutting, high-speed production. Manufacturer India - VIVA Engineering.',
    'PVC tape cutting machine, electrical tape cutter, PVC insulation tape slicer, double shaft tape cutting, PVC tape machine, VIVA Engineering'
]);
echo "Updated Category 14: PVC Tape Cutting Machine\n";

// ============================================================
// PRODUCT 34: Manual Model Slicer Cutting machine
// ============================================================
$pdo->prepare("UPDATE products SET
    tagline = ?,
    description = ?,
    features = ?,
    applications = ?,
    benefits = ?,
    specifications = ?,
    featured_image = ?,
    seo_title = ?,
    seo_description = ?,
    meta_keywords = ?,
    price = ?,
    availability = ?,
    lead_time = ?
WHERE id = 34")->execute([
    // tagline
    'Compact Hand-Operated Masking Tape Slicer for Small Batch Production',
    // description
    'The Manual Model Slicer Cutting Machine by VIVA Engineering is a robust, hand-operated precision slicer designed for cutting masking tape logs into individual finished rolls. Built on a heavy-duty cast iron base with anti-vibration dampening, this machine delivers clean, burr-free cuts with exceptional repeatability. The manually operated lever-action plunge mechanism provides the operator with direct tactile feedback, ensuring controlled blade engagement for each cut. Ideal for small to medium batch production, job-shop environments, and facilities that require a reliable, low-maintenance tape slicing solution without the complexity of automated systems. The hardened alloy steel circular blade maintains its edge through thousands of cuts, and the adjustable width guide allows quick changeover between different roll widths.',
    // features
    "Heavy-duty cast iron base with anti-vibration rubber mounts for stable operation\nHardened alloy steel circular blade (HSS) for long-lasting sharpness\nManual lever-action plunge mechanism with smooth linear bearings\nAdjustable width guide for quick changeover between roll sizes\nPneumatic log clamping for secure, slip-free holding during slicing\nEasy blade height and angle adjustment for different tape thicknesses\nCompact footprint suitable for small workshop environments\nMinimal maintenance with grease-lubricated bearings",
    // applications
    "General-purpose masking tape slicing for packaging industry\nAutomotive-grade masking tape roll finishing\nHigh-temperature masking tape cutting for industrial painting\nDecorative and craft masking tape production\nSmall batch and custom width masking tape orders\nJob-shop and contract tape converting operations",
    // benefits
    "Extremely low capital investment for tape cutting operations\nNo electricity required for blade operation - fully mechanical drive\nSimple operation requires minimal operator training\nVirtually zero downtime with no electronic components to fail\nClean, burr-free cuts that meet packaging-grade quality standards\nCompact size allows installation in space-constrained workshops\nDurable construction provides decades of reliable service life",
    // specifications (JSON)
    '{"Machine Type":"Manual Lever-Operated Slicer","Blade Material":"Hardened Alloy Steel (HSS)","Max Log Diameter":"150 mm","Max Log Width":"300 mm","Cutting Width Range":"6 mm - 100 mm (Adjustable)","Blade Speed":"Manual (Operator Controlled)","Clamping System":"Pneumatic Log Clamp","Machine Weight":"Approx. 120 kg","Power":"No Electrical Power Required","Footprint":"800 x 600 x 900 mm (L x W x H)"}',
    // featured_image
    'assets/images/categories/masking-tape.png',
    // seo_title
    'Manual Model Slicer Cutting Machine | Masking Tape Slicer | VIVA Engineering',
    // seo_description
    'Manual Model Slicer Cutting Machine for masking tape. Hand-operated, precision HSS blade, pneumatic clamping. Ideal for small batch production. Manufacturer India - VIVA Engineering.',
    // meta_keywords
    'manual slicer cutting machine, masking tape slicer, hand operated tape cutter, manual tape slitting machine, tape roll cutting, VIVA Engineering',
    // price
    'Enquire Now',
    // availability
    'In Stock',
    // lead_time
    '2-4 Weeks'
]);
echo "Updated Product 34: Manual Model Slicer Cutting machine\n";

// ============================================================
// PRODUCT 35: Semiauto Model Slicer Cutting Machine
// ============================================================
$pdo->prepare("UPDATE products SET
    tagline = ?,
    description = ?,
    features = ?,
    applications = ?,
    benefits = ?,
    specifications = ?,
    featured_image = ?,
    seo_title = ?,
    seo_description = ?,
    meta_keywords = ?,
    price = ?,
    availability = ?,
    lead_time = ?
WHERE id = 35")->execute([
    // tagline
    'Servo-Assisted Semi-Automatic Masking Tape Slicer for Medium to High Volume Production',
    // description
    'The Semiauto Model Slicer Cutting Machine by VIVA Engineering combines the precision of manual control with the speed and consistency of servo-driven automation. Featuring a motorized blade feed system with programmable cut depth and speed, this machine dramatically increases throughput compared to fully manual models while maintaining superior cut quality. The PLC-controlled servo motor drives the circular blade at a consistent RPM, eliminating operator fatigue and ensuring uniform cuts across every roll in the log. An integrated digital counter tracks completed cuts, and the pneumatic auto-eject system speeds up log changeover. This machine is the ideal choice for medium to high-volume masking tape production facilities that demand consistent quality at competitive cycle times.',
    // features
    "PLC-controlled servo motor for consistent blade RPM and feed rate\nProgrammable cut depth and speed for different tape materials\nPneumatic auto-eject system for rapid log changeover\nDigital cut counter with batch tracking capability\nHardened alloy steel circular blade (HSS) with auto-lubrication\nHeavy-duty welded steel frame with vibration dampening\nSafety interlock guards preventing operation with covers open\nTouch-screen HMI panel for easy parameter adjustment\nAutomatic blade retraction on cycle completion\nDual pneumatic log clamping for maximum stability",
    // applications
    "Medium to high-volume masking tape production lines\nAutomotive-grade masking tape manufacturing\nHigh-temperature masking tape for industrial spray painting\nSpecialty masking tape for electronics and PCB protection\nContract converting and OEM tape finishing operations\nMulti-width masking tape production with quick changeover",
    // benefits
    "3x faster throughput compared to manual slicer models\nConsistent cut quality eliminates operator skill dependency\nServo-driven blade reduces operator fatigue during long shifts\nProgrammable recipes enable quick changeover between tape types\nDigital counter provides accurate production tracking and reporting\nSafety interlocks protect operators and meet CE safety standards\nReduced material waste with precise, repeatable blade positioning\nLower cost per roll compared to fully automatic systems",
    // specifications (JSON)
    '{"Machine Type":"Semi-Automatic Servo-Driven Slicer","Blade Material":"Hardened Alloy Steel (HSS)","Max Log Diameter":"200 mm","Max Log Width":"500 mm","Cutting Width Range":"6 mm - 150 mm (Programmable)","Blade Speed":"500 - 2000 RPM (Variable)","Motor Power":"1.5 kW Servo Motor","Clamping System":"Dual Pneumatic Auto-Clamp","Control System":"PLC with 7-inch Touch HMI","Air Requirement":"6 bar compressed air","Machine Weight":"Approx. 350 kg","Power Supply":"3 Phase, 415V, 50Hz","Footprint":"1200 x 800 x 1200 mm (L x W x H)"}',
    // featured_image
    'assets/images/categories/masking-tape.png',
    // seo_title
    'Semiauto Model Slicer Cutting Machine | Servo Masking Tape Slicer | VIVA Engineering',
    // seo_description
    'Semi-Automatic Slicer Cutting Machine for masking tape. PLC servo-driven, programmable cut depth, digital counter. Medium to high volume production. Manufacturer India - VIVA Engineering.',
    // meta_keywords
    'semi automatic slicer cutting machine, servo tape slicer, masking tape cutting machine, PLC tape slicer, semi auto tape slitting, VIVA Engineering',
    // price
    'Enquire Now',
    // availability
    'In Stock',
    // lead_time
    '4-6 Weeks'
]);
echo "Updated Product 35: Semiauto Model Slicer Cutting Machine\n";

echo "\n=== ALL DONE! ===\n</pre>";
?>
