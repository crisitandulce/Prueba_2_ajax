<!-- conexion a base de datos -->
<?php
  $servidor="localhost";
  $usuario="root";
  $clave="";
  $baseDeDatos="prueba";

  $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

  if(!$enlace){
    echo"Error en la conexion con el servidor";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Formulario Prueba</title>
  <!-- libreria jquery  -->
  <script src="jquery-3.2.1.min.js"></script>


</head>
<body>
  <!-- insertar fecha  -->
  <?php

  date_default_timezone_set('America/Bogota');
  $fecha_actual=date("Y-m-d H:i:s");
  ?>

  <!-- creacion del formulario -->
  <div class="form">
    <form action="#" class="form-register" id="formulario" name="formulario" method="POST">
    <h4>Formulario Prueba</h4>
    <br> Si eres hombre selecciona LQ
    <br> Si eres mujer selecciona SM
    <br> Si oprimiste otro selecciona SL
    <br>
    <br>
    <input class="controls" type="text" name="cedula" placeholder="Ingrese su cedula">
    <input class="controls" type="text" name="nombres" placeholder="Ingrese su Nombre">
    <input class="controls" type="text" name="apellidos" placeholder="Ingrese su Apellido">
   <input class="controls" type="datetime" name="fecha" value="<?= $fecha_actual?>">

    
        <div class="sexo">
          <input type="radio" name="sexo" id="hombre" value="hombre">
          <label class="label-radio hombre" for="hombre">Hombre</label>

          <input type="radio" name="sexo" id="mujer" value="mujer">
          <label class="label-radio mujer" for="mujer">Mujer</label>

          <input type="radio" name="sexo" id="otro" value="otro">
          <label class="label-radio otro" for="otro">otro</label>
        </div>
        
        <div class="sexo">
          <input type="radio" name="codigo" id="lq" value="lq">
          <label class="label-radio hombre" for="lq">LQ</label>

          <input type="radio" name="codigo" id="sm" value="sm">
          <label class="label-radio mujer" for="sm">SM</label>

          <input type="radio" name="codigo" id="sl" value="sl">
          <label class="label-radio otro" for="sl">SL</label>
        </div>


    <input class="botons" type="submit" name="registrarse" value="Registrate" class="btn" id="btnguardar">
    <button class="botons" type="button" class="btn"><a href="tabla.php">Consultar Datos</a></button>

  </section>
</form>

</div>

</body>
</html>

<!-- codigo ajax  -->
<script type="text/javascript">
  $(document).ready(function(){
    //creamos el evento del boton guardar//
    $('#btnguardar').click(function(){
      //mediante el id del formulario traemos los datos//
      var datos=$('#formulario').serialize();
      $.ajax({
        type:"POST",
        url:"insertar.php",
        data:datos,
        //en succes se recibe un valor el cual devuelve un mensaje//
        success:function(r){
          if(r==1){
            alert("agregado con exito");
          }else{
            alert("Fallo el server");
          }
        }
      });
    });
  });
</script>
