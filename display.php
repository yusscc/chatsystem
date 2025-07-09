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
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
$code = $_REQUEST['code'];
$sql = "SELECT *FROM uploads WHERE approve_code='$code'";

// Prepare and execute the query
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($results) > 0) {
    // Output data of each row
    foreach ($results as $row) {
     $share_code = $row['approve_code'];
    }
?>

    <div class="container">
        <div class="logo">My App</div>
        <!-- Change this to canvas -->
        <canvas id="qrcode"></canvas>
        <textarea rows="3" readonly>Share this QR Code or use the 4-digit code:<?php echo htmlspecialchars($share_code); ?></textarea>
        <br>
        <button><i class="fas fa-share-alt"></i> Share</button>
    </div>

    <script>
        // Generate QR Code with demo data
        const qrData = "https://localhost/ftp_server/receive.php?code=<?php echo htmlspecialchars($share_code); ?>"; // Replace with your dynamic data
        QRCode.toCanvas(document.getElementById('qrcode'), qrData, {
            width: 200,
            margin: 1,
            color: {
                dark: '#000000',
                light: '#ffffff'
            }
        }, function (error) {
            if (error) console.error(error);
            console.log('QR Code generated!');
        });
    </script>
    <?php
} else {
    echo "0 results";
}

// Close the PDO connection
$pdo = null;
?>


</body>
</html>
