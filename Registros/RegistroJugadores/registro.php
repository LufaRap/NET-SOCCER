<?php

	require("../../Conexion/connect_db.php");
	$id_equip=$_POST['id_equip'];
	$realname=$_POST['realname'];
	$apellido=$_POST['apellido'];
	$ci_jug=$_POST['ci_jug'];
	$genero=$_POST['genero'];
	$dorsal=$_POST['dorsal'];
	$posicion=$_POST['posicion'];
	$edad=$_POST['edad'];



	$nombrefoto=$_FILES["fotojug"]["name"];
    //echo $nombrefoto;
	$archivo=$_FILES["fotojug"]["tmp_name"];
    //echo $archivo;
    $destino="../../fotos/".$nombrefoto;
	//echo $destino;
	copy($archivo,$destino);

	
	$checkdor=mysqli_query($mysqli,"SELECT * FROM jugador WHERE dorsal_jug='$dorsal' and id_equi='$id_equip'");

	$checkced=mysqli_query($mysqli,"SELECT * FROM jugador WHERE cediden_jug='$ci_jug'");
	
	$check_ced=mysqli_num_rows($checkced);
	$check_dor=mysqli_num_rows($checkdor);


			if($check_ced>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el jugador designado en el campeoneato, verifique sus datos");</script> ';
			}

            else if(preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$realname)==false || preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/",$apellido)==false){
                
                 echo ' <script language="javascript">alert("Verifique los nombres y apellidos del jugador");</script> ';
                
            }else if(!is_numeric($ci_jug) || strlen($ci_jug)<10 || strlen($ci_jug)>10){
                echo ' <script language="javascript">alert("Cedula Inválida");</script> ';
            }else if(!is_numeric($edad) || $edad<18|| $edad>60){
                 echo ' <script language="javascript">alert("La edad del jugador debe estar entre los 18 y 60 años");</script> ';
             }else if(!is_numeric($dorsal)){
                 echo ' <script language="javascript">alert("Verifique el dorsal del jugador");</script> ';
            }

                else{
					if($check_dor>0){
					echo ' <script language="javascript">
					alert("Atencion, el dorsal no puede ser asignado, porque pertenece a otro jugador");
					</script> ';
				}else{
					mysqli_query($mysqli,"INSERT INTO jugador VALUES('','$id_equip','$realname','$apellido','$ci_jug','$genero','$edad','$dorsal','$posicion','$destino')");
							//echo 'Se ha registrado con exito';
				   echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';	
				}
			     	
				}
				
?>