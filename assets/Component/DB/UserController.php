<?php
require_once 'DBComponent.php';

class UserController extends DBComponent
{
    public function getUIdByLogin($login)
    {
        $sql = "SELECT id FROM users WHERE login='" . $login . "'";

        return mysqli_fetch_row(mysqli_query(parent::getConnection(), $sql))[0];
    }

}