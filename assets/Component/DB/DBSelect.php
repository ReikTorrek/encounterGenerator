<?php
include 'DBComponent.php';
include dirname(__DIR__, 3) . '/PHP/connect.php';

class DBSelect extends DBComponent
{
    private function getConnection() {
        return mysqli_connect('localhost', 'root', '', 'encountergenerator');
    }

    public function getUIdByLogin($login)
    {
        $sql = "SELECT id FROM users WHERE login='" . $login . "'";

        return mysqli_fetch_assoc(mysqli_query(self::getConnection(), $sql));
    }

    public function getAbilityNameByUId($userId) {
        $sql = "SELECT name FROM abilities WHERE userId=" . $userId['id'];

        return mysqli_fetch_all(mysqli_query(self::getConnection(), $sql));
    }
}