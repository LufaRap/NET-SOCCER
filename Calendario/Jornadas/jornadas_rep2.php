<?php
	
	$id_jornada=$_POST['id_jornada'];
	$conexion = mysqli_connect('localhost','root','','futbol');
?>

<html>
 
<head>
    <title>Reportes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../../css/estilos_modulos.css">
    <link rel="stylesheet" href="../../css/estilos1.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script type="text/javascript">
     function cambiaf_a_mysql($fecha){
        ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
        $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
        return $lafecha;}
    </script>
    <script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for(i = 0; i < tam; i++) {
            if(!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
  </script>
</head>
    <body>
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

    <form method="post" action="registro_calen.php">
       <h3 class="bg-primary text-center pad-basic no-btm">Registrar jornadas </h3>
        <table class="table bg-info"  id="tabla">
            <thead>
              <tr> 
                <th style="text-align: center;">Equipo 1</th>
                <th style="text-align: center;">VS</th>
                <th style="text-align: center;">Equipo 2</th>
                <th style="text-align: center;"> Fecha </th>
                <th style="text-align: center;"> Hora </th>
                <th style="text-align: center;"> Estadio</th>
                <th style="text-align: center;"> Jornada</th>
                <th style="text-align: center;"> Partido</th>
              </tr>
            </thead>
       
        <?php 
        $sql="SELECT `Nom_Equi1`, `Nom_Equi2`,`jornada`,`partido` FROM `view_jornadas` WHERE jornada=$id_jornada";
        $result=mysqli_query($conexion,$sql);

        for ($i=0; $i < $mostrar=mysqli_fetch_array($result,MYSQLI_ASSOC); $i++) { ?>
            
       
        <tr class="fila-fija">
                        <td>
                        <center><?php echo $mostrar['Nom_Equi1'] ?></label></center>
                        <input required name="equipo1_calen[]" style="visibility:hidden" value="<?php echo $mostrar['Nom_Equi1'] ?>" /></td>
                        <td>VS</td>
                        <td>
                         <center><?php echo $mostrar['Nom_Equi2'] ?></center>
                        <input required name="equipo2_calen[]" style="visibility:hidden" value="<?php echo $mostrar['Nom_Equi2'] ?>" /></td>
                        <td><input required style="text-align: center;" type="date" name="fecha_calen[]"/></td>
                        <td><input required style="text-align: center;" type="time" name="hora_calen[]"/></td>
                        <td><input required style="text-align: center;" onkeypress="return soloLetras(event)" onblur="limpia()" name="estadio_calen[]" /></td>
                        <td>
                        <center><?php echo $mostrar['jornada'] ?></center>
                        <input required style="visibility:hidden" name="jornada_calen[]" value="<?php echo $mostrar['jornada'] ?>"/></td>
                        <td>
                        <center><?php echo $mostrar['partido'] ?></center>
                        <input required style="visibility:hidden" name="partido_calen[]" value="<?php echo $mostrar['partido'] ?>"/></td>
        </tr>
        <?php }?>
                </table>
                <div class="btn-der">
                    <input type="submit" name="insertar" value="Guardar Jornadas" class="btn btn-info"/>
                </div>

            </form>
            <div class="modulos">
              </br>
                 <a href="../../modulos.html">Módulos</a>  
            </div>
            
        </section>
    </body>

</html>


