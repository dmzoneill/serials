<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
if($serial){

require("connect.php");

$filename = "$serial";
$fp = fopen($filename,"r");

while(!feof($fp)){
$line = fgets($fp,1024);
$insertinto = "INSERT into serials (contents) values('$line')";
$doit = mysql_query($insertinto);
if($doit){
print "done";
}
else{
print "shit!!";
}
}
}

if(!$serial){
?>

<form>
Text file:<br><input type="text" name="serial">
<input type=submit>
</form>

<?php

}
?>




</body>
</html>
