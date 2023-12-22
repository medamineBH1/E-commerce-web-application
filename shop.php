<?php 
 
 $servername = '127.0.0.1';
 $username = 'root';
 $password = '';
 $dbname = 'pfa';
 
 
 $conn = new mysqli($servername, $username, $password, $dbname);
 

 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 
 $select_product = mysqli_query($conn, "SELECT * FROM product");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Shop</title>
</head>
<body>
    <section id="headr">
        <a href="#"> <img src="Watches/logo2.png" class="logo" alt=""></a> 
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="smart.html">Smart Collection</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="Signup.php"><i class="bi bi-person"></i></a>
                <li><a href="cart.php"><i class="bi bi-cart3 fa-lg"></i></a></li>
            </ul>
        </div>
    </section>
    <section id="prod" class="section-p1">
        <h2>Watches</h2>
        <p>Great Selection</p>
        <div class="pro-container">
        <div class="pro" onclick="window.location.href='sinproduct.html';">
            <img src="Watches/hublot big bang.jpg" alt="">
        <div class="des">
            <span>Hublot</span>
            <h5>Hublot Big Bang</h5>
            <div class="star">
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
            </div>
            <h4>TND</h4>
        </div>
        <a href=""><i class="bi bi-cart3 fa-lg"></i></a>
    </div>
    <div class="pro">
        <img src="Watches/patek philippe Sky Moon.jpg" alt="">
    <div class="des">
        <span>Patek Philippe</span>
        <h5>Patek Philippe Sky Moon</h5>
        <div class="star">
            <i class="bi bi-star"></i>
            <i class="bi bi-star"></i>
            <i class="bi bi-star"></i>
            <i class="bi bi-star"></i>
        </div>
        <h4>TND</h4>
    </div>
    <a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro" onclick="window.location.href='sinprod3.html';">
    <img src="Watches/Rolex Submarine.jpg" alt="">
<div class="des">
    <span>Rolex</span>
    <h5>Rolex Submarine</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro">
    <img src="Watches/Rolex Day Date.png" alt="">
<div class="des">
    <span>Rolex</span>
    <h5>Rolex Day Date</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro">
    <img src="Watches/patek philippe 6002G.jpg" alt="">
<div class="des">
    <span>Patek Philippe</span>
    <h5>Patek Philippe 6002G</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro">
    <img src="Watches/hublot king power.jpg" alt="">
<div class="des">
    <span>Hublot</span>
    <h5>Hublot King Power</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro">
    <img src="Watches/hublot tech frame ferrari.jpg" alt="">
<div class="des">
    <span>Hublot</span>
    <h5>Hublot Ferrari Tech Frame</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
<div class="pro" onclick="window.location.href='sinprod2.html';">
    <img src="Watches/patek philippe nautilus.jpg" alt="">
<div class="des">
    <span>Patek Philippe</span>
    <h5>Patek Philippe Nautilus</h5>
    <div class="star">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
    </div>
    <h4>TND</h4>
</div>
<a href=""><i class="bi bi-cart3 fa-lg"></i></a>
</div>
</div>
    </section>
    <section id="prod" class="section-p1">
        <div class="pro-container">
            <?php
            if (mysqli_num_rows($select_product) > 0) {
                while ($row = mysqli_fetch_assoc($select_product)) {
                    ?>
                    <div class="pro">
                        <img src="img/<?php echo $row['image'] ?>" alt="">
                        <div class="des">
                            <span><?php echo $row['label']; ?></span>
                            <h5><?php echo $row['name_prod']; ?></h5>
                            <div class="star">
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <h4><?php echo $row['price']; ?></h4>
                        </div>
                        <a href=""><i class="bi bi-cart3 fa-lg"></i></a>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No products available</p>";
            }
            ?>
        </div>
    </section>
    <footer class="section-p1">
        <div class="coll">
            <img src="Watches/logo.png" alt="">
            <h4>Contact</h4>
            <p> <strong>Adresse :</strong> Sahloul Sousse Tunisia</p>
            <p> <strong>Phone :</strong> +216 00 000 000/+216 00 000 000/</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="ic">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-github"></i>
                    <i class="bi bi-twitter"></i>
                </div>
            </div>   
        </div>
        <div class="coll">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Policy</a>
            <a href="#">Become a member</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="coll">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">Order</a>
            <a href="#">Contact Us</a>
        </div>
    </footer>
</body>
</html>