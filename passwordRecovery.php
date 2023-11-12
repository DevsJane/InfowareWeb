<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $username = $_POST['Username'];
    $new_password = $_POST['Password'];
    $re_new_password = $_POST['RePassword'];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$username' AND email='$email'");

    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($new_password != $re_new_password){
        // Guardar el nombre del usuario en una variable de sesión
        $_SESSION['NotSamePass'] = "La contrasenias no son las mismas";

        // Redirigir al usuario al index principal
        header('Location: indexPasswordRecovery.php');
    
    }

    if(mysqli_num_rows($query) > 0 and $new_password == $re_new_password){
        // Guardar el nombre del usuario en una variable de sesión
        $_SESSION['RecoveredUser'] = $username;

        $query = mysqli_query($conexion, "UPDATE usuarios SET password='$new_password' WHERE username='$username'");

        unset($_SESSION['NotSamePass']);
        unset($_SESSION['NotRecoveredUser']);

        // Redirigir al usuario al index principal
        header('Location: indexInicio.php');
    } 
    if(mysqli_num_rows($query) == 0 and $new_password == $re_new_password){
        $_SESSION['NotRecoveredUser'] = $username;
        unset($_SESSION['NotSamePass']);
        header('Location: indexInicio.php');
    }

    mysqli_close($conexion);
}
?>
