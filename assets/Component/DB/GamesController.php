<?php
require_once 'DBComponent.php';

class GamesController extends DBComponent
{
    public function getAllGamesByUid($userId) {
        $sql = "SELECT * FROM roll_plays WHERE userId = " . $userId;

        $connection = parent::getConnection();
        $sqlResult = $connection->query($sql);
        return $sqlResult->fetch_all(MYSQLI_ASSOC);
    }
}