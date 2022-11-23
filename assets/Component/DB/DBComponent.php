<?php

abstract class DBComponent
{
    abstract function getUIdByLogin($login);

    abstract function getAbilityNameByUId($userId);
}