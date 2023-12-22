
<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'pfa';


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function insertClient($name, $email, $password, $adress) {
    global $conn;
    $query = "INSERT INTO client (name_cl, email_cl, pass_cl, adress_cl) VALUES ('$name', '$email', '$password','$adress')";

    if ($conn->query($query) === TRUE) {
        echo "Client registered successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}


function insertAdmin($name, $email, $password, $adress) {
    global $conn; 

    
    $query = "INSERT INTO admin (name_ad, email_ad, pass_ad, adress_ad) VALUES ('$name', '$email', '$password', '$adress')";

    // Execute the query and handle any errors
    if ($conn->query($query) === TRUE) {
        echo "Admin registered successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adress = $_POST["adress"];
    $role = $_POST["role"];

    if ($role == "Client") {
        insertClient($name, $email, $password, $adress);
        
        header("Location: shop.php");
        exit(); 
    } elseif ($role == "Admin") {
        insertAdmin($name, $email, $password, $adress);
        
        header("Location: admin.php");
        exit(); 
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>SignUp</title>
</head>
<body>
    
 <div class="container"></div>
  <div class="form-box">
    <h1 id="title">Sign Up</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php 
          if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
          }
        ?>
        <div class="input-group">
            <div class="input-field" id="namefield">
                <i class="bi bi-person"></i>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div class="input-field">
                <i class="bi bi-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-field">
                <i class="bi bi-shield-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="input-field">
                <i class="bi bi-house"></i>
                <input type="text" name="adress" placeholder="Address">
            </div>
            <div class="input-field">
                <i class="bi bi-person"></i>
                <select name="role">
                    <option value="none">Role</option>
                    <option value="Client">Client</option>
                    <option value="Admin">Admin</option>
                </select> 
            </div>
            
        </div>
        <div class="btn-field">
            <button type="submit" name="submit" id="signupbtn">Sign Up</button>
            <button type="submit" class="dis" id="signinbtn">Sign In</button>
        </div>
        <p>
            Lost password <a href="">Click here</a>
        </p>
    </form>
  </div> 
  <script>
    function validateForm() {
        var name = document.forms[0]["name"].value;
        var email = document.forms[0]["email"].value;
        var password = document.forms[0]["password"].value;
        var address = document.forms[0]["address"].value;
        var role = document.forms[0]["role"].value;

        if (name === "") {
            alert("Name must be filled out");
            return false;
        }

        if (email === "") {
            alert("Email must be filled out");
            return false;
        }

        if (password === "") {
            alert("Password must be filled out");
            return false;
        }

        if (address === "") {
            alert("Address must be filled out");
            return false;
        }

        if (role === "") {
            alert("Role must be selected");
            return false;
        }

        return true;
    }

    function switchToSignIn() {
        var namefield = document.getElementById("namefield");
        var title = document.getElementById("title");
        var signupbtn = document.getElementById("signupbtn");
        var signinbtn = document.getElementById("signinbtn");

        namefield.style.maxHeight = "0";
        title.innerHTML = "Sign In";
        signupbtn.classList.add('dis');
        signinbtn.classList.remove("dis");
    }
</script>
</body>
</html>
