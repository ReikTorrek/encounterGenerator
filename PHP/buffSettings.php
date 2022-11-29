<?php

require_once('connect.php');
session_start();
if (isset($_GET['buffName']) && isset($_GET['buffDescription']) && isset($_SESSION['username'])) {
    $isBuff = NULL;

    if (isset($_GET['isBuff'])) {
        $isBuff = true;
    }
    $login = $_SESSION['username'];
    $buffName = $_GET['buffName'];
    $buffDescription = $_GET['buffDescription'];
    $query_tag = "SELECT id FROM users WHERE login = '$login'";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    $result = mysqli_fetch_assoc($tag_result);
    $id = (int)$result['id'];

    if ($connection->query("INSERT INTO buffs (userId, name, description, isBuff) VALUES (" . $id . ", '$buffName', '$buffDescription', '$isBuff')")) {
        $_SESSION['messageBuff'] = 'бафф/дебафф добавлен!';
    } else {
        $_SESSION['messageBuff'] = 'Что - то пошло не так...';
    }

    header('Location: http://localhost/2022/encounterGenerator/pages/adminPanel.php');
}