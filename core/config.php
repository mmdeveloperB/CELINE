<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'celine');
session_start();
error_reporting(1);
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($conn) {
    
}else {
    print("Connection Error");
    die();
}
//User Data
$session = $_SESSION['login'];
$get = mysqli_query($conn,"SELECT * FROM user WHERE `Username`='$session' OR `Phone`='$session'");
$fetch = mysqli_fetch_array($get);
$username = $fetch['Username'];
$name = $fetch['Name'];
$User_ID = $fetch['User_ID'];
$phone = $fetch['Phone'];

?>