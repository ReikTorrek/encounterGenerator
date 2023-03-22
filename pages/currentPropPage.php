<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../assets/src/jQuery.js"></script>
    <script src="../scripts/includer.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/tableStyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="navBar"></div>
<div id="navBar"></div>
<div id="pattern-table">
    <?php
    session_start();
    include dirname(__DIR__) . '/assets/templates/autoload.php';
    require_once dirname(__DIR__) . '/assets/const.php';

    const PROP_TYPE_ABILITY = 'abilities';
    const PROP_TYPE_BUFFS = ['buffs', 'debuff'];
    const PROP_TYPE_LOOT = 'loot';

    $emptyDescription = 'Nothing here';
    if (@$_GET['prop'] && @$_GET['propType']) {
        $abilitiesController = new AbilitiesController();
        $buffsController = new BuffsController();
        $lootController = new LootController();
        $userController = new UserController();
        $props = false;
        if ($_GET['propType'] == PROP_TYPE_ABILITY) {
            $props = $abilitiesController->getAbilityByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
        } elseif (in_array($_GET['propType'], PROP_TYPE_BUFFS)) {
            $props = $buffsController->getBuffsByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
        } elseif ($_GET['propType'] == PROP_TYPE_LOOT) {
            $props = $lootController->getLootByUId($userController->getUIdByLogin($_SESSION['username']), $_SESSION['gameId']);
        }
        while ($prop =  mysqli_fetch_assoc($props)) {
            if ($prop['name'] == $_GET['prop']) {
                echo
                    '
            <table class="pattern-table">
	            <tbody>
                    <tr id="'. $prop['id'] .'">
                        <td class="tdFirstColumn">' . $prop['name'] .'</td>
                        <td> ' . @$prop['description'] .'</td>
                    </tr>
                </tbody>
            </table>
            ';
            }
        }

    }
    ?>
</div>
</body>
</html>