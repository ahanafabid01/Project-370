
<?php
// Database connection
$host = 'localhost'; // Database host
$dbname = 'game_rental'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password
$conn = "";
$conn = mysqli_connect($host, $dbname, $username, $password);
if ($conn) {
    echo "YOU ARE CONNECTED";
    } else {
        echo "Could not connect";
    }
#try {
#    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
#    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#} catch (PDOException $e) {
#    die("Database connection failed: " . $e->getMessage());
#}

// Close the connection when it's no longer needed