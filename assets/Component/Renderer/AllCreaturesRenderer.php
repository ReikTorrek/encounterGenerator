<?php
include_once dirname(__DIR__, 2) . '/const.php';

class AllCreaturesRenderer
{

    private $encounterController;
    private $userController;
    public function __construct($encounterController, $userController)
    {
        $this->encounterController = $encounterController;
        $this->userController = $userController;
    }

    public function renderItem($login, $gameId)
    {
        $userId = $this->userController->getUIdByLogin($login);
        $encounterSql = $this->encounterController->getEncounterByUId($userId, $gameId);
        $counter = $this->encounterController->getEncounterNum($userId, $gameId);
        echo '<div id="pattern-table">';
        for ($i = 0; $i < $counter; $i++) {
            $row = $encounterSql->fetch_assoc();
            unset($row['id'], $row['userId'], $row['gameId']);
            echo
            '
            <table class="pattern-table">
	            <tbody>
            ';
            foreach ($row as $key => $value) {
                if ($key == 'stats' && $value) {
                    $stats = (array) json_decode($value);
                    $resultValue = '';
                    foreach ($stats as $stat => $mod) {
                        $resultValue .= $stat . ': ' . $mod . ' <br>';
                    }
                    $value = $resultValue;
                }
                echo
                '
                <tr id="'. $key .'">
                    <td class="tdFirstColumn">' . ENCOUNTER_DB_TOREADEBLETEXT[$key] .'</td>
                    <td class="tdValue" id="' . $key .'">';
                    if ($key == 'abilities' && $value
                        || $key == 'buffs' && $value
                        || $key == 'debuff' && $value
                        || $key == 'loot' && $value
                    ) {
                        foreach (json_decode($value) as $item) {
                            echo '<a href="currentPropPage.php?prop=' . $item . '&propType=' . $key . ' " target="_blank">' . $item .'.</a> ';
                        }
                    } else {
                        echo '<span>' . $value .'</span>';
                    }
                echo '</td></tr>
                ';
            }
            echo
            '	
	            </tbody>
            </table>
            ';
        }
        echo '</div>';
    }
}