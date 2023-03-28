<?php
require_once dirname(__DIR__) . '/assets/templates/autoload.php';
include dirname(__DIR__) . '/assets/templates/header.php';

if (isset($_SESSION['gameId'])) {
    echo '<div id="navBar"></div>';
}
$gameRenderer = new GameRenderer();
$gameRenderer->renderGameCreator();
include dirname(__DIR__) . '/assets/templates/footer.php';
