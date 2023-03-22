<?php
include_once 'Component.php';
include_once dirname(__DIR__, 2) . '/const.php';

class AllAbilitiesRenderer
{
    private $abilityController;
    private $userController;
    public function __construct($abilityController, $userController)
    {
        $this->abilityController = $abilityController;
        $this->userController = $userController;
    }

    public function renderItem($login, $gameId = 0) {
        $userId = $this->userController->getUIdByLogin($login);
        $encounterSql = $this->abilityController->getAbilityByUId($userId, $gameId);
        $counter = $this->abilityController->getAbilitiesNum($userId, $gameId);
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
                if ($key == 'dice' &&  $value) {
                    $testJson = json_decode($value);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $separator = ', ';
                        $value = implode($separator, json_decode($value));
                    }
                }
                echo
                    '
                <tr id="'. $key .'">
                    <td class="tdFirstColumn">' . ABILITY_DB_TO_REAL_TEXT[$key] .'</td>
			        <td>' . $value .'</td>
                </tr>
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