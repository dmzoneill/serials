<?php


include("connect.php");

echo("<h3><font face=verdana color=green>Database Connection</font></h3>");

mysql_select_db( $dbname, $connect ) or die ("Connection to database : <b>$dbname</b> unsucessfull $notok<br><br>");
$database = mysql_select_db( $dbname, $connect );
if ($database) print "Connection to database : <b> $dbname </b> successful $ok<br><br>";


$query = "CREATE TABLE serials ( idser INT NOT NULL AUTO_INCREMENT,
									PRIMARY KEY( idser ),
									contents BLOB)";
									
	
mysql_query($query,$connect);		


echo("<h3><font face=verdana color=green>Table Creation</font></h3>");

if ($query) print "Creation of news_users table successfull $ok<br>";
if (!$query) print "Creation of news_users table unsuccessfull $notok<br>";

mysql_close( $connect );

?>