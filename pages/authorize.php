<?php
session_start();
/*$_SESSION['msgg'] = "";*/

?>
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
<form action="../PHP/auth.php" method="post">
    <div class="login">
        <span>login</span><br>
        <input type="text" id="login" name="login">
    </div>
    <div class="password">
        <span>password</span> <br>
        <input type="password" id="password" name="password">
    </div>
    <input type="submit" value="Войти">
    <span> <?=$_SESSION['msgg'] ?> </span>
</form>
<a href="registration.php"><button>Регистрация</button></a>
</body>
</html>