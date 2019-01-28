<?php

   $mysqli = new mysqli('localhost', 'root', '', 'futbol');
   $mysqli->set_charset("utf8");

   $result = $mysqli->query("SELECT jornada_calen FROM `calendario` GROUP BY jornada_calen");

   if ($result->num_rows > 0){
        $combobit="";
        //llenar combobox
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $combobit .="<option  value='".$row["jornada_calen"]."'> Jornada &nbsp".$row["jornada_calen"]."</option>";
        }
    }
    else
    {
        echo "No hubo resultados";
    }

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
<center>
<div class="container"> 
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
  <center>
    <form method="post" action="" >
    <div class="form-group">
            <center><label style="font-size: 14pt"><b>Seleccione jornada</b></label></center>
            <SELECT NAME="id_jornada" SIZE=1 onChange="" required>
                <option value=""checked>Seleccione</option>
                <?php
                    echo $combobit;
                ?>
            </SELECT>
    </div>
   <input  class="btn btn-danger" type="submit" name="submit" value="Ver Partidos"/>
</div>
</form>
<?php
    if(isset($_POST['submit'])){
      require("index_2.php");
    }
  ?>
		</div></center>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
