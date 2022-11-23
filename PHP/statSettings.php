<?php
require_once ('connect.php');
session_start();
if (isset($_GET['statName']) && isset($_GET['statMod']) && isset($_SESSION['username'])) {
    $login = $_SESSION['username'];
    $statName = $_GET['statName'];
    $statMod = $_GET['statMod'];
    $query_tag = "SELECT id FROM users WHERE login = '$login'";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    $result = mysqli_fetch_assoc($tag_result);
    $id = $result['id'];
    $connection->query("INSERT INTO statsettings (userId, statName, statMod) VALUES ('$id', '$statName', '$statMod') ");
    $_SESSION['messageStat'] = 'Стат добавлен!';
    header('Location: http://localhost/2022/encounterGenerator/pages/adminPanel.php');
}