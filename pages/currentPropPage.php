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
    include dirname(__DIR__) . '/assets/Component/DB/DBSelect.php';
    include dirname(__DIR__) . '/assets/const.php';

    const PROP_TYPE_ABILITY = 'abilities';
    const PROP_TYPE_BUFFS = ['buffs', 'debuff'];
    const PROP_TYPE_LOOT = 'loot';

    $emptyDescription = 'Nothing here';
    if (@$_GET['prop'] && @$_GET['propType']) {
        $db = new DBSelect();
        $props = false;
        if ($_GET['propType'] == PROP_TYPE_ABILITY) {
            $props = $db->getAbilityByUId($db->getUIdByLogin($_SESSION['username']));
        } elseif (in_array($_GET['propType'], PROP_TYPE_BUFFS)) {
            $props = $db->getBuffsByUId($db->getUIdByLogin($_SESSION['username']));
        } elseif ($_GET['propType'] == PROP_TYPE_LOOT) {
            $props = $db->getLootByUId($db->getUIdByLogin($_SESSION['username']));
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