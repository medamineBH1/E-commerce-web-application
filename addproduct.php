<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'pfa';


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $label = $_POST['label'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_folder = 'img/' . $image;
    $price = $_POST['price'];

    if (empty($Name) || empty($label) || empty($image) || empty($price)) {
        $message[] = 'Please fill all the fields!';
    } else {
        $insert = "INSERT INTO product (name_prod, label, price, image) VALUES ('$Name', '$label', '$price', '$image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($image_temp, $image_folder);
            $message[] = 'New product added';
        } else {
            $message[] = 'Could not add the product';
        }
        header("Location: productlist.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Add Product</title>
</head>

<body>
    <div class="container"></div>
    <div class="form-box">
        <h1 id="title">Add Product</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo "<div class='alert'>$msg</div>";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <div class="input-field" id="namefield">
                    <input type="text" placeholder="Name" name="Name" id="name">
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Description" size="50" name="label" id="label">
                </div>
                <div class="input-field">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image">
                </div>
                <div class="input-field">
                    <input type="number" placeholder="Price" name="price" id="price">
                </div>
            </div>
            <div class="btn-field">
                <button type="submit" id="signupbtn" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>