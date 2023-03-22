<?php
include '../assets/Component/Renderer/EncounterRenderer.php';
require_once dirname(__DIR__) . '/assets/Component/DB/UserController.php';
require_once dirname(__DIR__) . '/assets/Component/DB/StatController.php';
require_once dirname(__DIR__) . '/assets/Component/DB/BuffsController.php';
require_once dirname(__DIR__) . '/assets/Component/DB/LootController.php';
require_once dirname(__DIR__) . '/assets/Component/DB/AbilitiesController.php';
require_once '../PHP/connect.php';
session_start();
$renderer = new EncounterRenderer();
$userController = new UserController();
$statController = new StatController();
$lootController = new LootController();
$buffsController = new BuffsController();
$abilitiesController = new AbilitiesController();

include dirname(__DIR__) . '/assets/templates/header.php';
?>

<div id="userData">
<p>Привет, <?=$_SESSION['username'] ?></p>
</div>
<div id="adminPanel">
    <a href="adminPanel.php">Панель настройки генератора</a> <br>
    <a href="allCreatures.php">Страница всех существ</a> <br>
    <a href="allAbilities.php">Страница всех способностей</a>
    <div id="gameId" hidden><?=$_SESSION['gameId']?></div>
    <?php
    $result = mysqli_query($connection, "SHOW COLUMNS FROM encounter");
    $colsBlackList = ['userId', 'id', 'abilities', 'areals', 'buffs', 'loot', 'stats', 'debuff', 'gameId'];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['Field'], $colsBlackList))
                $renderer->renderItem($row['Field'], 'text');
        }
    }
    ?>
    <div class="encounterCreatorInput" id="stats">
        <p>Введите статы (Оставьте ноль, если его быть не должно)</p>
        <div class="stats">
        </div>
            <?php
            foreach ($statController->getStatNameByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']) as $stats)
                foreach($stats as $stat) {
                    ?>
                    <span> <?= $stat ?></span>
                    <input type="number" id="<?= $stat ?>" value="0" placeholder="Введите значение модификатора"> <br>
                    <?php
                }
            ?>
    </div>
    <div class="encounterCreatorInput" id="abilities">
        <p>Выберите способности</p>
        <select name="ability" multiple id="ability" class="js-example-basic-single">
        <?php
        foreach ($abilitiesController->getAbilityNameByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']) as $abilities)
        foreach($abilities as $ability) {
            ?>
            <option value="<?= $ability ?>"> <?= $ability ?></option>
            <?php
        }
        ?>
        </select>
    </div>
    <div class="encounterCreatorInput" id="buff">
        <p>введите названия его баффов</p>
        <select name="buff" multiple id="buff" class="js-example-basic-single">
            <?php
            foreach ($buffsController->getBuffNameByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']) as $buffs)
                foreach($buffs as $buff) {
                    ?>
                    <option value="<?= $buff ?>"> <?= $buff ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="encounterCreatorInput" id="debuff">
        <p>Введите названия его дебаффов</p>
        <select name="debuff" multiple id="debuff" class="js-example-basic-single">
            <?php
            foreach ($buffsController->getDebuffByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']) as $debuffs)
                foreach($debuffs as $debuff) {
                    ?>
                    <option value="<?= $debuff ?>"> <?= $debuff ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="encounterCreatorInput" id="loot">
        <p>Введите лут.</p>
        <select name="loot" multiple id="loot" class="js-example-basic-single">
            <?php
            foreach ($lootController->getLootNameByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']) as $loots)
                foreach($loots as $loot) {
                    ?>
                    <option value="<?= $loot ?>"> <?= $loot ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <input type="button" value="Добавить существо." id="sendCreatureData">
</div>

<a href="../PHP/logout.php">Выйти</a>

<?php
include dirname(__DIR__) . '/assets/templates/footer.php';