<?php
require_once('connect.php');
session_start();
if (isset($_GET['abName']) && isset($_GET['abDescription']) && isset($_SESSION['username'])) {
    $diceType = '';
    if (isset($_GET['diceType'])) {
        $diceType = json_encode($_GET['diceType'], JSON_UNESCAPED_UNICODE);
    }
    $login = $_SESSION['username'];
    $abName = $_GET['abName'];
    $abDescription = $_GET['abDescription'];
    $query_tag = "SELECT id FROM users WHERE login = '$login'";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    $result = mysqli_fetch_assoc($tag_result);
    $id = (int) $result['id'];

    if ($connection->query("INSERT INTO abilities (userId, name, description, dice) VALUES (" . $id . ", '$abName', '$abDescription', '$diceType')")) {
        $_SESSION['messageAbility'] = 'Способность добавлена!';
    } else {
        $_SESSION['messageAbility'] = 'Что - то пошло не так...';
    }

    header('Location: http://localhost/2022/encounterGenerator/pages/adminPanel.php');
}