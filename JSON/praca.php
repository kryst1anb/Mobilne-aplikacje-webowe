<?php
	$f = fopen("semafor","a");
	flock($f,LOCK_EX);
	
	$rawdata = file_get_contents("php://input");
	$daneJSON = json_decode($rawdata,true);
	$ok = true;
	
	if($daneJSON == null) 
	{
		$wynik = array('status' => false, 'kod' => 1, 'wartosc' => 'Zły format');
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
						$wynik = array('status' => false, 'kod' => 3, 'wartosc' => 'Podane zostało złe polecenie');
				}		
			}
			else
			{
				$wynik = array('status' => false, 'kod' => 1, 'wartosc' => 'Nie podano polecenia');
			}
		}
		else
		{
			$wynik = array('status' => false, 'kod' => 1, 'wartosc' => 'Brak nazwy pliku');
		}
	}
	
	$wynikS = json_encode($wynik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES);
	echo $wynikS;
	
	flock($f, LOCK_UN); 
	fclose($f);

	function zad1( $daneJSON ){
        if(isset($daneJSON['nazwa_pliku'])){
            $nazwa_pliku = $daneJSON['nazwa_pliku'];
            if(isset($daneJSON['imie']) && isset($daneJSON['nazwisko'])){
                if(file_exists("OSOBA/$nazwa_pliku")){
                    $plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
                    if($plik == null)
                        $plik = array();
                }
                else{
                    $plik = array();
				}
				
                $plik['imie'] = $daneJSON['imie'];
				$plik['nazwisko'] = $daneJSON['nazwisko'];
				
                file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));          
                return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
            }
            else{
                return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak imienia lub nazwiska');
            }
        }
        else{
            return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
        }
    }

	function zad2( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['liczba'])){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}

				$plik['liczba'] = $daneJSON['liczba'];

				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak podanej liczby');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function zad3( $daneJSON ){
		/*if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['napis_z_listy'])){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}

				$plik['napis_z_listy'] = $daneJSON['napis_z_listy'];

				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak podanej nazwy');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}*/

		$nazwa_pliku = $daneJSON['nazwa_pliku'];
		if(file_exists("OSOBA/$nazwa_pliku")){		
			$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
			$napis = $plik['napis_z_listy'] ?? ''; // Jeżeli puste/NULL nic nie wypisze
			return array('status' => true, 'kod' => 201, 'wartosc' => 'ok', 'dane' => $napis);
			
		}
		else{
			return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak nazyw pliku');
		}
	}

	function zad4( $daneJSON ){
		/*if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['podpowiedz_wyboru']) ){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}

				$plik['podpowiedz_wyboru'] = $daneJSON['podpowiedz_wyboru'];
				
				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak podanej podpowiedzi');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}*/

		$nazwa_pliku = $daneJSON['nazwa_pliku'];
		if(file_exists("OSOBA/$nazwa_pliku")){		
			$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
			$napis = $plik['podpowiedz_wyboru'] ?? '';
			return array('status' => true, 'kod' => 201, 'wartosc' => 'ok', 'dane' => $napis);
			
		}
		else{
			return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak nazyw pliku');
		}
	}

	function zad5( $daneJSON ){
		$nr_wyboru = $daneJSON['wybor_nr'] ?? ''; //Jeżeli puste/NULL przypisz domyślnie 1
		if(file_exists("OSOBA/wybor$nr_wyboru")){
			$plik = json_decode(file_get_contents("danedof/wybor$nr_wyboru"),true);
			if($plik == null){
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Zły format w pliku ');
			}
			else{		
				return array('status' => true, 'kod' => 202, 'wartosc' => 'ok', 'dane' => $plik);
			}
		}
		else{
			return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak wyboru');
		}
	}

	function zad6( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['kolor'])){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}

				list($R, $G, $B) = sscanf($daneJSON['kolor'], "#%02x%02x%02x");
               
                $plik['KOLOR'] = array(
					'RED' => $R,
					'GREEN' => $G,
					'BLUE' => $B
				);

				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Bład podanego koloru');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function zad7( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['data']) ){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}
				if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $daneJSON['data'])) {
				
				$plik['data'] = $daneJSON['data'];

				}

				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak podanej daty');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function zad8( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['czas'])){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}

				//%[^.].%s
				if(preg_match("/^(0[1-9]|[1][0-9]|2[0-4]):(0[0-9]|[1-5][0-9]):(0[0-9]|[1-5][0-9])$/", $daneJSON['czas'])){
					list($H, $M, $S) = sscanf($daneJSON['czas'], "%d:%d:%d");
					$plik['czas'] = array(
						'GODZINA'=>$H,
						'MINUTA'=>$M,
						'SEKUNDA'=>$S
					);
				}



				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Błąd podanego czasu');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function zad9( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['od']) && isset($daneJSON['do']) ){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}
				
				if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])T(0[0-9]|[1][0-9]|2[0-4]):(0[0-9]|[1-5][0-9])$/", $daneJSON['od']) && preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])T(0[0-9]|[1][0-9]|2[0-4]):(0[0-9]|[1-5][0-9])$/", $daneJSON['do'])) {
				$odTime = list($YOd, $MonOd, $DOd,$HOd, $MinOd) = sscanf($daneJSON['od'], "%d-%d-%dT%d:%d");
				$doTime = list($Y, $Mon, $D,$H, $Min) = sscanf($daneJSON['do'], "%d-%d-%dT%d:%d");
					$plik['czas'] = array(
					'OD'=>array(
						'Rok'=>$YOd,
						'Miesiac'=>$MonOd,
						'Dzien'=>$DOd,
						'Godzina'=>$HOd,
						'Minuta'=>$MinOd,
				),
					'DO'=>array(
						'Rok'=>$Y,
						'Miesiac'=>$Mon,
						'Dzien'=>$D,
						'Godzina'=>$H,
						'Minuta'=>$Min,
				)
				);
			}

				file_put_contents("OSOBA/$nazwa_pliku",json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Błąd podanego przedzialu');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function zad10( $daneJSON ){

			if(isset($daneJSON['nazwa_pliku'])){
				$nazwa_pliku = $daneJSON['nazwa_pliku'];
				if (isset($daneJSON['check'])) {
					if (file_exists("OSOBA/$id")) {
						$plik = json_decode(file_get_contents("OSOBA/$id"), true);
						if ($plik == null)
							$plik = array();
					} else {

						/*foreach($_POST['keywords'] as $keyword) {
							$plik['Wybrane'] += $keyword . " ";*/

						foreach($_POST['keywords'] as $keyword) {
							$plik['Wybrane'] += $keyword . " ";
		
						file_put_contents("OSOBA/$id", json_encode($plik, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES));
						return array('status' => true, 'kod' => 101, 'bo' => 'ok');
						}
					}
				} else {
					return array('status' => false, 'kod' => 5, 'bo' => 'Błąd zaznaczen');
				}
			} else {
				return array('status' => false, 'kod' => 2, 'bo' => 'Brak nazwy pliku');
			}

	}
