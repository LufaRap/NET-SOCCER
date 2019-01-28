<?php
	require("../../Conexion/connect_db.php");
	
	$equipo1_calen=$_POST['equipo1_calen'];
	$equipo2_calen=$_POST['equipo2_calen'];
	$fecha_calen=$_POST['fecha_calen'];
	$hora_calen=$_POST["hora_calen"];
	$estadio_calen=$_POST["estadio_calen"];
	$jornada_calen=$_POST["jornada_calen"];
	$partido_calen=$_POST["partido_calen"];
    

    //Porfavor hacer la comprobacion del partido para verficar si ya esta en la tabla o no
    for($i=0; $i < sizeof($equipo1_calen) ; $i++){
        $checkpartido = mysqli_query($mysqli,"SELECT * FROM calendario where jornada_calen=$jornada_calen[$i] and partido_calen=$partido_calen[$i];");
    }
	
        $check_partido = mysqli_num_rows($checkpartido);

	if($check_partido>0 ){
        
        echo '<script language="javascript">alert("Atencion, la jornada ya fue registrada...");</script>';
        echo '<script language="javascript">alert("Atencion, la jornada ya fue registrada...");</script>';

		
	}else{
        
        $cadena = "INSERT INTO `calendario`(`id_calen`, `equipo1_calen`, `equipo2_calen`, `fecha_calen`, `hora_calen`, `estadio_calen`, `jornada_calen`,`partido_calen`) VALUES";

	    for ($i=0; $i < sizeof($equipo1_calen) ; $i++) { 
	    	$cadena .="("."0".",'".$equipo1_calen[$i]."','".$equipo2_calen[$i]."','".$fecha_calen[$i]."','".$hora_calen[$i]."','".$estadio_calen[$i]."',".$jornada_calen[$i].",".$partido_calen[$i]."),";
	    }
	    $cadena_final = substr($cadena, 0,-1);
	    $cadena_final .= ";";
	    $result=mysqli_query($mysqli,$cadena_final);

		
	}

    header("Location: ../calendario.html");	
	
?>