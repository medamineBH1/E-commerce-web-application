<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'pfa';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $selectQuery = "SELECT * FROM product WHERE code = '$code'";
    $result = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode($product);
    } else {
        echo "Product not found";
    }
}

$conn->close();
?>
