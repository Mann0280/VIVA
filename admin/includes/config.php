<?php
/**
 * VIVA Admin Configuration (Production Ready)
 */

// Define absolute path to admin folder
if (!defined('ADMIN_PATH')) {
    define('ADMIN_PATH', realpath(__DIR__ . '/../'));
}

// Define absolute path to project root
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(ADMIN_PATH . '/../'));
}

// ✅ Auto-detect Base URL (works on localhost + live)
if (!defined('BASE_URL')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    // Handle VIVA subdirectory for local development
    $is_local = ($host === 'localhost');
    define('BASE_URL', $protocol . $host . ($is_local ? '/VIVA' : ''));
}

// ✅ Admin URL (auto)
if (!defined('ADMIN_URL')) {
    define('ADMIN_URL', BASE_URL . '/admin');
}

// ✅ Centralized routes (REMAINING FROM PREVIOUS STEP)
require_once __DIR__ . '/routes.php';

// Include database connection
require_once __DIR__ . '/db.php';

// Include core helper functions
require_once __DIR__ . '/functions.php';

// OPTIONAL: include static fallback data (if needed)
$products_file = ROOT_PATH . '/data/products-data.php';
$settings_file = ROOT_PATH . '/data/site-settings.php';

if (file_exists($products_file)) {
    require_once $products_file;
}

if (file_exists($settings_file)) {
    require_once $settings_file;
}

// Session management
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Admin authentication check
function check_admin_login() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        // Save attempted URL to redirect back after login
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        
        header('Location: ' . ADMIN_URL . '/login.php');
        exit();
    }
}
?>