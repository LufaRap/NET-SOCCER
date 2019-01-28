<?php
    
    $id_jornada=$_POST['id_jornada'];
    $conexion = mysqli_connect('localhost','root','','futbol');
?>
<html>
<head>
	<title>NETSOCCER 1.0</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos_inicio.css">
	<link rel="shortcut icon" type="image/x-icon" href="imagenes/SS.png">
		
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body background="imagenes/back.jpg" >
<div class="container"> 
  
    <header>
                 <?php
                    $sql="SELECT jornada FROM `view_jornadas` WHERE `jornada`=$id_jornada GROUP BY (jornada)";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                ?>
                <center><h2>Jornada <?php echo $mostrar['jornada']?> </h2></center>
                    <?php
                        }
                     ?>    
        </header>

    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th style="text-align: center;">Equipo 1</th>
        <th style="text-align: center;">VS</th>                <th style="text-align: center;">Equipo 2</th>
        <th style="text-align: center;"> Fecha </th>           <th style="text-align: center;"> Hora </th>            <th style="text-align: center;"> Estadio</th>        
      </tr>
    </thead>
    <tbody>
        <?php 
 
        $sql="SELECT `equipo1_calen`, `equipo2_calen`,`fecha_calen`,`hora_calen`,`estadio_calen`,`jornada_calen`,`partido_calen` FROM `calendario`  WHERE jornada_calen=$id_jornada";
        $result=mysqli_query($conexion,$sql);

        for ($i=0; $i < $mostrar=mysqli_fetch_array($result,MYSQLI_ASSOC); $i++) { ?>
            
       
        <tr class="fila-fija">
                        <td style="text-align: center;">
                        <label></label>><?php echo $mostrar['equipo1_calen'] ?></label></center>
                        </td>
                        <td style="text-align: center;">VS</td>
                        <td style="text-align: center;">
                         <?php echo $mostrar['equipo2_calen'] ?>
                        </td>
                        <td style="text-align: center;"><label><?php echo $mostrar['fecha_calen']?></label></td>
                        <td style="text-align: center;"><label><?php echo $mostrar['hora_calen']?></label></td>
                        <td style="text-align: center;"><label><?php echo $mostrar['estadio_calen']?></label></td>
        </tr>
        <?php }?>
    </tbody>

  </table>
        
        
</div>


<!--Fin formulario registro -->

		</td>
		</tr>
		


		</div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
