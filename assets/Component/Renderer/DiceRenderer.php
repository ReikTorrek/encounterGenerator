<?php
include 'Component.php';
include dirname(__DIR__, 2) . '/const.php';

class DiceRenderer extends Component
{
    public function renderItem($itemId, $itemType = "")
    {
        echo '<img src="../assets/img/' . $itemId . '.png" id="' . $itemId . '" alt="">';
    }
}