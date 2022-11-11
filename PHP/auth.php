<?php
session_start();
require_once ('connect.php');

if (isset($_POST['login']) && isset($_POST['password'])){
    $username = $_POST['login'];
    $password = $_POST['password'];
    var_dump($username);
    $query = "SELECT * FROM users WHERE login = '$username' and password = '$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    $isAdmin = mysqli_fetch_assoc($result);
    if ($count == 1){
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = $isAdmin['id'];
        header('Location: http://localhost/2022/encounterGenerator/pages/userPage.php');
    }
    else{
        $_SESSION['msgg'] = "Данные введены неверно.";
        header('Location: http://localhost/2022/encounterGenerator/pages/authorize.php');
    }
}