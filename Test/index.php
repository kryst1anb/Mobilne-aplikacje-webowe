<html>
<head>

</head>

<body>


	<form action="" method="POST">
		DATA:<input type="date" name="data"><br><br><br>
		DATA+GODZ: <input type="datetime-local" name="time"><br><br><br>
		Godz: <input type="time" step="1" name="time"><br><br><br>
		KOLOR:<input type="color" name="color"><br><br><br>
		
		<input type="submit" name="submit">
	</form>

<?php
		$nazwa_pliku = "xd";
		if(file_exists($nazwa_pliku))
			echo $nazwa_pliku;
		else
			echo "brak";


	
	$czas = date("h:i:s");
	$data = "0000-00-00";
	$time = "0000-00-00T00:00";
	$color = "#000000";

	if (isset($_POST["submit"])) {
	$data = $_POST["data"];
	$time = $_POST["time"];
	$color = $_POST["color"];
		echo $czas;
		echo '<br><br>';
		echo $data;
		echo '<br><br>';
		echo $time;
		echo '<br><br>';
		echo $color;
	}
	else
	{	echo $czas;
		echo '<br><br>';
		echo $data;
		echo '<br><br>';
		echo $time;
		echo '<br><br>';
		echo $color;
	}
?>


</body>
</html>