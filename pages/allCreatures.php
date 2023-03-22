<?php
require_once dirname(__DIR__) . '/assets/templates/autoload.php';
session_start();
$encounterController = new EncountersController();
$renderer = new AllCreaturesRenderer($encounterController, new UserController());
include dirname(__DIR__) . '/assets/templates/header.php';

$renderer->renderItem($_SESSION['username'], $_SESSION['gameId']);

include dirname(__DIR__) . '/assets/templates/footer.php';