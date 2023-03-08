<?php
require_once dirname(__DIR__) . '/PHP/connect.php';

$gameId = json_decode($_POST['gameId']);
$sql = "DELETE FROM roll_plays WHERE id = " . $gameId;
$connection->query($sql);
