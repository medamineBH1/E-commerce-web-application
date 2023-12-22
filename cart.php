<?php
session_start();

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
// Retrieve the cart items from session
$cartItems = isset($_SESSION['cartItems']) ? $_SESSION['cartItems'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted
    if (isset($_POST['product_name']) && isset($_POST['product_price'])) {
        // Add the product to the cart
        $product = [
            'name' => $_POST['product_name'],
            'price' => $_POST['product_price'],
            'photo' => $_POST['product_photo']
        ];
        $cartItems[] = $product;

        // Update the cart items in session
        $_SESSION['cartItems'] = $cartItems;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <title>Cart</title>
</head>
<body>
<section id="headr">
    <a href="#"> <img src="Watches/logo.png" class="logo" alt=""></a> 
    <div>
        <ul id="navbar">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="smart.html">Smart Collection</a></li>
            <li><a href="#footer">Contact</a></li>
            <li><a href="Signup.php"><i class="bi bi-person"></i></a>
            <li><a href="cart.php"><i class="bi bi-cart3 fa-lg"></i></a></li>
            <li><a href="login.html"><i class="bi bi-search"></i></a></li>
        </ul>
    </div>
</section>
    <div class="container">
        <h2>Shopping Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th> Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><img src="<?php echo $item['photo']; ?>" width="100" alt="Product Photo"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>