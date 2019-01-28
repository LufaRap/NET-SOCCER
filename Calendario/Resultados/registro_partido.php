<?php
	require("../../Conexion/connect_db.php");
	
	$nomequipo1=$_POST['nomequipo1'];
	$nomequipo2=$_POST['nomequipo2'];
    $golequi1=$_POST['golequi1'];
	$golequi2=$_POST['golequi2'];
	$fecha=$_POST['fecha_calen'];
	$hora=$_POST["hora"];
	$estadio=$_POST["estadio"];
	$jornada=$_POST["jornada"];
	$partido=$_POST["partido"];
    

    //Porfavor hacer la comprobacion del partido para verficar si ya esta en la tabla o no
    for($i=0; $i < sizeof($nomequipo1) ; $i++){
        $checkpartido = mysqli_query($mysqli,"SELECT * FROM partidos where jornada=$jornada[$i] and partido=$partido[$i];");
    }
	
        $check_partido = mysqli_num_rows($checkpartido);

	if($check_partido>0 ){
        
        echo '<script language="javascript">alert("Atencion, la jornada ya fue registrada...");</script>';
        echo '<script language="javascript">alert("Atencion, la jornada ya fue registrada...");</script>';

		
	}else{
        
        $cadena = "INSERT INTO `partidos`(`ID_PART`, `NOMEQUIPO1`, `NOMEQUIPO2`, `GOLEQUI1`, `GOLEQUI2`, `fecha`, `HORA`, `ESTADIO`, `jornada`, `partido`) VALUES";

	    for ($i=0; $i < sizeof($nomequipo1) ; $i++) { 
	    	$cadena .="("."0".",'".$nomequipo1[$i]."','".$nomequipo2[$i]."','".$golequi1[$i]."','".$golequi2[$i]."','".$fecha[$i]."','".$hora[$i]."','".$estadio[$i]."',".$jornada[$i].",".$partido[$i]."),";
	    }
	    $cadena_final = substr($cadena, 0,-1);
	    $cadena_final .= ";";
	    $result=mysqli_query($mysqli,$cadena_final);

		
	}

 	header("Location: ../calendario.html");
	
?>