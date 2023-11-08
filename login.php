<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$username' AND password='$password'");

    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(mysqli_num_rows($query) > 0){
        // Guardar el nombre del usuario en una variable de sesión
        $_SESSION['logged_in_user'] = $username;

        // Redirigir al usuario al index principal
        header('Location: indexInicio.php');
    } else {
        $_SESSION['login_error'] = "Nombre de usuario o contraseña incorrectos.";
        header('Location: indexInicio.php');
    }

    mysqli_close($conexion);
}
?>
