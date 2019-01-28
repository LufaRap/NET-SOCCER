<html>
<head>

	<meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="../../imagenes/SS.png">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilos_modulos.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
	<title>Equipos Registrados</title>
    
  
</head>
<body background="../../imagenes/fondo.jpg">
	<center><div class="tit"><h2 style="color: #81210D; ">EQUIPOS REGISTRADOS</h2>
<!-- formulario registro -->

<div class="container"> 

  <center><table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id_Equipo</th>
        <th scope="col"></th>
		<th scope="col">Nombre Equipo</th>
		<th scope="col">Nombre Dirigente</th>
        <th scope="col">Cedula Dirigente</th>

        
      </tr>
    </thead>
    <tbody>
        <?php
        $conexion = mysqli_connect('localhost','root','','futbol');

        $sql="SELECT * from equipo ";

        $result=mysqli_query($conexion,$sql);
        
while($mostrar=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $mostrar['ID_EQUI']?></td>
        <td><?php echo '<img src="'.$mostrar["FotoEquipo"].'" width="30" height="30" >';?></td>
        <td><?php echo $mostrar['NOM_EQUI']?></td>
        <td><?php echo $mostrar['NOMDIR_EQUI']?></td>
        <td><?php echo $mostrar['CEDULA_DIR']?></td>
       

                </tr>
        <?php
            }
        ?>

    </tbody>

  </table>
        
     </div>    
</div>
<div class="modulos">
</br>
</br>
   <a href="../../modulos.html">Módulos</a>  
   </div>

<!--Fin formulario registro -->

		</td>
		</tr>
		


		</div></center></div></center>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
</body>
</html>