<?php


		$mysqli = new MySQLi("localhost", "root","", "futbol");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());

		}
		else{
		// echo "Conexión exitossa!";
		// mysqli_query($mysqli, "INSERT INTO admin VALUES ('2' ,'admin2', '12345')");
		}
//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>