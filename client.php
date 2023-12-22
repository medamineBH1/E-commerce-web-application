<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Clients</title>
    <style>
          @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
        body {
            font-family: "Spartan", sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .delete-btn {
            padding: 5px 10px;
            background-color: #088178;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #ff1744;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
     <script src="script.js">
       /* function deleteClient(clientId) {
            if (confirm("Are you sure you want to delete this client?")) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete-client.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log('Client deleted successfully');
                        location.reload(); 
                    } else {
                        console.log('Error deleting client');
                    }
                };
                xhr.send('clientId=' + encodeURIComponent(clientId));
            }
        }*/
    </script>
</head>
<body>
    <h1>Client List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = '127.0.0.1';
            $username = 'root';
            $password = '';
            $dbname = 'pfa';

            // Connect to the database
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die('Database connection error: ' . mysqli_connect_error());
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['clientId'])) {
                    $clientId = $_POST['clientId'];

                    // Perform the deletion query
                    $deleteQuery = "DELETE FROM client WHERE id_cl = '$clientId'";
                    $deleteResult = mysqli_query($conn, $deleteQuery);

                    if ($deleteResult) {
                        echo 'Client deleted successfully';
                        // Optionally, you can return a success message or redirect to a different page
                    } else {
                        echo 'Error deleting client';
                        // Optionally, you can return an error message or handle the error accordingly
                    }
                } else {
                    echo 'Invalid request';
                    // Handle the case when clientId parameter is not provided
                }
            }

            // Fetch client data from the database
            $query = "SELECT * FROM client";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die('Query error: ' . mysqli_error($conn));
            }

            // Loop through the client data and generate table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id_cl'] . '</td>';
                echo '<td>' . $row['name_cl'] . '</td>';
                echo '<td>' . $row['email_cl'] . '</td>';
                echo '<td><button class="delete-btn" onclick="deleteClient(' . $row['id_cl'] . ')">Delete</button></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="message">
        <!-- Display success or error message here -->
    </div>
</body>
</html>