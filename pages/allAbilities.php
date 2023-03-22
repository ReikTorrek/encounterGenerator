<?php
require_once dirname(__DIR__) . '/assets/templates/autoload.php';
session_start();
$abilities = new AbilitiesController();
$user = new UserController();
$renderer = new AllAbilitiesRenderer($abilities, $user);
include dirname(__DIR__) . '/assets/templates/header.php';

$renderer->renderItem($_SESSION['username'], $_SESSION['gameId']);

include dirname(__DIR__) . '/assets/templates/footer.php';