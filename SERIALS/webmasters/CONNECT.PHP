<?php

// in database create cols
// 'idser' incremental
// 'contents' BlOB

$host = "localhost";
$username = "user";
$password = "pass";
$db_name = "serials";
$db_type = "mysql";


//DO NOT EDIT BELOW

$db = @mysql_connect($host, $username, $password) or die("Unable to connect to the database!");
$select = @mysql_select_db($db_name, $db) or die("Unable to select the db!");



?>