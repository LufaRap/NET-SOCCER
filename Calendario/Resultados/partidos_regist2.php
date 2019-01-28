<?php
	
	$id_jornada=$_POST['id_jornada'];
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
    <script type="text/javascript">
        // Solo permite ingresar numeros.
        function soloNumeros(e){
          var key = window.Event ? e.which : e.keyCode
          return (key >= 48 && key <= 57)
        }
    </script>
     <script type="text/javascript">
    function limitar(e, contenido, caracteres)
        {
            // obtenemos la tecla pulsada
            var unicode=e.keyCode? e.keyCode : e.charCode;
 
            // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
            if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
                return true;
 
            // Si ha superado el limite de caracteres devolvemos false
            if(contenido.length>=caracteres)
                return false;
 
            return true;
        }
      </script>
</head>

<body background="../../imagenes/fondo.jpg">
	<div class="tit">
	 <?php
        $sql="SELECT jornada FROM `view_jornadas` WHERE `jornada`=$id_jornada GROUP BY (jornada)";
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
    ?>
    <center><h2>Jornada <?php echo $mostrar['jornada']?> </h2></center>
        <?php
            }
         ?>
    </div>

    <form id="frm-guardar" action="registro_partido.php" method="post" enctype="multipart/form-data">
        <table class="table">
            <thead>
            <tr> 
                <th style="text-align: center;">Equipo 1</th>
                <th style="text-align: center;">VS</th>
                <th style="text-align: center;">Equipo 2</th>
                <th style="text-align: center;"> Goles E1 </th>
                <th style="text-align: center;"> Goles E2 </th>
                <th style="text-align: center;"> Fecha </th>
                <th style="text-align: center;"> Hora </th>
                <th style="text-align: center;"> Estadio</th>
                <th style="text-align: center;"> Jornada</th>
                <th style="text-align: center;"> Partido</th>
              </tr>
            </thead>
        
        <?php 
        $sql="SELECT `equipo1_calen`, `equipo2_calen`,`fecha_calen`,`hora_calen`,`estadio_calen`,`jornada_calen`,`partido_calen` FROM `calendario`  WHERE jornada_calen=$id_jornada";
        $result=mysqli_query($conexion,$sql);

        for ($i=0; $i < $mostrar=mysqli_fetch_array($result,MYSQLI_ASSOC); $i++) { ?>
            
       
        <tr class="fila-fija">
                        <td>
                        <center><?php echo $mostrar['equipo1_calen'] ?></label></center>
                        <input required name="nomequipo1[]" style="visibility:hidden" value="<?php echo $mostrar['equipo1_calen'] ?>" /></td>
                        <td>VS</td>
                        <td>
                        <center><?php echo $mostrar['equipo2_calen'] ?></label></center>
                        <input required name="nomequipo2[]" style="visibility:hidden" value="<?php echo $mostrar['equipo2_calen'] ?>" /></td>
                        <td><input required style="text-align: center;" type="text" pattern=".{1,2}" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2 )" onkeypress="return soloNumeros(event)" name="golequi1[]"/></td>
                        <td>
                         <input required style="text-align: center;" type="text" pattern=".{1,2}" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2 )" onkeypress="return soloNumeros(event)" name="golequi2[]"/></td>
                        <td>
                        <center><?php echo $mostrar['fecha_calen'] ?></center>
                        <input required style="visibility:hidden" name="fecha_calen[]" value="<?php echo $mostrar['fecha_calen'] ?>"/></td>
                        <td>
                        <center><?php echo $mostrar['hora_calen'] ?></center>
                        <input required style="visibility:hidden" name="hora[]" value="<?php echo $mostrar['hora_calen'] ?>"/></td>
                        <td>
                        <center><?php echo $mostrar['estadio_calen'] ?></center>
                        <input required style="visibility:hidden" name="estadio[]" value="<?php echo $mostrar['estadio_calen'] ?>"/></td>
                        <td>
                        <center><?php echo $mostrar['jornada_calen'] ?></center>
                        <input required style="visibility:hidden" name="jornada[]" value="<?php echo $mostrar['jornada_calen'] ?>"/></td>
                        <td>
                        <center><?php echo $mostrar['partido_calen'] ?></center>
                        <input required style="visibility:hidden" name="partido[]" value="<?php echo $mostrar['partido_calen'] ?>"/></td>
                        
        </tr>
        <?php }?>
           
          </table>
           <div class="btn-der">
                    <input type="submit" name="insertar" value="Guardar Partidos" class="btn btn-info"/>
           </div>
</div>
<div class="modulos">
  </br>
     <a href="../../modulos.html">Módulos</a>  
   </div>
	
</body>
</html>