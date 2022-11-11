<?php
require_once 'connect.php';
session_start();
var_dump(json_decode($_POST['addCreature']), $_SESSION['userId']);
if (@$_POST['addCreature'] && @$_SESSION['userId']) {
    $creature = json_decode($_POST['addCreature']);
    $userId = $_SESSION['userId'];
    $query = "INSERT INTO encounter (name, race, type, class, lvl, aligment, HP, AC, armor, actions, defenceActions, userId)
                VALUES ('" . $creature->name . "', '" . $creature->race . "', '" . $creature->type . "',
                 '" . $creature->class . "', '" . $creature->lvl . "', '" . $creature->aligment . "',
                 '" . $creature->HP . "', '" . $creature->AC . "', '" . $creature->armor . "',
                 '" . $creature->actions . "', '" . $creature->defenceActions . "', '" . $userId . "')";
    var_dump('asdasd ' . $query);
    mysqli_query($connection, $query);

}