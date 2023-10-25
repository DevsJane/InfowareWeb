<?php
include("conexion.php");

$username = $_POST['Username'];
$password = $_POST['Password'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$telefono = $_POST['Telefono'];
$sexo = "Indeterminado";
$fecha_nacimiento = "2001/01/01";
$descripcion = $_POST['Descripcion'];
$direccion = $_POST['Direccion'];

$query = mysqli_query($conexion,"INSERT INTO usuarios(username,password,nombre,apellido,telefono,sexo,fecha_nacimiento,descripcion,direccion) 
            VALUES('$username','$password','$nombre','$apellido','$telefono','$sexo','$fecha_nacimiento','$descripcion','$direccion')");

mysqli_close($conexion);

if($query){
    Header("Location: indexAdmin.php");
    echo "Se ha insertado correctamente";
}else {
}
?>