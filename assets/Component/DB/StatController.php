<?php
require_once 'DBComponent.php';

class StatController extends DBComponent
{
    public function getStatNameByUId($userId, $gameId = 0) {
        $sql = "SELECT statName FROM statsettings WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";

        return mysqli_fetch_all(mysqli_query(parent::getConnection(), $sql));
    }
}