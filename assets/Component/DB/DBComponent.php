<?php

abstract class DBComponent
{
    protected function getConnection() {
        return mysqli_connect('localhost', 'root', '', 'encountergenerator');
    }

}