<?php
//MESSAGE DISPLAYING
global $MESSAGE;
$MESSAGE = '';

if (isset($_POST['submit'])) {

    //CONNECTING TO THE DB
    include 'dbconnect.php';

    //STORING FORM VALUES IN VARIABLE
    $NAME = $_POST['name'];
    $EMAIL = $_POST['email'];
    $PHNO = $_POST['phno'];
    $PASSWORD = $_POST['password'];
    $CPASSWORD = $_POST['cpassword'];
    $USERNAME_TAKEN = mysqli_query($con, "SELECT * FROM user_data WHERE name='$NAME'");
    $USER_EXISTS = mysqli_query($con, "SELECT * FROM user_data WHERE email='$EMAIL'");

    if ($USER_EXISTS && (mysqli_num_rows($USER_EXISTS) > 0)) {
        $MESSAGE='User Already Exists!';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@500&display=swap" rel="stylesheet">
    <title>Register Form</title>
</head>

<body>
    <div class="form-container">
        <form action="register.php" method="post">
            <h3>Sign Up</h3>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <input type="number" id="phno" name="phno" placeholder="Enter your phone number" required>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <input type="password" id="password" name="cpassword" placeholder="Confirm your password" required>
            <p class="error" style="color: rgba(247, 19, 19, 0.874); font-size: large; display: block;">
                <?php echo $MESSAGE; ?>
            </p>            
            <input type="submit" name="submit" value="Register" class="form-btn">
        </form>
        <p>Already have an account? <a href="login.php">Login Now</a></p>
    </div>
</body>

</html>