/* ********************************************************* */
	function zapiszNapis( $daneJSON ){
		if(isset($daneJSON['nazwa_pliku'])){
			$nazwa_pliku = $daneJSON['nazwa_pliku'];
			if(isset($daneJSON['napis'])){
				if(file_exists("OSOBA/$nazwa_pliku")){
					$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
					if($plik == null) 
						$plik = array();
				}
				else{
					$plik = array();
				}
				
				
				file_put_contents("OSOBA/$nazwa_pliku",
				json_encode($plik, JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE+JSON_UNESCAPED_SLASHES));			
				return array('status' => true, 'kod' => 101, 'wartosc' => 'ok');
			}
			else{
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak napisu');
			}
		}
		else{
			return array('status' => false, 'kod' => 2, 'wartosc' => 'Brak nazwy pliku');
		}
	}

	function odczytajNapis($daneJSON){
		$nazwa_pliku = $daneJSON['nazwa_pliku'];
		if(file_exists("OSOBA/$nazwa_pliku")){		
			$plik = json_decode(file_get_contents("OSOBA/$nazwa_pliku"),true);
			$napis = $plik['KOLOR'] ?? ''; // Jeżeli puste/NULL nic nie wypisze
			return array('status' => true, 'kod' => 201, 'wartosc' => 'ok', 'dane' => $napis);
			
		}
		else{
			return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak nazyw pliku');
		}
	}

	function podajWzory($daneJSON){
		$nr_wyboru = $daneJSON['nr_wyboru'] ?? 1; //Jeżeli puste/NULL przypisz domyślnie 1
		if(file_exists("danedof/wybor$nr_wyboru")){
			$plik = json_decode(file_get_contents("danedof/wybor$nr_wyboru"),true);
			if($plik == null){
				return array('status' => false, 'kod' => 5, 'wartosc' => 'Zły format w pliku ');
			}
			else{		
				return array('status' => true, 'kod' => 202, 'wartosc' => 'ok', 'dane' => $plik);
			}
		}
		else{
			return array('status' => false, 'kod' => 5, 'wartosc' => 'Brak wyboru');
		}
	}

?>