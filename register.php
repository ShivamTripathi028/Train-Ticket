<?php

//INDICATOR FOR SUCCESS TEMPLATE
$SUCCESS_MSG = false;

//CONNECTION TO THE DB DONE
include 'dbconnect.php';

//STORING FORM VALUES IN VARIABLE
$NAME = $_POST['name'];
$EMAIL = $_POST['email'];
$PHNO = $_POST['phno'];
$PASSWORD = $_POST['password'];
$CPASSWORD = $_POST['cpassword'];
$USER_EXISTS = false;


//DATA INSERTION DONE HERE
if(($PASSWORD == $CPASSWORD) && $USER_EXISTS == false) {
    $sql = "INSERT INTO `user_data` (`name`, `email`, `phone`, `password`, `date`) VALUES ('$NAME', '$EMAIL', '$PHNO', '$PASSWORD', current_timestamp() )";
    $result = mysqli_query($con,$sql);


        //IF DATA IS SUBMITTED IN THE DB, THE VALUE INDICATOR BECOMES TRUE
        if($result == true) {
            $SUCCESS_MSG = true;      
        }

}
?>

<?php

//SUCCESS TEMPLATE IS DISPLAYED
if($SUCCESS_MSG) {
    include 'success.html';
}

?>