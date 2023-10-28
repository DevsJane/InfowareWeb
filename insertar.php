<?php
include("conexion.php");

$email = $_POST['Email'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$sexo = $_POST['Sexo'];
$fecha_nacimiento = $_POST['Birthday'];
$pais = $_POST['Pais'];
$area_interes = $_POST['Area'];

$query = mysqli_query($conexion,"INSERT INTO usuarios(email,username,password,nombre,apellido,sexo,fecha_nacimiento,pais,area_interes) 
            VALUES('$email','$username','$password','$nombre','$apellido','$sexo','$fecha_nacimiento','$pais','$area_interes')");

mysqli_close($conexion);

if($query){
    Header("Location: indexAdmin.php");
    echo "Se ha insertado correctamente";
}else {
}
?>