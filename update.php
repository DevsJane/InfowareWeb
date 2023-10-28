<?php
include("conexion.php");

$id = $_POST['id'];
$new_email = $_POST['Email'];
$new_username = $_POST['Username'];
$new_password = $_POST['Password'];
$new_nombre = $_POST['Nombre'];
$new_apellido = $_POST['Apellido'];
$new_sexo = $_POST['Sexo'];
$new_fecha_nacimiento = $_POST['Birthday'];
$new_pais = $_POST['Pais'];
$new_area = $_POST['Area'];

$query = mysqli_query($conexion, "UPDATE usuarios SET email='$new_email', username='$new_username', password='$new_password', nombre='$new_nombre', apellido='$new_apellido', sexo='$new_sexo', fecha_nacimiento='$new_fecha_nacimiento', pais='$new_pais', area_interes='$new_area' WHERE id='$id'");

mysqli_close($conexion);

if($query){
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Guardar el nombre del usuario en una variable de sesión
    $_SESSION['updated_user'] = $new_username;

    Header("Location: indexAdmin.php");
}
