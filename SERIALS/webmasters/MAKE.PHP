<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php

// make text file from database

require("connect.php");

$serialss = mysql_query( "SELECT * FROM serials");
$num = mysql_num_rows($serialss);

for($i=1;$i<$num; $i++){
$serials2 = mysql_query( "SELECT contents FROM serials where idser='$i'");
$dbinfo = mysql_result($serials2, 0, 0);
$file = "new.txt";
$value = $dbinfo;
$fp = fopen("$file",'a');
$doit = fwrite($fp,$value);
if ($doit){
print "yeah!!!<br>";
}else {
print "shit<br>";
}
fclose($fp);
}




?>





</body>
</html>
