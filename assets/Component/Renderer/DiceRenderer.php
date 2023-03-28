<?php
include_once dirname(__DIR__, 2) . '/const.php';

class DiceRenderer
{
    public function renderItem()
    {
        echo '<div class="dices" id="dicer">';
        foreach (DICE_TYPES as $dice) {
            echo '<img src="../assets/img/' . $dice . '.png" id="' . $dice . '" alt="">';
        }
        echo '<button  class="Button" id="clear">Clear</button></div>';
    }

    public function renderResult()
    {
        echo '
            <div class="diceResult" style="background-color: #111111">
                <span id="result" style="color: #af0000;">Нажми на куб, чтобы узнать результат...</span> <br>
                <span id="summ" style="color: #af0000;">Сумма</span><br>
            </div>
        ';
    }
    public function renderDiceCount()
    {
        echo '<input type="number" value="1" class="dice-counter" id="counter">';
    }
}