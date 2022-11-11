<?php
include 'Component.php';
include dirname(__DIR__) . '/const.php';

class EncounterRenderer extends Component
{


    public function renderItem($itemId, $itemType)
    {
        echo '
        <div class="encounterCreatorInput" id="' . $itemId . '">
        <p>' . ENCOUNTERGENERATORTEXTS[$itemId] . '</p>
        <input type="text" name="' . $itemId . '" id="' . $itemId . '">
        </div>
        ';
        // TODO: Implement renderItem() method.
    }


}