<?php
/**
 * Database Connection Configuration
 * Barber Pangling - Booking System
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'pbw');
define('DB_PORT', 3306);

try {
    $koneksi = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    
    if ($koneksi->connect_error) {
        throw new Exception("Koneksi Gagal: " . $koneksi->connect_error);
    }
    
    $koneksi->set_charset("utf8mb4");
    
} catch (Exception $e) {
    echo "Error Database: " . $e->getMessage();
    exit();
}

// Helper Functions
function escapeInput($data) {
    global $koneksi;
    return $koneksi->real_escape_string(trim($data));
}

function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isValidPhone($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 15;
}

function executeQuery($query) {
    global $koneksi;
    $result = $koneksi->query($query);
    
    if (!$result) {
        throw new Exception("Query Error: " . $koneksi->error);
    }
    
    return $result;
}

function fetchAll($result) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

function fetchOne($result) {
    return $result->fetch_assoc();
}

function getLastInsertId() {
    global $koneksi;
    return $koneksi->insert_id;
}

function getAffectedRows() {
    global $koneksi;
    return $koneksi->affected_rows;
}

function preparedQuery($query, $params = [], $types = '') {
    global $koneksi;
    
    $stmt = $koneksi->prepare($query);
    
    if (!$stmt) {
        throw new Exception("Prepare Error: " . $koneksi->error);
    }
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    if (!$stmt->execute()) {
        throw new Exception("Execute Error: " . $stmt->error);
    }
    
    return $stmt->get_result();
}
?>
