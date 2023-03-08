<?php
include_once 'Component.php';
include_once dirname(__DIR__, 2) . '/const.php';

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