<?php

$name = isset($_GET['name']) ? $_GET['name'] : '';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];


    $host = 'localhost';
    $dbname = 'all_j_shop_general_merchandise';
    $dbusername = 'root';
    $dbpassword = '';

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }   
    echo "Connected successfully";

    $query = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    if($result->num_rows == 1) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo 'Incorrect username and password';
        exit();
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/login.css">
    <title>ALL J SHOP GENERAL MERCHANDISE</title>
</head>
<body>
    <!-- LOGIN -->
    <section class="login">
        <div class="container">
            <form action="" method="POST">
                <div class="logo">
                    <img src="../assets/LOGO.png" alt="ALL J SHOP GENERAL MERCHANDISE LOGO" class="logo">
                </div>
                <div class="input-container">
                    <div class="input">
                        <div class="label-input">
                            <label for="username" class="label">Username: </label>
                            <input type="text" name="username" id="username">
                        </div>
                        <label for="password" class="label">Password: </label>
                        <input type="password" name="password" id="password">
                    </div>
                </div>
                <div class="login-btn">
                    <button type="submit">LOGIN</button>
                </div>
            </form> 
        </div>
    </section>

    <script>
        <?php 
            echo "alert('Hi " . htmlspecialchars($name) . " ')";
        ?>
    </script>
</body>
</html>