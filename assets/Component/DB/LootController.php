<?php
require_once 'DBComponent.php';

class LootController extends DBComponent
{
    public function getLootNameByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM loot WHERE userId=" . $userId  . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getLootByUId($userId, $gameId = 0) {
        $sql = "SELECT * FROM loot WHERE userId = " . $userId . " AND gameId = '" . $gameId . "'";

        $connection = parent::getConnection();
        return $connection->query($sql);
    }
}