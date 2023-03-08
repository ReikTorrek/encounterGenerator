<?php
require_once('connect.php');
session_start();
if (isset($_GET['lootName']) && isset($_GET['lootDescription']) && isset($_SESSION['username'])) {

    $login = $_SESSION['username'];
    $gameId = $_SESSION['gameId'];
    $lootName = $_GET['lootName'];
    $lootDescription = $_GET['lootDescription'];
    $query_tag = "SELECT id FROM users WHERE login = '$login'";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    $result = mysqli_fetch_assoc($tag_result);
    $id = (int) $result['id'];

    if ($connection->query("INSERT INTO loot (userId, name, description, gameId) VALUES (" . $id . ", '$lootName', '$lootDescription', '$gameId')")) {
        $_SESSION['messageLoot'] = 'Лут добавлен!';
    } else {
        $_SESSION['messageLoot'] = 'Что - то пошло не так...';
    }

    header('Location: http://localhost/2022/encounterGenerator/pages/adminPanel.php');
}