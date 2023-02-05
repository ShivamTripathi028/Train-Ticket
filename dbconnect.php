<!-- TO ESTABLISH A CONNECTION TO DB -->
<?php

$con = new mysqli('localhost','root','','train');

if(!$con) {
die("Connection Unsuccesful: " .mysqli_connect_error());
}

?>