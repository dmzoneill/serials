<?php

include("connect.php");
?>
<html>
<head>
<style>

body {
background-color:#ffffff;
margin-left: 15px;
font-family:Georgia, "Times New Roman", Times, serif;
color:#eFeFeF;
font-size:12px;
}

h3 {
font-weight:bolder;
color:#660000;
font-size:16px;
padding-left:10;
}

h5 {
padding-left:0;
font-weight:500;
font-size:14px;
color:#003366;
}

blockquote {
padding-left:0;
}

a {
text-decoration:none;
font-family:Georgia, "Times New Roman", Times, serif;
color:#990000;
}

a:hover {
text-decoration:none;
font-family:Georgia, "Times New Roman", Times, serif;
color:#0000ff;
}

a:visited {
text-decoration:none;
font-family:Georgia, "Times New Roman", Times, serif;
color:#ccaaaa;
}

table,td,tr {
font-family:Georgia, "Times New Roman", Times, serif;
color:#000000;
font-size:11px;
}

#wrapper {
text-align:left;
padding:0px;
}

#myvar {
background:#f2f2f2;
padding:0px;
}

</style>
<script language="javascript" src="ajax.js" type="text/javascript"></script>

</head>
<body>

<?php

$view = $_GET['view'];
$term = $_GET['term'];
$file = $_GET['file'];
$url = $_GET['url']; 


switch($view){

default:
include("../texts/header.php");

print "<div id=\"wrapper\"><blockquote><a title=\"Switch the Menu\">>> <b>Serial Search</b></a>
<div id=\"search\"  style=\"padding-left:30\">";
?>
<table cellpadding=10 border=0 width=800><tr><td>
<form name=fest onSubmit='loadurl("index.php?view=search&term=" + document.fest.term.value)'>
<input type=text name=term> <input type="button" onclick='javascript:loadurl("index.php?view=search&term=" + document.fest.term.value)' value="Search" />
</form></td></tr></table>
<?php
print "</div></blockquote></div>";	



break;

case "search":

?>
<table cellpadding=10 border=0 width=800><tr><td>
<form name=fest onSubmit='loadurl("index.php?view=search&term=" + document.fest.term.value)'>
<input type=text name=term> <input type="button" onclick='javascript:loadurl("index.php?view=search&term=" + document.fest.term.value)' value="Search" />
</form></td></tr></table>
<?php

$limit = 0;
$j=0;

print "<table width=650 cellpadding=0 cellspacing=0 border=0><tr><td colspan=3><h3>Search results for $term </h3></td></tr></table>\n";
print "<table width=650 cellpadding=0 cellspacing=0 border=0><tr>";
$t = 0;

while($start<24000){
	$start = $start + 1000;
	$limit = 1000;
	$docs = $stream->do_query("SELECT * FROM `serial` LIMIT $start , $limit","array");

	for($i=0;$i<count($docs);$i++){

		$tmp = $docs[$i];
		$id = $tmp[0];
		$conet = rawurldecode($tmp[1]);
		$pattern = "/$term/i";
		if(preg_match($pattern,$conet)){
		$t++;
		print "<tr><td colspan=2 align=left width=650><hr></td></tr>";
			print "<tr><td width=100>$t </td><td align=left width=650>$conet</td></tr>";
			
		}
			
	}

}
print "<tr><td colspan=2><hr>Total of $t results </td></tr></table>";

break;

}

?>