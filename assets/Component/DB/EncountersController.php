<?php
require_once 'DBComponent.php';

class EncountersController extends DBComponent
{
    public function getEncounterByUId($userId, $gameId = 0) {
        $sql = "SELECT * FROM encounter WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $connection = parent::getConnection();
        return $connection->query($sql);
    }

    public function getEncounterNum($userId, $gameId = 0) {
        $sql = "SELECT COUNT(*) FROM encounter WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_row()[0];
    }
}