<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <script src="../assets/src/jQuery.js"></script>
  <script src="../scripts/includer.js"></script>
  <link rel="stylesheet" href="../styles/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="navBar"></div>
<form action="../PHP/registration.php" id="Reg" method="POST">

    <div class="dws-input">
        <input type="text" name="login"  placeholder="Придумайте логин" require value="">
    </div>

    <div class="dws-input">
        <input type="password" class = "password" name="password"  placeholder="Придумайте пароль" require value="">
    </div>

    <div class="dws-input">
        <input type="password" class ="password1" name="password1"  placeholder="Повторите пароль" require value="">
    </div>
    <div class="dws-input">
        <button class="btn btn-success"  type ="submit" >Регистрация</button>
    </div>
    <a href="../index.html">Отмена</a>

    <p>
        <?php
                error_reporting(0);
                session_start();
                if($_SESSION['msgg']){
                    echo '<p class="msg">'. $_SESSION['msgg'] . '</p>';
    }
    unset($_SESSION['msgg']);
    ?>
    </p>

</form>
</body>
</html>