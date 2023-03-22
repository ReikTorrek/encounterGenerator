<?php
    session_start();
$authorized = 'http://localhost/2022/encounterGenerator/pages/userPage.php';
$notAuthorized = 'http://localhost/2022/encounterGenerator/pages/authorize.php';
$link = "";
$menuName = "";
if (isset($_SESSION['username'])) {
    $link = $authorized;
    $menuName = $_SESSION['username'];
} else {
    $link = $notAuthorized;
    $menuName = 'Авторизоваться';
}
?>

<input type="checkbox" name="" id="menuBtn">
<div class="menu_overlay">
    <label for="menuBtn">
        <i class="fas fa-times"></i>
    </label>
    <ul>
        <li><a href="http://localhost/2022/encounterGenerator/pages/encounterGenerator.php">Генеартор событий</a></li>
        <li><a href="http://localhost/2022/encounterGenerator/pages/diceRoller.php">Кубомёт</a></li>
        <li><a href="<?=$link;  ?>"><?=$menuName; ?></a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li><a href="http://localhost/2022/encounterGenerator/pages/allCreatures.php">Мои существа</a></li>';
        }
        if (isset($_SESSION['username'])) {
            echo '<li><a href="http://localhost/2022/encounterGenerator/pages/allAbilities.php">Мои способности</a></li>';
        }
        ?>
        <li><a href="http://localhost/2022/encounterGenerator/pages/main.php">Домой</a></li>
        <li><a href="http://localhost/2022/encounterGenerator/index.php">К выбору ролевой</a></li>
    </ul>
</div>
<div class="landing_page">
    <div class="menu">
        <label for="menuBtn">
            <i class="fas fa-bars"></i>
        </label>
    </div>
</div>