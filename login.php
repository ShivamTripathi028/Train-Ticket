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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login-1.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="parent">
        <div class="child">
            <div class="login">
                <div class="input">
                    <div class="login-box">
                        <form action="" method="post">
                            <h3>Login</h3>
                            <p>Don't have an account? <a class="link" href="register.php">Create one</a></p>
                            <input type="email" class="text-input" name="uname" id="uname" placeholder="Enter your email">
                            <input type="password" class="text-input" name="upass" id="upass" placeholder="Enter your password">
                            <input type="submit" value="Login" class="login-btn">
                        </form>
                        <p class="error"><?php echo $MESSAGE;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>