<?php
//MESSAGE DISPLAYING
global $MESSAGE;
$MESSAGE = '';

if (isset($_POST['submit'])) {

    //CONNECTING TO THE DB
    include 'dbconnect.php';

    //STORING FORM VALUES IN VARIABLE
    $NAME = trim($_POST['name']);
    $EMAIL = $_POST['email'];
    $PHNO = $_POST['phno'];
    $PASSWORD = $_POST['password'];
    $CPASSWORD = $_POST['cpassword'];
    $USERNAME_TAKEN = mysqli_query($con, "SELECT * FROM user_data WHERE name='$NAME'");
    $USER_EXISTS = mysqli_query($con, "SELECT * FROM user_data WHERE email='$EMAIL'");

    if ($USER_EXISTS && (mysqli_num_rows($USER_EXISTS) > 0)) {
        $MESSAGE = 'User Already Exists!';
    } elseif ($USERNAME_TAKEN && (mysqli_num_rows($USERNAME_TAKEN) > 0)) {
        $MESSAGE = 'Username is already taken';
    } else {
        if ($PASSWORD == $CPASSWORD) {
            $PASSWORD = md5($PASSWORD);
            $sql = "INSERT INTO `user_data` (`name`, `email`, `phone`, `password`, `date`) VALUES ('$NAME', '$EMAIL', '$PHNO', '$PASSWORD', current_timestamp() )";
            $result = mysqli_query($con, $sql);
            $MESSAGE = 'User registered successfully!';
        } else {
            $MESSAGE = 'Passwords did not match!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@500&display=swap" rel="stylesheet" />
    <title>Register Page</title>
</head>

<body>
    <div class="parent">
        <div class="child">
            <div class="login">
                <div class="input">
                    <div class="login-box">
                        <div class="image">
                            <a href="index.html"><img src="homeIcon.png" alt="Home Icon" /></a>
                        </div>
                        <form action="" method="post">
                            <h3>Register</h3>
                            <p>
                                Already have an account?
                                <a class="link" href="login.php">Sign in</a>
                            </p>
                            <input type="text" class="text-input" id="name" name="name" placeholder="Enter your name" required />
                            <input type="email" class="text-input" id="email" name="email" placeholder="Enter your email" required />
                            <input type="number" class="text-input" id="phno" name="phno" placeholder="Enter your phone number" required />
                            <input type="password" class="text-input" id="password" name="password" placeholder="Enter your password" required />
                            <input type="password" class="text-input" id="password" name="cpassword" placeholder="Confirm your password" required />
                            <input type="submit" name="submit" value="Register" class="login-btn">
                        </form>
                        <p class="error"><?php echo $MESSAGE; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>