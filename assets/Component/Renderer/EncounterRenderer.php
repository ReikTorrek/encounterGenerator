<?php
include_once 'Component.php';
include_once dirname(__DIR__, 2) . '/const.php';

class EncounterRenderer
{

    public function renderItem($itemId)
    {
        echo '
        <div class="encounterCreatorInput" id="' . $itemId . '">
        <p>' . ENCOUNTERGENERATORTEXTS[$itemId] . '</p>
        <input type="text" name="' . $itemId . '" id="' . $itemId . '">
        </div>
        ';
    }

}