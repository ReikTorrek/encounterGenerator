<?php
include dirname(__DIR__) . '/assets/templates/autoload.php';
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
                <select name="diceType[]" id="diceType" class="js-example-basic-single" multiple>
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
    <div id="buffs">
        <h3>Настройка Баффов и дебаффов</h3>
        <form action="../PHP/buffSettings.php" method="get">
            <div class="inputAdminSettings">
                <span class="buffSettings">Название баффа/дебаффа</span><br>
                <input type="text" name="buffName">
            </div>
            <div class="inputAdminSettings">
                <span class="buffDescription">Описание баффа/дебаффа</span><br>
                <input type="text" name="buffDescription">
            </div>
            <div class="inputAdminSettings">
                <span class="isBuff">выбери, если это бафф</span><br>
                <input type="radio" onMouseDown="this.isChecked=this.checked;"
                       onClick="this.checked=!this.isChecked;" name="isBuff" value="<?= true ?>">
            </div>
            <button type="submit">Добавить</button>
        </form>
        <span><?=@$_SESSION['messageBuff'] ?: ""; $_SESSION['messageBuff'] = "";?></span>
    </div>
    <div id="lootSettings">
        <h3>Добавление лута в базу данных</h3>
        <form action="../PHP/lootSettings.php" method="get">
            <div class="inputAdminSettings">
                <span class="lootName">Название лута</span><br>
                <input type="text" name="lootName">
            </div>
            <div class="inputAdminSettings">
                <span class="lootDescription">Описание лута</span><br>
                <input type="text" name="lootDescription">
            </div>
            <button type="submit">Добавить</button>
        </form>
        <span><?=@$_SESSION['messageLoot'] ?: ""; $_SESSION['messageLoot'] = "";?></span>
    </div>
</div>

<a href="userPage.php">Назад</a>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="../scripts/adminPanel.js"></script>
<script language="JavaScript">
    function uncheckAllRadio(name){
        var obj = document.getElementsByName(name);
        for(i=0; i
            obj[i].checked = false;
    }
</script>
</body>
</html>

