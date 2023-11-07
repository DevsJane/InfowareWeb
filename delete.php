<?php

include("conexion.php");

$dato=$_GET['id'];
/*
list($id, $username) = explode('-', $dato);
*/

$sql="DELETE FROM usuarios  WHERE username='$dato'";
$query=mysqli_query($conexion,$sql);

if($query){
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['deleted_user'] = $dato;

    Header("Location: indexAdmin.php");
}

?>