<?php
include 'Component.php';
include dirname(__DIR__, 2) . '/const.php';
include dirname(__DIR__) . '/DB/DBSelect.php';

class AllCreaturesRenderer
{

    public function renderItem($login)
    {
        $DB = new DBSelect();
        $userId = $DB->getUIdByLogin($login);
        $encounterSql = $DB->getEncounterByUId($userId);
        $counter = $DB->getEncounterNum($userId);
        for ($i = 0; $i < $counter; $i++) {
            $row = $encounterSql->fetch_assoc();
            unset($row['id'], $row['userId']);
            echo
            '
            <table class="pattern-table">
	            <tbody>
            ';
            foreach ($row as $key => $value) {
                if ($key == 'abilities' && $value
                    || $key == 'buffs' && $value
                    || $key == 'debuff' && $value) {
                    $separator = ', ';
                    $value = implode($separator, json_decode($value));
                }
                echo
                '
                <tr id="'. $key .'">
                    <td>' . ENCOUNTER_DB_TOREADEBLETEXT[$key] .'</td>
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