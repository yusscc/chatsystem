<?php
$host = 'localhost';
$dbname = 'ftp_server';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'upload/';
    $fileName = basename($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $uploadPath = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        $approveCode = rand(1000, 9999);

        $timestamp = date('Y-m-d H:i:s');

        try {
            $stmt = $pdo->prepare("INSERT INTO uploads (file_name, file_size, approve_code, upload_time) VALUES (:file_name, :file_size, :approve_code, :upload_time)");
            $stmt->execute([
                ':file_name' => $fileName,
                ':file_size' => $fileSize,
                ':approve_code' => $approveCode,
                ':upload_time' => $timestamp
            ]);

            echo header('location:display.php?code='.$approveCode.'');
            
        } catch (PDOException $e) {
            echo "Failed to insert file details: " . $e->getMessage();
        }
    } else {
        echo "Failed to upload the file.";
    }
} else {
    echo "No file uploaded.";
}
?>