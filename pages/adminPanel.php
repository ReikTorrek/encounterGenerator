<?php
session_start();

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

<div id="creatorSettings">
    <form action="adminPanel.php" method="get">
        <h2>Настройки панели создания событий</h2>
        <div class="inputAdminSettings">
            <span class="statName">Название стата</span><br>
            <input type="text" name="statName">
        </div>
        <div class="inputAdminSettings">
            <span class="statMod">Количество для 1 модификатора</span><br>
            <input type="text" name="statMod">
        </div>
        <button type="submit">Добавить</button>
    </form>
</div>

<a href="userPage.php">Назад</a>
</body>
</html>

<?php
require_once ('../PHP/connect.php');
if (isset($_GET['statName']) && isset($_GET['statMod']) && isset($_SESSION['username'])) {
    $login = $_SESSION['username'];
    $statName = $_GET['statName'];
    $statMod = $_GET['statMod'];
    $query_tag = "SELECT id FROM users WHERE login = '$login'";
    $tag_result = mysqli_query($connection, $query_tag) or die (mysqli_error($connection));
    $result = mysqli_fetch_assoc($tag_result);
    $id = $result['id'];
    $connection->query("INSERT INTO statsettings (id, statName, statMod) VALUES ('$id', '$statName', '$statMod') ");
}
