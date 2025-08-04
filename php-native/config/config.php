<?php
/**
 * Application Configuration - PHP Native
 * KORMI Kaltim CMS
 */

// Application settings
define('APP_NAME', 'KORMI Kaltim CMS');
define('APP_URL', 'https://kormi-kaltim.id');
define('APP_VERSION', '1.0.0');

// Session configuration
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Asia/Makassar');

// Security functions
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function generateToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireAdmin() {
    requireLogin();
    if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        header('Location: dashboard.php');
        exit();
    }
}

// File upload functions
function uploadFile($file, $destination, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']) {
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    $fileInfo = pathinfo($file['name']);
    $extension = strtolower($fileInfo['extension']);
    
    if (!in_array($extension, $allowedTypes)) {
        return false;
    }
    
    $fileName = uniqid() . '.' . $extension;
    $filePath = $destination . '/' . $fileName;
    
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $fileName;
    }
    
    return false;
}

// Pagination function
function paginate($total, $perPage, $currentPage) {
    $totalPages = ceil($total / $perPage);
    $offset = ($currentPage - 1) * $perPage;
    
    return [
        'total' => $total,
        'per_page' => $perPage,
        'current_page' => $currentPage,
        'total_pages' => $totalPages,
        'offset' => $offset,
        'has_prev' => $currentPage > 1,
        'has_next' => $currentPage < $totalPages,
        'prev_page' => $currentPage - 1,
        'next_page' => $currentPage + 1
    ];
}

// URL helper functions
function url($path = '') {
    return APP_URL . '/' . ltrim($path, '/');
}

function redirect($path) {
    header('Location: ' . url($path));
    exit();
}

function back() {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Flash message functions
function setFlash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

// Include database configuration
require_once 'config/database.php';
?> 