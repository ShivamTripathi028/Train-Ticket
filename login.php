<?php

ob_start();
session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    die();
}

$MESSAGE = '';

if (isset($_POST['login'])) {

    //CONNECT TO THE DB
    @include 'dbconnect.php';

    //STORE VALUE IN VARIABLES
    $EMAIL = $_POST['uemail'];
    $PASSWORD = md5($_POST['upass']);
    $SQL = "SELECT * FROM user_data WHERE email='$EMAIL' AND password='$PASSWORD'";
    $RESULT = mysqli_query($con, $SQL);

    if ($RESULT && mysqli_num_rows($RESULT) > 0) {
        $ROW = mysqli_fetch_array($RESULT);
        $arrayNAME = explode(" ", $ROW['name']);
        $_SESSION['user'] = $arrayNAME[0];
        header("Location: home.php");
    } else {
        $MESSAGE = 'Username or password is invalid!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@500&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <div class="input-box">
            <form action="login.php" method="post">
                <h3>Login</h3>
                <input type="email" name="uemail" id="uemail" placeholder="Enter your email" required>
                <input type="password" name="upass" id="upass" placeholder="Enter your password" required>
                <p class="error" style="color: rgba(247, 19, 19, 0.874); font-size: large; display: block;">
                    <?php echo $MESSAGE; ?>
                </p>
                <input type="submit" name="login" value="Login" class="login-btn">
            </form>
        </div>
        <p>Don't have an account? <a href="register.php">Create one</a></p>
    </div>
</body>

</html>