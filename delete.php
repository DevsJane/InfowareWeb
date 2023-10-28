<?php

include("conexion.php");

$username=$_GET['id'];

echo $username;

$sql="DELETE FROM usuarios  WHERE username='$username'";
$query=mysqli_query($conexion,$sql);

if($query){
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['deleted_user'] = $username;
    
    Header("Location: indexAdmin.php");
}

?>