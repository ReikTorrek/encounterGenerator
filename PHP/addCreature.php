<?php
require_once 'connect.php';
session_start();

if (@$_POST['addCreature'] && @$_SESSION['userId']) {
    $creature = json_decode($_POST['addCreature']);
    $userId = $_SESSION['userId'];
    $query = "INSERT INTO encounter (name, race, type, class, lvl, aligment, HP, AC, armor, actions, defenceActions, userId, abilities, buffs, debuff)
                VALUES ('" . $creature->name . "', '" . $creature->race . "', '" . $creature->type . "',
                 '" . $creature->class . "', '" . $creature->lvl . "', '" . $creature->aligment . "',
                 '" . $creature->HP . "', '" . $creature->AC . "', '" . $creature->armor . "',
                 '" . $creature->actions . "', '" . $creature->defenceActions . "', '" . $userId . "', '" . json_encode($creature->ability, JSON_UNESCAPED_UNICODE) . "',
                 '" . json_encode($creature->buff, JSON_UNESCAPED_UNICODE) ."', '" . json_encode($creature->debuff, JSON_UNESCAPED_UNICODE) ."')";
    var_dump($query);
    mysqli_query($connection, $query);

}