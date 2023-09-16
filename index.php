<?php
require("./core/config.php");
?>
<?php
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
  <title>صفحه ورود - CELINE</title>
</head>

<body>


  <form class="form" method="POST" action="/core/Functions/web?action=login">
    <?php
    if ($_SESSION['error'] == "login") {


    ?>
      <div class="alert alert-success" role="alert">
       ثبت نام انجام شد <br> وارد حساب خود شوید
      </div>
    <?php
      unset($_SESSION['error']);
    }elseif($_SESSION['error'] == "Username Or Pass"){
    ?>
      <div class="alert alert-danger" role="alert">
       نام کاربری یا رمز عبور اشتباه است
      </div>
    <?php    
    unset($_SESSION['error']);
    }
    ?>
    <div class="form-title"><span>ورود به حساب</span></div>
    <div class="title-2"><span>CELINE</span></div>
    <div class="input-container">
      <input class="input-mail text-center" name="one" type="text" placeholder="نام کاربری یا شماره تماس">
      <span> </span>
    </div>

    <section class="bg-stars">
      <span class="star"></span>
      <span class="star"></span>
      <span class="star"></span>
      <span class="star"></span>
    </section>

    <div class="input-container">
      <input class="input-pwd text-center" name="two" type="password" placeholder="رمز عبور">
    </div>
    <button type="submit" class="submit">
      <span class="sign-text">ورود به حساب</span>
    </button>

    <p class="signup-link">

      <a href="/register" class="up">همین الان ثبت نام کنید</a>

    </p>


  </form>


  <script src="/assets/js/script.js"></script>
  <script src="/assets/js/bootstrap.js"></script>
</body>

</html>