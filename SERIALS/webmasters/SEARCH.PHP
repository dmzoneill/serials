<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>


<?php

echo("$showme");

if($term){
require("connect.php");
if($numb){
if($numb=="all"){
$postresult1 = mysql_query( "SELECT * FROM serials");
$num = mysql_num_rows($postresult1);
}
else{
$num = $numb;
}
}


echo("<center><a href='search2.php?'>Search again</a><br><br>");
for($i=0;$i<$num;$i++){
$get = mysql_query("SELECT contents FROM serials WHERE idser='$i'");
$show = mysql_result($get,0,0);
if (stristr($show,"$term")){
print "<center>
<table border=1 cellpadding=5 cellspacing=1 width=600><tr><td width=100% valign=top>
Match with serial number : <a href=\"search2.php?page=show&id=$i\">$i</a> </tr><tr><td width=100% valign=top>
$show
</td></tr></table><br>";
}   
}
echo("No Other search results before <b>$num</b>..<br>If the search was unsatisfactory, then try a more undescriptive search term than <b>$term</b>..");
echo("<center><br><a href='search2.php?'>Search again</a><br>");   
}



elseif($page=="show"){
require("connect.php");

$resultshow = mysql_query( "select contents from serials where idser='$id'");
$showme = mysql_result($resultshow, 0, 0);

echo("<center><table border=1 cellpadding=5 cellspacing=1 width=600><tr><td width=100% valign=top>
<font size=2 color=aa0000 face=verdana>Serial Requested : $id </font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='search2.php?'>Search Again</a></td></tr><tr><td width=100% valign=top>");

if(strstr($showme,'PC')){
echo("Platform : PC - windows");
}
elseif(strstr($showme,'Mac')){
echo("Platform : Apple Mac");
}
elseif(strstr($showme,'Palm Pilot')){
echo("Platform : Palm Pilot");
}
if(strstr($showme,'Other')){
echo("Platform : misc");
}
elseif(strstr($showme,'linux')){
echo("Platform : Unix - linux");
}
elseif(strstr($showme,'BeOs')){
echo("Platform : BeOs");
}
elseif(strstr($showme,'Ce')){
echo("Platform : CE");
}
elseif(strstr($showme,'Newton')){
echo("Platform : Newton");
}
else{
echo("Platform :");
}


echo("
</td></tr><tr><td width=100% valign=top>
<font size=3 color=0000bb face=verdana>
$showme</font>
</td></tr></table><br></center>");
}







elseif (!$term){
?>

<form action="">
search term :<br><input type="text" name="term"><br><br>
search depth : (note:search depth varies speed of search)
<br><select name='numb'>
<option value='all'>all</option>
<option value='1500'>1500</option>
<option value='3000'>3000</option>
<option value='4500'>4500</option>
<option value='6000'>6000</option>
<option value='7500'>7500</option>
<option value='9000'>9000</option>
<option value='10500'>10500</option>
<option value='12000'>12000</option>
<option value='13500'>13500</option>
<option value='15000'>15000</option>
<option value='16500'>16500</option>
<option value='18000'>18000</option>
<option value='19500'>19500</option>
<option value='21000'>21000</option>
<option value='22500'>22500</option>
<option value='25000'>25000</option>
<option value='29000'>29000</option>
<option value='33000'>33000</option>
<option value='35000'>35000</option>
</select>
<br>
<br>
<input type=submit value=search!!!>
</form>

<?php
}
?>

</body>
</html>
