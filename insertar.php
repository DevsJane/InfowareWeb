<?php
include("index.php");

$username = "jane";
$password = "1110";
$nombre = "Nicolas";
$apellido = "Contreras";
$telefono = "972061250";
$sexo = "Masculino";
$fecha_nacimiento = "2001/01/01";
$descripcion = "Ola, esto es una prueba xd";
$direccion = "Mi casa";

mysqli_query($conexion,"INSERT INTO usuarios(username,password,nombre,apellido,telefono,sexo,fecha_nacimiento,descripcion,direccion) 
            VALUES('$username','$password','$nombre','$apellido','$telefono','$sexo','$fecha_nacimiento','$descripcion','$direccion')");

mysqli_close($conexion);
?>