<?php
$host = 'sql106.infinityfree.com';
$dbname = 'if0_37814406_chatdb';
$username = 'if0_37814406';
$password = '9j6vz3m8vQb ';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>