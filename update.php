<?php
include("conexion.php");

$username = $_POST['Username'];
$new_password = $_POST['Password'];
$new_nombre = $_POST['Nombre'];
$new_apellido = $_POST['Apellido'];
$new_telefono = $_POST['Telefono'];
$new_sexo = $_POST['Sexo'];
$new_fecha_nacimiento = "2001/01/01";
$new_descripcion = $_POST['Descripcion'];
$new_direccion = $_POST['Direccion'];

$query = mysqli_query($conexion, "UPDATE usuarios SET password='$new_password', nombre='$new_nombre', apellido='$new_apellido', telefono='$new_telefono', sexo='$new_sexo', fecha_nacimiento='$new_fecha_nacimiento', descripcion='$new_descripcion', direccion='$new_direccion' WHERE username='$username'");

mysqli_close($conexion);

if($query){
    Header("Location: indexAdmin.php");
}

?>