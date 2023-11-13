<?php
include("conexion.php");

$url_origen = $_POST['url_origen'];
$email = $_POST['Email'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$confirm_password = $_POST['ConfirmPassword'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$sexo = $_POST['Sexo'];
$fecha_nacimiento = $_POST['Birthday'];
$pais = $_POST['Pais'];
$area_interes = $_POST['Area'];


$validacion_email = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '$email';");

if (mysqli_num_rows($validacion_email) > 0) {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['Failed_Email'] = 'Este Email ya esta en uso';

    if ($url_origen == 'indexAdmin.php'){

        header('Location: indexAdmin.php');
    }
    else if ($url_origen == 'indexRegistro.php'){

        header('Location: indexRegistro.php');
    }
    else if ($url_origen == 'read.php'){

        header('Location: read.php');
    }
    exit();
} else {
}


$validacion_username = mysqli_query($conexion,"SELECT * FROM usuarios WHERE username = '$username';");

if (mysqli_num_rows($validacion_username) > 0) {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['Failed_Username'] = 'Este username ya esta en uso';

    if ($url_origen == 'indexAdmin.php'){

        header('Location: indexAdmin.php');
    }
    else if ($url_origen == 'indexRegistro.php'){

        header('Location: indexRegistro.php');
    }
    else if ($url_origen == 'read.php'){

        header('Location: read.php');
    }
    exit();
} else {
}


if ($password != $confirm_password) {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['Failed_Password'] = 'Las contrasenias no son iguales';

    if ($url_origen == 'indexAdmin.php'){

        header('Location: indexAdmin.php');
    }
    else if ($url_origen == 'indexRegistro.php'){

        header('Location: indexRegistro.php');
    }
    exit();
} else {
}


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

    if ($url_origen == 'indexAdmin.php'){
        header('Location: indexAdmin.php');
    }
    else if ($url_origen == 'indexRegistro.php'){
        header('Location: indexInicio.php');
    }

}else {
}
?>