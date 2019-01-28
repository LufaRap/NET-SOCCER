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
<center><div class="tit"><h2 style="color: #0000FF; ">Jornadas</h2>
<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>  
    <table>
        <tr>
          <td>
            <div class="form-group">
        
        <tr>
          <td>
            <div class="form-group">
            <center><label style="font-size: 14pt"><b>Seleccione jornada</b></label></center>
            <SELECT NAME="id_jornada" SIZE=1 onChange="" required>
                <option value=""checked>Seleccione</option>
                <?php
                    echo $combobit;
                ?>
            </SELECT>
            </div>
          </td>
      </table>    

     </br>   
    <input  class="btn btn-danger" type="submit" name="submit" value="Ver Partidos"/>
  </fieldset>
</form>
</div>

<?php
    if(isset($_POST['submit'])){
      require("partidos_regist2.php");
    }
  ?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>