<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<title>SoftStudio</title>
</head>
<body background="imagenes/fondo1.jpg" style="background-attachment: fixed" >
	<center><div class="tit"><h2 style="color: #0000FF; ">Inicio de sesión</h2>
		<center><div class="Ingreso">

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

		<table border="0">

		<tr><td><label style="font-size: 14pt"><b>Usuario: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src='imagenes/user.png' width="20" height="20"></b></label> </td>
			<td width=80> <input class="form-group has-success" style="border-radius:15px;" type="text" name="user" placeholder="Usuario"> </td><br><br></tr>

		<tr><td><label style="font-size: 14pt"><b>Contraseña: <img src='imagenes/pass.png' width="20" height="20"></b></label></td>
			<td witdh=80><br><input style="border-radius:15px;" type="password" name="pass" placeholder="Contraseña"><br><br></td></tr>

		<tr><td></td>
			<td width=80 align=center><input class="btn btn-primary" type="submit" value="Ingresar"><br/><br/></td>
			</tr>
		<tr><td></td>
			<td width=80 align=center><a href="Inicio.php" <input class="btn btn-primary" type="submit">Cancelar</a></td>
			</tr></tr></table>
		</form>
<br>


		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>