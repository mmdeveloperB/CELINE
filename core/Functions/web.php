<?php
require("../config.php");
$action = $_GET['action'];

if ($action == "register") {
    $name = $_POST['name'];
    $family = $_POST['family'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if ($password == $repassword && $repassword == $password) {
        $passwd = md5($_POST['password']);
        $UserID = mt_rand(1000, 5000000);
        $sql = "INSERT INTO `user`(`User_ID`, `Username`, `Password`, `Phone`, `Name`, `Family`, `Status`, `Ban`) VALUES ('$UserID','$username','$passwd','$phone','$name','$family','authentication','0')";
        $send = mysqli_query($conn, $sql);

        $code = mt_rand(1000, 9999);
        $text = "سلام، به خوش آمدید به سرویس CELINE <br> کد تایید شما" . $code;
        $insertcode = mysqli_query($conn, "INSERT INTO `code`(`Code`, `Phone`,`Status`) VALUES ('$code','$phone','InActive')");


        
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "mobile": "' .$phone. '",
        "templateId": 289653,
        "parameters": [
          {
            "name": "CODE",
            "value": "'.$code.'"
          }
        ]
      }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Accept: text/plain',
          'x-api-key: wYXNoWeR9LZtPkgU4bMJzdV6O8f9HidTx0FuHnNM0RGKZB0gXK3SbU15y505GLFO'
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      echo $response;



        if ($send) {
          $_SESSION['error'] = "login";
          header("LOCATION: /");
        }
    } else {
        $_SESSION['error'] = "pass";
        header("LOCATION: /register");
    }
}
if ($action == "login") {
    $one = $_POST['one'];
    $two = md5($_POST['two']);
    $getusers = mysqli_query($conn, "SELECT * FROM user WHERE `Username`='$one' OR `Phone`='$one' AND `Password`='$two' ");
    $num = mysqli_num_rows($getusers);
    if ($num > 0) {
        $_SESSION['login'] = $one;
        header("LOCATION: /app");
    } else {
        $_SESSION['error'] = "Username Or Pass";
        header("LOCATION: /");
    }
}
if ($action=="otp") {
  $one = $_POST['one'];
  $two = $_POST['two'];
  $three = $_POST['three'];
  $four = $_POST['four'];
  $finalcode = $one.$two.$three.$four;
  $getcodes = mysqli_query($conn,"SELECT * FROM code WHERE `Phone`='$phone' AND `Code`='$finalcode' AND `Status`='InActive' ORDER BY `ID`");
  $getnum = mysqli_num_rows($getcodes);
  $getfetch = mysqli_fetch_array($getcodes);
  if ($getnum > 0) {
    $id = $getfetch['ID'];
    $update = mysqli_query($conn,"UPDATE `code` SET `Status`='Active' WHERE `ID`='$id'");
    $update2 = mysqli_query($conn,"UPDATE `user` SET `Status`='Active' WHERE `Username`='$username'");
    header("LOCATION: /app/");
  }else {
    $_SESSION['error'] = "OTP";
    header("LOCATION: /app/OTP");
  }
}
if ($action == "logout") {
  if (isset($_SESSION['login'])) {
      unset($_SESSION['login']);
      header("LOCATION: /");
  }
}
