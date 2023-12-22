<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Product List</title>
    <style>
        
        .overlay {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal {
            background-color: #f4f4f4;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            border-radius: 5px;
        }

        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
<section id="headr">
        <a href="#"> <img src="Watches/logo2.png" class="logo" alt=""></a> 
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="smart.html">Smart Collection</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a href="Signup.html"><i class="bi bi-person"></i></a>
                <li><a href="cart.php"><i class="bi bi-cart3 fa-lg"></i></a></li>
            </ul>
        </div>
    </section>
    <?php
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'pfa';

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    if (isset($_GET['delete'])) {
        $deleteCode = $_GET['delete'];
        $deleteQuery = "DELETE FROM product WHERE code = '$deleteCode'";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "<script>alert('Product deleted successfully');</script>";
            echo "<script>window.location.href='productlist.php';</script>";
            exit();
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    }

    
    $select_product = mysqli_query($conn, "SELECT * FROM product");

    ?>

    <div class="prod-dis">
        <table class="prod-dis-tab">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Label</td>
                    <td>Price</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($select_product) > 0) {
                    while ($row = mysqli_fetch_assoc($select_product)) {
                        ?>
                        <tr>
                            <td><img src="img/<?php echo $row['image'] ?>" height="100" alt=""></td>
                            <td><?php echo $row['name_prod']; ?></td>
                            <td><?php echo $row['label']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="productlist.php?delete=<?php echo $row['code'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?')"><i class="bi bi-trash"></i> Delete</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="option-btn" onclick="openModal('<?php echo $row['code']; ?>')"><i class="bi bi-pencil-square"></i> Update</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No product added</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="updateOverlay" class="overlay">
        <div class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Update Product</h2>
            <form action="" method="POST">
                <input type="hidden" name="code" id="updateCode" value="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value=""><br>
                <label for="label">Label:</label>
                <input type="text" id="label" name="label" value=""><br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value=""><br>
                <input type="submit" value="Update" name="updateBtn">
            </form>
        </div>
    </div>

    <?php
    
    if (isset($_GET['update'])) {
        $updateCode = $_GET['update'];
        $selectQuery = "SELECT * FROM product WHERE code = '$updateCode'";
        $result = mysqli_query($conn, $selectQuery);
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            echo "<script>openModal('".$product['code']."');</script>";
        } else {
            echo "Product not found";
        }
    }

    
    if (isset($_POST['updateBtn'])) {
        $updateCode = $_POST['code'];
        $name = $_POST['name'];
        $label = $_POST['label'];
        $price = $_POST['price'];
        $updateQuery = "UPDATE product SET name_prod = '$name', label = '$label', price = '$price' WHERE code = '$updateCode'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Product updated successfully');</script>";
            echo "<script>window.location.href='productlist.php';</script>";
            exit();
        } else {
            echo "Error updating product: " . $conn->error;
        }
    }
    ?>

    <script>
        
        function openModal(code) {
            var overlay = document.getElementById("updateOverlay");
            overlay.style.display = "block";
            document.getElementById("updateCode").value = code;
            
            fetchProductData(code);
        }

        
        function closeModal() {
            var overlay = document.getElementById("updateOverlay");
            overlay.style.display = "none";
            
            document.getElementById("updateCode").value = "";
            document.getElementById("name").value = "";
            document.getElementById("label").value = "";
            document.getElementById("price").value = "";
        }

        
        function fetchProductData(code) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var product = JSON.parse(xhr.responseText);
                    document.getElementById("name").value = product.name_prod;
                    document.getElementById("label").value = product.label;
                    document.getElementById("price").value = product.price;
                }
            };
            xhr.open("GET", "getproduct.php?code=" + code, true);
            xhr.send();
        }
    </script>

</body>

</html>
