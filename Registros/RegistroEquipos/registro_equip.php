<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="../../imagenes/SS.png">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-responsive.css">
        
	<title>Registro Equipo</title>
    
 <!-- funcion solo Numeros -->   
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
 <!-- funcion solo letras -->   
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
<body background="../../imagenes/fondo.jpg" >
	<center><div class="tit"><h2 style="color: #0000FF; ">Registrar Equipo</h2>
<!-- formulario registro -->

<form method="post" action="" enctype="multipart/form-data">
  <fieldset>
    <legend  style="font-size: 14pt"><b>Registro el nuevo equipo</b></legend>

    <div class="form-group">
      <label style="font-size: 14pt"><b>Nombre Equipo</b></label>
      <input type="text" name="nom_equi" class="form-control" placeholder="Ingresa nombre" required/>
    </div>
    <div class="form-group">
     

      <label style="font-size: 14pt"><b>Logo Equipo</b></label>
      <input type="file" name="fotoequi" id="fotoequi" class="form-control"  required/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Nombre dirigente</b></label>
      <input type="text" name="realname" class="form-control" placeholder="Ingresa nombre" onkeypress="return soloLetras(event)" onblur="limpia()" required/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Cedula dirigente</b></label>
      <input type="text" name="cel_dir" class="form-control" placeholder="Ingresa cedula" onKeyPress="return soloNumeros(event)" onKeyUp="return limitar(event,this.value,10)" onKeyDown="return limitar(event,this.value,10)" pattern=".{10,10}" required/>
    </div>
    
      
    </div>
   
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrar"/>

  </fieldset>
</form>
</div>
<div class="salir">
  <br>
     <a href="../registros.html" class="btn btn-danger">Atras</a>  
   </div>
<?php
		if(isset($_POST['submit'])){
			require("registro_e.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>