<?php
	$id_equip=$_POST['id_equip'];
	$conexion = mysqli_connect('localhost','root','','futbol');	
?>

<html>
 
<head>

	<meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../../imagenes/SS.png">
    <link rel="stylesheet" type="text/css" href="../../css/estilos_modulos.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap-responsive.css">
	<title>Reportes</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/resources/demos/external/jquery-mousewheel/jquery.mousewheel.js"></script>
</head>

<body background="../../imagenes/fondo.jpg">
	<center><div class="tit">
	 <?php
        $sql="SELECT `nom_equi`FROM `equipo` WHERE `id_equi`=$id_equip";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
    ?>
    <h2><?php echo $mostrar['nom_equi']?> <h2>
        <?php
            }
         ?>
<div class="container">
          
<table>
        <?php

        $sql="SELECT FotoEquipo from equipo where id_equi=$id_equip ";

        $result=mysqli_query($conexion,$sql);
        
while($mostrar=mysqli_fetch_array($result)){
     echo '<img src="'.$mostrar["FotoEquipo"].'" width="100" height="100" >';
    ?>
    
    <?php
            }
        ?>
</table>   

  <center><table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cédula de Identidad</th>
        <th>Equipo</th>
        <th>Dorsal</th>
        <th>Posición</th>
        <th>Foto</th>
        
      </tr>
    </thead>
    <tbody>
        <?php
        $sql="SELECT jugador.`nom_jug`, jugador.`apel_jug`, jugador.`cediden_jug`,equipo.`nom_equi`, jugador.`dorsal_jug`, jugador.`pos_jug`, jugador.`FotoJugador`  from jugador,equipo where jugador.`id_equi`=equipo.`id_equi` and jugador.`id_equi`=$id_equip";

        $result=mysqli_query($conexion,$sql);
        
while($mostrar=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $mostrar['nom_jug']?></td>
        <td><?php echo $mostrar['apel_jug']?></td>
        <td><?php echo $mostrar['cediden_jug']?></td>
        <td><?php echo $mostrar['nom_equi']?></td>
        <td><?php echo $mostrar['dorsal_jug']?></td>
        <td><?php echo $mostrar['pos_jug']?></td>
        <td><?php  echo '<img src="'.$mostrar["FotoJugador"].'" width="70" height="70" >'?></td>

                </tr>
        <?php
            }
        ?>

    </tbody>
  </table></center>
</div>
<div class="modulos">
  </br>
     <a href="../../modulos.html">Módulos</a>  
   </div>
		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>