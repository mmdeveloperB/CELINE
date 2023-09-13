<?php
require("../core/config.php");

$otppp = $_SESSION['login'];
$otpget = mysqli_query($conn,"SELECT * FROM user WHERE `Username`='$otppp' OR `Phone`='$otppp'");
$otpgets = mysqli_fetch_array($otpget);
if($otpgets['Status'] == "authentication"){
}elseif ($_SERVER['REQUEST_URI']=="/app/OTP") {
    header("LOCATION: /app");
    
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تایید شماره تلفن - CELINE</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/otp.css">
    <link rel="stylesheet" href="/assets/styles/bootstrap.rtl.min.css">
</head>

<body>
    <form class="form" method="POST" action="/core/Functions/web?action=otp">
        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] == "OTP") {
        ?>
            <div class="alert alert-danger" role="alert">
                کد وارد شده اشتباه میباشد
            </div>
        <?php
        unset($_SESSION['error']);
        }
        ?>
        <div class="title">OTP</div>
        <div class="title">کد تایید</div>
        <p class="message">برای تایید شما ، یک کد برای شماره همراه شما ارسال کردیم</p>
        <div class="inputs"> <input id="input1" autocomplete="off" name="one" type="text" maxlength="1"> <input id="input2" autocomplete="off" name="two" type="text" maxlength="1"> <input id="input3" autocomplete="off" name="three" type="text" maxlength="1"> <input id="input4" autocomplete="off" name="four" type="text" maxlength="1"> </div> <button class="action">تایید</button>
    </form>
</body>

</html>