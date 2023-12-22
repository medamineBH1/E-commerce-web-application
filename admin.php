<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Admin Panel</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
    <div class="sidebar">
        <ul>
            <li><a href="addproduct.php">
                <i class="bi bi-shop"></i>
                <span class="nav-item">Products </span>
            </a></li>
            <li><a href="client.php">
                <i class="bi bi-person-circle"></i>
                <span class="nav-item"> Clients </span>
            </a></li>
            <li><a href="cart.php">
                <i class="bi bi-bag"></i>
                <span class="nav-item"> Orders </span>
            </a></li>
            
            <li><a href="shop.php">
                <i class="bi bi-shop-window"></i>
                <span class="nav-item"> Shop </span>
            </a></li>

        </ul>
    </div>
</body>
</html>