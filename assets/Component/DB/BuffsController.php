<?php
require_once 'DBComponent.php';

class BuffsController extends DBComponent
{
    public function getBuffNameByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM buffs WHERE userId=" . $userId . " AND isBuff=1" . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getDebuffByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM buffs WHERE userId=" . $userId . " AND isBuff=0" . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getBuffsByUId($userId, $gameId = 0) {
        $sql = "SELECT * FROM buffs WHERE userId = " . $userId . " AND gameId = '" . $gameId . "'";

        $connection = parent::getConnection();
        return $connection->query($sql);
    }
}