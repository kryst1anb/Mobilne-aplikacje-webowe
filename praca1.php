<?php
	//phpinfo();
	$dana=$_GET['dana'] ?? "dom";
	$f=fopen("semafor","w");
	flock($f,LOCK_EX);
	
	
	echo $dana;
	echo rand(1,10000);
	
	
	echo "OK";
	echo $dana;
	
	flock($f, LOCK_UN); 
	fclose($f);


?>
