<?php

include("conexion.php");

$id=$_POST['id'];


$sql="DELETE FROM mensajes WHERE id='$id'";
$query=mysqli_query($conexion,$sql);

if($query){
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['MessageReplied'] = $id;

    Header("Location: indexMensajes.php");
}

?>