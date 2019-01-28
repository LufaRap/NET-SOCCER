
<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("Conexion/connect_db.php");

	$username=$_POST['user'];
	$pass=$_POST['pass'];


	


			

	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM admin WHERE user_admin='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['PASS_ADMIN']){
			$_SESSION['id_admin']=$f2['id_admin'];


			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}


	$sql=mysqli_query($mysqli,"SELECT * FROM admin WHERE user_admin='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['PASS_ADMIN']){
			$_SESSION['id_admin']=$f['id_admin'];
			$checkequipos=mysqli_query($mysqli,"SELECT * FROM torneo ");
			$check_equipo=mysqli_num_rows($checkequipos);
			if($check_equipo>0){
				echo ' <script language="javascript">alert("Atencion ya hay equipos");</script> ';
				header("Location: modulos.html");
			}else{
				header("Location: Torneo/torneo.php");
			}

			
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE.")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}

?>  