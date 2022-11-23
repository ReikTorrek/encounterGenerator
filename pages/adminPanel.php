<?php
include realpath('../assets/const.php');
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="navBar"></div>

<div id="creatorSettings">
    <h2>Настройки панели создания событий</h2>
    <div id="statSettings">
        <h3>Настройка статов</h3>
        <form action="../PHP/statSettings.php" method="get">
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
        <span><?=@$_SESSION['messageStat'] ?: ""; $_SESSION['messageStat'] = "";?></span>
    </div>
    <div id="abilities">
        <h3>Настройка способностей</h3>
        <form action="../PHP/abilitySettings.php" method="get">
            <div class="inputAdminSettings">
                <span class="abName">Название способности</span><br>
                <input type="text" name="abName">
            </div>
            <div class="inputAdminSettings">
                <span class="abDescription">Описание способности</span><br>
                <input type="text" name="abDescription">
            </div>
            <div class="inputAdminSettings">
                <span class="abDice">Выберите куб способности</span><br>
                <select name="diceType" id="diceType" class="js-example-basic-single">
                    <?php
                    foreach (DICE_TYPES as $dice) {
                        ?>
                        <option value="<?= $dice ?>"> <?= $dice ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Добавить</button>
        </form>
        <span><?=@$_SESSION['messageAbility'] ?: ""; $_SESSION['messageAbility'] = "";?></span>
    </div>
</div>

<a href="userPage.php">Назад</a>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="../scripts/adminPanel.js"></script>
</body>
</html>
