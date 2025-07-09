<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Display</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298, #6c63ff);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }
        .logo {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .qr-code {
            margin: 20px 0;
        }
        textarea {
            width: 80%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            resize: none;
            background: #fff;
            color: #000;
            font-size: 1rem;
        }
        button {
            background: #6c63ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        button:hover {
            background: #8479e0;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

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

$code = $_POST['code'];
$sql = "SELECT * FROM uploads WHERE approve_code = :code";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':code', $code, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $share_code = $result['approve_code'];
    $fileName = $result['file_name'];
    $filePath = "upload/" . $fileName;
?>

    <div class="container">
        <div class="logo">Download Your File</div>

        <div class="box"></div>

        <br>
        <button onclick="yukle()"><i class="fas fa-down"></i> Download</button>
    </div>

    <script>
        function yukle() {
            const box = document.querySelector('.box');
            box.innerHTML = `<a href='<?php echo $filePath; ?>' download>Click here to download</a>`;
        }
    </script>

<?php
} else {
    echo "<p>No file found for the provided code.</p>";
}

$pdo = null;
?>

</body>
</html>
