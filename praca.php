<?php
	$f = fopen("semafor","w");
	flock($f,LOCK_EX);
	
	$rawdata = file_get_contents("php://input");
	$daneJSON = json_decode($rawdata,true);
	$ok = true;
	
	if($daneJSON == null) 
	{
		$wynik = array('status' => false, 'kod' => 1, 'bo' => 'Zły format');
		$ok = false;
	}
	
		
	if($ok)
	{
		if(isset($daneJSON['nazwa_pliku']))
		{
			if(isset($daneJSON['polecenie']))
			{
				$polecenie = intval($daneJSON['polecenie']);
				switch($polecenie)
				{
					case 1: 
						$wynik = zad1( $daneJSON ); 
					break;

					case 2: 
						$wynik = zad2( $daneJSON ); 
					break;

					case 3: 
						$wynik = zad3($daneJSON );
					break;

					case 4: 
						$wynik = zad4( $daneJSON ); 
					break;

					case 5: 
						$wynik = zad5( $daneJSON ); 
					break;

					case 6: 
						$wynik = zad6($daneJSON );
					break;

					case 7: 
						$wynik = zad7( $daneJSON ); 
					break;

					case 8: 
						$wynik = zad8( $daneJSON ); 
					break;

					case 9: 
						$wynik = zad9($daneJSON );
					break;

					case 10: 
						$wynik = zad10($daneJSON );
					break;
			/* ********************************************************* */
					case 11: 
						$wynik = zapiszNapis( $daneJSON ); 
					break;

					case 12: 
						$wynik = odczytajNapis( $daneJSON ); 
					break;

					case 13: 
						$wynik = podajWzory($daneJSON );
					 break;
			/* ********************************************************* */
					default: 
						$wynik = array('status' => false, 'kod' => 3, 'bo' => 'Podane zostało złe polecenie');
				}		
			}
			else
			{
				$wynik = array('status' => false, 'kod' => 1, 'bo' => 'Nie podano polecenia');
			}
		}
		else
		{
			$wynik = array('status' => false, 'kod' => 1, 'bo' => 'Brak nazwy pliku');
		}
	}
	
	$wynikS = json_encode($wynik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES);
	echo $wynikS;
	
	flock($f, LOCK_UN); 
	fclose($f);

	function zad1( $daneJSON ){

	}
	function zad2( $daneJSON ){
		
	}
	function zad3( $daneJSON ){
		
	}
	function zad4( $daneJSON ){
		
	}
	function zad5( $daneJSON ){
		
	}
	function zad6( $daneJSON ){
		
	}
	function zad7( $daneJSON ){
		
	}
	function zad8( $daneJSON ){
		
	}
	function zad9( $daneJSON ){
		
	}
	function zad10( $daneJSON ){
		
	}
/* ********************************************************* */
	function zapiszNapis( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['napis'])){
				if(file_exists("4073e4bf57b9e327a0ff30bc0d34d5bd/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("4073e4bf57b9e327a0ff30bc0d34d5bd/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}
				$plik['napis'] = $daneJSON['napis'];
				file_put_contents("4073e4bf57b9e327a0ff30bc0d34d5bd/$nazwa_pliku",
				json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'bo' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'bo' => 'Brak napisu');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'bo' => 'Brak nazwy pliku');
		}
	}

	function odczytajNapis($daneJSON){
		$nazwa_pliku = $daneJSON['nazwa_pliku'];
		if(file_exists("4073e4bf57b9e327a0ff30bc0d34d5bd/$nazwa_pliku")){		
			$plik = json_decode(file_get_contents("4073e4bf57b9e327a0ff30bc0d34d5bd/$nazwa_pliku"),true);
			$napis = $plik['napis'] ?? ''; // Jeżeli puste/NULL nic nie wypisze
			return array('status' => true, 'kod' => 201, 'bo' => 'ok', 'dane' => $napis);
			
		}
		else{
			return array('status' => false, 'kod' => 5, 'bo' => 'Brak nazyw pliku');
		}
	}

	function podajWzory($daneJSON){
		$nr_wyboru = $daneJSON['nr_wyboru'] ?? 1; //Jeżeli puste/NULL przypisz domyślnie 1
		if(file_exists("danedof/wybor$nr_wyboru")){
			$plik = json_decode(file_get_contents("danedof/wybor$nr_wyboru"),true);
			if($plik == null){
				return array('status' => false, 'kod' => 5, 'bo' => 'Zły format w pliku ');
			}
			else{		
				return array('status' => true, 'kod' => 202, 'bo' => 'ok', 'dane' => $plik);
			}
		}
		else{
			return array('status' => false, 'kod' => 5, 'bo' => 'Brak wyboru');
		}
	}

?>