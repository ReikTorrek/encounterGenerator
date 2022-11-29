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

    public function getAbilityNameByUId($userId) {
        $sql = "SELECT name FROM abilities WHERE userId=" . $userId;

        return mysqli_fetch_all(mysqli_query(parent::getConnection(), $sql));
    }

    public function getBuffNameByUId($userId) {
        $sql = "SELECT name FROM buffs WHERE userId=" . $userId . " AND isBuff=1";

        return mysqli_fetch_all(mysqli_query(parent::getConnection(), $sql));
    }

    public function getDebuffByUId($userId) {
        $sql = "SELECT name FROM buffs WHERE userId=" . $userId . " AND isBuff=0";

        return mysqli_fetch_all(mysqli_query(parent::getConnection(), $sql));
    }

    public function getEncounterByUId($userId) {
        $sql = "SELECT * FROM encounter WHERE userId=" . $userId;
        $connection = parent::getConnection();
        return $connection->query($sql);
    }

    public function getEncounterNum($userId) {
        $sql = "SELECT COUNT(*) FROM encounter WHERE userId=" . $userId;
        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_row()[0];
    }

    public function getAbilityByUId($userId) {
        $sql = "SELECT * FROM abilities WHERE userId=" . $userId;
        $connection = parent::getConnection();
        return $connection->query($sql);
    }

    public function getAbilitiesNum($userId) {
        $sql = "SELECT COUNT(*) FROM abilities WHERE userId=" . $userId;
        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_row()[0];
    }
}