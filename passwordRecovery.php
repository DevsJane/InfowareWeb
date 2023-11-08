<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $username = $_POST['Username'];
    $new_password = $_POST['Password'];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$username' AND email='$email'");

    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(mysqli_num_rows($query) > 0){
        // Guardar el nombre del usuario en una variable de sesión
        $_SESSION['RecoveredUser'] = $username;

        $query = mysqli_query($conexion, "UPDATE usuarios SET password='$new_password' WHERE username='$username'");

        // Redirigir al usuario al index principal
        header('Location: indexInicio.php');
    } else {
        $_SESSION['NotRecoveredUser'] = $username;
        header('Location: indexInicio.php');
    }

    mysqli_close($conexion);
}
?>
