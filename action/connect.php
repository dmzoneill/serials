<?php

$host = "mysql.feeditout.com";
$username = "books";
$password = "";
$db_name = "elearning";

$connect = @mysql_connect($host, $username, $password) or die("<br><br><br><br><center><h4>Were Down</h4></center>");
$database = @mysql_select_db( $db_name, $connect );


?>