<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
if($term){
print "<table width=500><tr><td>";
$again = "<br><br><a href='serials.php?'>Search again</a><br><br>";
print "$again";
$file = "serials.txt";

$fp = fopen("$file",'r')or die("file is gone or corrupt or missing");

while(!feof($fp)){
$line = fgets($fp, 1024);
if (stristr($line,"$term")){
print "<br>$line<br>";
}
}


fclose($fp);
print "$again";

print "</td></tr></table>";
}





if (!$term){
?>

Use the name of the product, it returns more accurate results :)
<br>
<br>
<form action="">
search term:<br><input type="text" name="term">
<br>
<input type=submit>
</form>

<?php
}
?>










</body>
</html>
