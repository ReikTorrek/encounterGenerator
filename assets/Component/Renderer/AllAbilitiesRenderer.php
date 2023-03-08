<?php
include_once 'Component.php';
include_once dirname(__DIR__, 2) . '/const.php';
include_once dirname(__DIR__) . '/DB/DBSelect.php';

class AllAbilitiesRenderer
{
    public function renderItem($login, $gameId = 0) {
        $DB = new DBSelect();
        $userId = $DB->getUIdByLogin($login);
        $encounterSql = $DB->getAbilityByUId($userId, $gameId);
        $counter = $DB->getAbilitiesNum($userId, $gameId);
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
    }
}