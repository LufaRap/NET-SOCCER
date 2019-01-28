<?php
	require("../Conexion/connect_db.php");

	$nom_torn=$_POST['nom_torneo'];
	$realname=$_POST['Liga_Barrial'];
	$fecha_ini=$_POST['datego'];



	

				mysqli_query($mysqli,"INSERT INTO torneo VALUES('1','$nom_torn','$realname','$fecha_ini')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito, a continuación Registrar Jugadores");</script> ';

				


			header("Location: ../modulos.html");
     	
	
?>