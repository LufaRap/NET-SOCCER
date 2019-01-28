<?php

   $mysqli = new mysqli('localhost', 'root', '', 'futbol');
   $mysqli->set_charset("utf8");

   $result = $mysqli->query("SELECT id_equi,nom_equi FROM equipo");


   if ($result->num_rows > 0){
        $combobit="";
        //llenar combobox
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $combobit .="<option  value='".$row["id_equi"]."'>".$row["nom_equi"]."</option>";
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
	<title>Registro Jugadores</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="/resources/demos/external/jquery-mousewheel/jquery.mousewheel.js"></script>
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
	<center><div class="tit"><h2 style="color: #0000FF; ">Registrar jugador</h2>
<!-- formulario registro -->

<form method="post" action="" enctype="multipart/form-data">
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro</b></legend>
    
    <table>
    
        <tr>
            
        <div class="form-group">
        <label style="font-size: 14pt"><b>Foto Jugador</b></label>
        <input type="file" name="fotojug" id="fotojug" class="form-control" required/>
        </div>
          <td>
            <div class="form-group">
              <center><label style="font-size: 14pt"><b>Nombres</b></label></center>
              <input type="text" name="realname" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" class="form-control" required/>
            </div>
          </td>
          <td>
            <div class="form-group">
              <center><label style="font-size: 14pt"><b>Apellidos</b></label></center>
              <input type="text" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" name="apellido" class="form-control" required/>
            </div>
          </td>
        </tr>
        <tr>  
          <td>
            <div class="form-group">
            <center><label style="font-size: 14pt"><b>Cédula de Identidad</b></label></center>
            <input type="text" name="ci_jug" onKeyPress="return soloNumeros(event)" onKeyUp="return limitar(event,this.value,10)" onKeyDown="return limitar(event,this.value,10)" pattern=".{10,10}" class="form-control" required/>
          </div></td>       
           <td>
            <div class="form-group">
            <center><label style="font-size: 14pt"><b>Edad</b></label></center>
              <input type="text" id="edad" onKeyPress="return soloNumeros(event)" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2 )" name="edad" class="form-control"  required />
               
            </div>
        </td>
          
        </tr>
        <tr>
          <td>
            <div class="form-group">
            <center><label style="font-size: 14pt"><b>Equipo</b></label></center>
            <SELECT NAME="id_equip" SIZE=1 onChange="" required>
                <option value=""checked>Seleccione</option>
                <?php
                    echo $combobit;
                ?>
            </SELECT>
            </div>
          </td>
          <td>              
            <div class="form-group">
              <center><label style="font-size: 14pt"><b>Género</b></label></center>
            <SELECT NAME="genero" SIZE=1 onChange="" required>
                <option value=""checked>Seleccione</option>
                <OPTION VALUE="Masculino">Masculino</OPTION>
            </SELECT>
            </div>
        </td>
        </tr>
        <tr>
          <td>
            <div class="form-group">
              <center><label style="font-size: 14pt"><b>Dorsal</b></label></center>
              <input type="text" name="dorsal" onKeyPress="return soloNumeros(event)" onKeyUp="return limitar(event, this.value,2)" onKeyDown="return limitar(event,this.value,2 )" class="form-control" required />
            </div>
          </td>
          <td>
            <div class="form-group">
              <center><label style="font-size: 14pt"><b>Posición</b></label></center>
              <SELECT NAME="posicion" SIZE=1 onChange="" required>
                <option value=""checked>Seleccione</option>
                <OPTION VALUE="Otro">Otro</OPTION>
                <OPTION VALUE="Arquero">Arquero</OPTION>
                <OPTION VALUE="Defensa">Defensa</OPTION> 
                <OPTION VALUE="Central">Central</OPTION>
                <OPTION VALUE="Lateral">Lateral</OPTION> 
                <OPTION VALUE="Carrilero">Carrilero</OPTION>
                <OPTION VALUE="Pivote">Pivote</OPTION>
                <OPTION VALUE="Volante">Volante</OPTION>
                <OPTION VALUE="Media Punta">Media Punta</OPTION>
                <OPTION VALUE="Delantero">Delantero</OPTION> 
                <OPTION VALUE="Delantero Centro">Delantero Centro</OPTION>

            </SELECT>
            </div>
          </td>
        </tr>
        
    
    
      </table>    
     </br>   
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
<div >
  </br>
     <a href="../registros.html" class="btn btn-danger">Atras</a>  
   </div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>