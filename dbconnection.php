<?php

require_once 'ORM.php';

$host = 'test.loc';

$dbType = "mysql:host=localhost;dbname=test";
$username = "root";
$password = "";

$db = new ORM($dbType, $username, $password);
