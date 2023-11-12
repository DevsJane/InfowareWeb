<?php
include("conexion.php");

$email = $_POST['Email'];
$nombre = $_POST['Nombre'];
$mensaje = $_POST['Mensaje'];

$query = mysqli_query($conexion,"INSERT INTO mensajes(email,nombre,mensaje) VALUES('$email','$nombre','$mensaje')");

mysqli_close($conexion);

if($query){
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['MessageSubmited'] = "Tu mensaje ha sido enviado. Gracias por tu feedback!";

    header('Location: indexInicio.php');

}else {
}
?>