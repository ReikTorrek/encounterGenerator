<?php
include dirname(__DIR__) . '/assets/templates/autoload.php';
include dirname(__DIR__) . '/assets/templates/header.php';
session_start();

const PROP_TYPE_ABILITY = 'abilities';
const PROP_TYPE_BUFFS = ['buffs', 'debuff'];
const PROP_TYPE_LOOT = 'loot';

$emptyDescription = 'Nothing here';
if (@$_GET['prop'] && @$_GET['propType']) {
    $abilitiesController = new AbilitiesController();
    $buffsController = new BuffsController();
    $lootController = new LootController();
    $userController = new UserController();
    $propRenderer = new CurrentPropPageRenderer();

    $props = false;
    if ($_GET['propType'] == PROP_TYPE_ABILITY) {
        $props = $abilitiesController->getAbilityByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
    } elseif (in_array($_GET['propType'], PROP_TYPE_BUFFS)) {
        $props = $buffsController->getBuffsByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
    } elseif ($_GET['propType'] == PROP_TYPE_LOOT) {
        $props = $lootController->getLootByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
    }
    echo '<div id="pattern-table">';
    while ($prop = mysqli_fetch_assoc($props)) {
        if ($prop['name'] == $_GET['prop']) {
            $propRenderer->renderItem($prop);
        }
    }
    echo '</div>';
}
include dirname(__DIR__) . '/assets/templates/footer.php';