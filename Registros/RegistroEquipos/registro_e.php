<?php
	require("../../Conexion/connect_db.php");

	$nom_equi=$_POST['nom_equi'];
	$realname=$_POST['realname'];
	$cel_dir=$_POST['cel_dir'];

	$nombrefoto=$_FILES["fotoequi"]["name"];
	$archivo=$_FILES["fotoequi"]["tmp_name"];


	$destino="../../fotos/".$nombrefoto;
	
	copy($archivo,$destino);

	
	$checkequipo=mysqli_query($mysqli,"SELECT * FROM equipo WHERE nom_equi='$nom_equi'");
	$checkced=mysqli_query($mysqli,"SELECT * FROM equipo WHERE cedula_dir='$cel_dir'");
	
	$check_equipo=mysqli_num_rows($checkequipo);
	$check_cedula=mysqli_num_rows($checkced);


			if($check_equipo>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el equipo designado el camponeato, verifique sus datos");</script> ';
			}else if($check_cedula>0) {
				echo ' <script language="javascript">alert("Atencion, ya existe el dirigente designado el camponeato, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO equipo VALUES('','$nom_equi','$realname','$cel_dir','$destino')");
				mysqli_query($mysqli,"TRUNCATE posiciones");
				mysqli_query($mysqli,"INSERT INTO posiciones (ID_POSIC, NOM_EQUIP, PUNTOS)
					SELECT id_equi, NOM_EQUI, 0 FROM equipo");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito, a continuación Registrar Jugadores");</script> ';

				}


			header("Location: ../RegistroJugadores/registro_jug.php");
     	
	
?>