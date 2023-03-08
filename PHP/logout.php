<?php
session_start();
session_destroy();

header('Location: http://localhost/2022/encounterGenerator/index.php');