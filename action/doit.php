
<?php



require("connect.php");




if($fp = fopen("ser/newset.txt","r")){

$p = 0;
$t = 0;
print "successfully<br>";
	while(!feof($fp)){
	$line = rawurlencode(fgets($fp,1024));
	$insertinto = "INSERT into serials (contents) values('$line')";
	$doit = mysql_query($insertinto);
		if($doit) {
			$p++;
		}
		else {
			print "0";
			$t++;
		}
	}
}

print "$p serials added :), $t failed :(";



?>
