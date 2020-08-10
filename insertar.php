<?php
 
  $conexion = mysqli_connect('localhost', 'root', '', 'prueba');

    $cedula =$_POST["cedula"];
    $nombre =$_POST["nombres"];
    $apellido=$_POST["apellidos"];
    $sexo=$_POST["sexo"];
    $id;
    $fecha=$_POST['fecha'];
    $codigo=$_POST["codigo"];
    

    $sql = "INSERT INTO datos VALUES('$cedula',
                          '$nombre',
                          '$apellido',
                          '$sexo',
                          'id',
                          '$fecha',
                          '$codigo')";

   echo mysqli_query($conexion,$sql);                       


?>