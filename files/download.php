<?php 
	

	$handle=fopen('dcount.txt', "a+");

	$count=(int) fgets($handle);
	$count=$count+1;
	fopen('dcount.txt', "w+");
	fputs($handle,$count);
	var_dump($count);

	fclose($handle);
	//header('location:./mytimetable.apk');
?>