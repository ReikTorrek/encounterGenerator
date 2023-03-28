<?php
include dirname(__DIR__) . '/assets/templates/autoload.php';
include dirname(__DIR__) . '/assets/templates/header.php';

$diceRenderer = new DiceRenderer();
$diceRenderer->renderItem();
$diceRenderer->renderDiceCount();
$diceRenderer->renderResult();

include dirname(__DIR__) . '/assets/templates/footer.php';