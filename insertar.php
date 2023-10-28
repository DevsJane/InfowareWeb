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
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['created_user'] = $username;

    Header("Location: indexAdmin.php");
}else {
}
?>