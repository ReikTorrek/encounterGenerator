<?php
require_once 'DBComponent.php';
class AbilitiesController extends DBComponent
{
    public function getAbilityNameByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM abilities WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getAbilityByUId($userId, $gameId = 0) {
        $sql = "SELECT * FROM abilities WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $connection = parent::getConnection();
        return $connection->query($sql);
    }

    public function getAbilitiesNum($userId, $gameId = 0) {
        $sql = "SELECT COUNT(*) FROM abilities WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_row()[0];
    }
}