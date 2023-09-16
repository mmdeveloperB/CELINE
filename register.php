<?php
require("./core/config.php");
if (isset($_SESSION['login'])) {
  header("LOCATION: /app");
} else {
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <title>ثبت نام - CELINE</title>
</head>
<body>

<form class="form" method="POST" action="/core/Functions/web.php?action=register">
  
<?php
if ($_SESSION['error'] == "pass") {
  

?>
<div class="alert alert-danger" role="alert">
  رمز عبور یکسان نیست
</div>
<?php
unset($_SESSION['error']);
}
?>
     <div class="form-title"><span>ثبت نام</span></div>
      <div class="title-2"><span>CELINE</span></div>
      <div class="input-container">
        <input class="input-mail text-center" name="name" type="text" placeholder="*نام">
        <input class="input-mail text-center" name="family" type="text" placeholder="نام خانوادگی">
        <input class="input-mail text-center" name="username" type="text" placeholder="*نام کاربری">
        <input class="input-mail text-center" name="phone" type="text" placeholder="*شماره تماس">
        <input class="input-mail text-center" name="password" type="password" placeholder="*رمز عبور">
        <span> </span>
      </div>

      <section class="bg-stars">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
      </section>

      <div class="input-container">
        <input class="input-pwd text-center" name="repassword" type="password" placeholder="*تکرار رمز عبور">
      </div>
      <button type="submit" class="submit">
        <span class="sign-text">ثبت نام</span>
      </button>

      <p class="signup-link">
        
        <a href="/" class="up">همین الان وارد حساب خود شوید</a>
       
      </p>
      
       
   </form>


    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
</body>
</html>