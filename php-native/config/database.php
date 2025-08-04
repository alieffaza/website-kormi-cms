<?php
/**
 * Database Configuration - PHP Native
 * KORMI Kaltim CMS
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'u896830231_dbkormicms');
define('DB_USER', 'u896830231_adminkormi');
define('DB_PASS', ''); // Set password database Anda di sini

// Database connection function
function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Helper function untuk query database
function query($sql, $params = []) {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

// Helper function untuk fetch single row
function fetchOne($sql, $params = []) {
    $stmt = query($sql, $params);
    return $stmt->fetch();
}

// Helper function untuk fetch all rows
function fetchAll($sql, $params = []) {
    $stmt = query($sql, $params);
    return $stmt->fetchAll();
}

// Helper function untuk insert
function insert($table, $data) {
    $pdo = getDBConnection();
    $columns = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    
    return $pdo->lastInsertId();
}

// Helper function untuk update
function update($table, $data, $where, $whereParams = []) {
    $pdo = getDBConnection();
    $setClause = [];
    foreach (array_keys($data) as $column) {
        $setClause[] = "$column = :$column";
    }
    $setClause = implode(', ', $setClause);
    
    $sql = "UPDATE $table SET $setClause WHERE $where";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array_merge($data, $whereParams));
    
    return $stmt->rowCount();
}

// Helper function untuk delete
function delete($table, $where, $params = []) {
    $pdo = getDBConnection();
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    
    return $stmt->rowCount();
}
?> 