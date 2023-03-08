<?php
include 'DBComponent.php';
include dirname(__DIR__, 3) . '/PHP/connect.php';

class DBSelect extends DBComponent
{

    public function getUIdByLogin($login)
    {
        $sql = "SELECT id FROM users WHERE login='" . $login . "'";

        return mysqli_fetch_row(mysqli_query(parent::getConnection(), $sql))[0];
    }

    public function getAbilityNameByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM abilities WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getLootNameByUId($userId, $gameId = 0) {
        $sql = "SELECT name FROM loot WHERE userId=" . $userId  . " AND gameId = '" . $gameId . "'";
        $result =  parent::getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);

        return !empty($result) ? $result : [['Ничего не найдено']];
    }

    public function getStatNameByUId($userId, $gameId = 0) {
        $sql = "SELECT statName FROM statsettings WHERE userId=" . $userId . " AND gameId = '" . $gameId . "'";

        return mysqli_fetch_all(mysqli_query(parent::getConnection(), $sql));
    }

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

    public function getLootByUId($userId, $gameId = 0) {
        $sql = "SELECT * FROM loot WHERE userId = " . $userId . " AND gameId = '" . $gameId . "'";

        $connection = parent::getConnection();
        return $connection->query($sql);
    }

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

    public function getAllGamesByUid($userId) {
        $sql = "SELECT * FROM roll_plays WHERE userId = " . $userId;

        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_all(MYSQLI_ASSOC);
    }
}