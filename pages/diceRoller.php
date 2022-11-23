<?php
include '../assets/Component/Renderer/DiceRenderer.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../assets/src/jQuery.js"></script>
    <script src="../scripts/includer.js"></script>
    <script src="../scripts/diceRoller.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/dicer.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a7e9f794eb.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="navBar"></div>
<div class="dices" id="dicer">
    <?php
    $diceRenderer = new DiceRenderer();
    foreach (DICE_TYPES as $dice) {
        $diceRenderer->renderItem($dice);
    }
    ?>
    <button  class="Button" id="clear">Clear</button>   
</div>
<div class="diceResult">
    <span id="result">Нажми на куб, чтобы узнать результат...</span> <br>
    <span id="summ">Сумма</span><br>
</div>
</body>
</html>