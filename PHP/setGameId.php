<?php
session_start();
$_SESSION['gameId'] = json_decode($_POST['gameId']);