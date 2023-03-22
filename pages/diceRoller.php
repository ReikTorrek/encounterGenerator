<?php
include dirname(__DIR__) . '/assets/templates/autoload.php';
include dirname(__DIR__) . '/assets/templates/header.php';

?>

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
    <span id="result" style="color: #af0000;">Нажми на куб, чтобы узнать результат...</span> <br>
    <span id="summ" style="color: #af0000;">Сумма</span><br>
</div>
<?php
include dirname(__DIR__) . '/assets/templates/footer.php';