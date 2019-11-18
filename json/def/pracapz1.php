<?php
	//phpinfo();
	// $dana=$_GET['dana'] ?? "dom";
	$f=fopen("semafor","w");
	flock($f,LOCK_EX);
	
	$rawdata = file_get_contents("php://input");
	$daneJSON=json_decode($rawdata,true);
	
	//var_dump($daneJSON);
	
	//if(isset($daneJSON['e']))
	$daneJSON['e'][]='ala ma kota';
	
	$wynik=json_encode($daneJSON, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES);
	//$wynik=json_encode($daneJSON);
	echo $wynik;
	
	file_put_contents("dane/wynik",$wynik);
	//$odczytane=file_get_contents("dane/wynik");
	
	////echo $dana;
	////echo rand(1,10000);
	////
	////sleep(10);
	////echo "OK";
	////echo $dana;
	
	
	
	
	flock($f, LOCK_UN); 
	fclose($f);


?>
