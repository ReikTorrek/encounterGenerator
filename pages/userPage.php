<?php
include '../assets/Component/EncounterRenderer.php';
require_once '../PHP/connect.php';
session_start();
$renderer = new EncounterRenderer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../assets/src/jQuery.js"></script>
    <script src="../scripts/includer.js"></script>
    <script src="../scripts/dataSender.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="navBar"></div>
<div id="userData">
<p>Привет, <?=$_SESSION['username'] ?></p>
</div>
<div id="adminPanel">
    <a href="adminPanel.php">Панель настройки генератора</a>
    <?php
    $result = mysqli_query($connection, "SHOW COLUMNS FROM encounter");
    $colsBlackList = ['userId', 'id', 'abilities', 'areals', 'buffs', 'loot', 'mods'];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['Field'], $colsBlackList))
                $renderer->renderItem($row['Field'], 'text');
        }
    }
    ?>
    <div class="encounterCreatorInput" id="mods">
        <p>Введите модификаторы</p>
    </div>
    <div class="encounterCreatorInput" id="abilities">
        <p>Введите названия способностей</p>
    </div>
    <div class="encounterCreatorInput" id="buff">
        <p>введите названия его баффов</p>
    </div>
    <div class="encounterCreatorInput" id="debuff">
        <p>Введите названия его дебаффов</p>
    </div>
    <div class="encounterCreatorInput" id="loot">
        <p>Введите лут.</p>
    </div>

    <input type="button" value="Добавить существо." id="sendCreatureData">
</div>

<a href="../PHP/logout.php">Выйти</a>
</body>
</html>