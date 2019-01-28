<html>
<head>
	<title>NETSOCCER 1.0</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos_inicio.css">
	<link rel="shortcut icon" type="image/x-icon" href="imagenes/SS.png">
		
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body background="imagenes/back.jpg" >
	<header>
		
		<div class="logo">
			<h1>NETSOCCER</h1>

		</div>

		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="index_1.php">Jornadas</a></li>
				<li><a href="inicio.php">Sistema NetSoccer</a></li>
			</ul>
		</nav>
		
		<div>
		
		</div>
	</header>
<center><div class="tit"><h2 style="color: #0000FF; ">TABLA DE POSICIONES</h2>
<!-- formulario registro -->


<div class="container"> 
  <center><table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre Equipo</th>
    <th scope="col">Puntos</th>
    <th scope="col">G.Favor</th>
        <th scope="col">G.Contra</th>
        <th scope="col">G.Difer</th>
        <th scope="col">P.Jug</th>
        
      </tr>
    </thead>
    <tbody>
        <?php
        require("Conexion/connect_db.php");
        $conexion = mysqli_connect('localhost','root','','futbol');

        mysqli_query($mysqli,"TRUNCATE posiciones");

        mysqli_query($mysqli,"INSERT INTO posiciones (ID_POSIC, NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI) SELECT id_equi, NOM_EQUI, 0, 0 , 0 , 0, 0 FROM equipo");

        //partidos de local
        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO1, SUM(3) , SUM(GOLESAFAVOR), 0, 0, MAX(JORNADA) AS JORNADA FROM `view_ganadorlocal` GROUP BY NOMEQUIPO1");

        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO1, 0 ,  0, SUM(GOLESCONTRA), 0, MAX(JORNADA) AS JORNADA FROM `view_derrotaslocal` GROUP BY NOMEQUIPO1");

        // partido de visitante
        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO2, SUM(3) , SUM(GOLESAFAVOR), 0, 0,MAX(JORNADA) FROM `view_ganadorvisit` GROUP BY NOMEQUIPO2");

        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO2, 0 ,  0, SUM(GOLESCONTRA), 0, MAX(JORNADA) AS JORNADA FROM `view_derrotasvisit` GROUP BY NOMEQUIPO2");


        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO1, SUM(1), SUM(GOLESAFAVOR), 0, 0, MAX(JORNADA) FROM `view_empateslocal` GROUP BY NOMEQUIPO1");

        mysqli_query($mysqli,"INSERT INTO posiciones (NOM_EQUIP, PUNTOS, GFAVOR, GCONTRA, GDIFER, NUMPARTI)
        SELECT NOMEQUIPO2, SUM(1), SUM(GOLESAFAVOR), 0, 0, MAX(JORNADA) FROM `view_empateslocal` GROUP BY NOMEQUIPO2");

        $sql="SELECT posiciones.NOM_EQUIP, SUM(posiciones.PUNTOS) AS PUNTOS, sum(posiciones.GFAVOR) as GFAVOR, sum(posiciones.GCONTRA) as GCONTRA, (sum(posiciones.GFAVOR)-sum(posiciones.GCONTRA)) as GDIFER, MAX(NUMPARTI) AS NUMPARTI,  equipo.FotoEquipo from posiciones, equipo where NOM_EQUIP=NOM_EQUI GROUP BY NOM_EQUIP ORDER BY PUNTOS DESC, GDIFER DESC";

        $result=mysqli_query($conexion,$sql);
        


while($mostrar=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo '<img src="'.$mostrar["FotoEquipo"].'" width="30" height="30" >'; echo $mostrar['NOM_EQUIP']?></td>
        <td><?php echo $mostrar['PUNTOS']?></td>
        <td><?php echo $mostrar['GFAVOR']?></td>
        <td><?php echo $mostrar['GCONTRA']?></td>
        <td><?php echo $mostrar['GDIFER']?></td>
        <td><?php echo $mostrar['NUMPARTI']?></td>

                </tr>
        <?php
            }
        ?>

    </tbody>

  </table>
        
        
</div>


<!--Fin formulario registro -->

		</td>
		</tr>
		


		</div></center>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
