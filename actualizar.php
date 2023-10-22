<?php
include("index.php");

$username = "jane";
$new_password = "111111";
$new_nombre = "Nicolas";
$new_apellido = "Contreras";
$new_telefono = "972061250";
$new_sexo = "Male";
$new_fecha_nacimiento = "2001/01/01";
$new_descripcion = "Ola, esto es una prueba xd";
$new_direccion = "Mi casa";

mysqli_query($conexion, "UPDATE usuarios SET password='$new_password', nombre='$new_nombre', apellido='$new_apellido', telefono='$new_telefono', sexo='$new_sexo', fecha_nacimiento='$new_fecha_nacimiento', descripcion='$new_descripcion', direccion='$new_direccion' WHERE username='$username'");

mysqli_close($conexion);
?>