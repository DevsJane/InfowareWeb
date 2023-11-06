<?php
include("conexion.php");

$url_origen = $_POST['url_origen'];
$email = $_POST['Email'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$sexo = $_POST['Sexo'];
$fecha_nacimiento = $_POST['Birthday'];
$pais = $_POST['Pais'];
$area_interes = $_POST['Area'];

// Verificar si el nombre de usuario ya existe en la base de datos
$check_username_query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE username='$username'");
if(mysqli_num_rows($check_username_query) > 0){
    echo "<script>
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '1000';

            var modalContent = document.createElement('div');
            modalContent.style.backgroundColor = '#fff';
            modalContent.style.padding = '20px';
            modalContent.style.borderRadius = '10px';

            var text = document.createElement('p');
            text.textContent = 'El nombre de usuario ya existe.';
            text.style.margin = '0';

            modalContent.appendChild(text);
            modal.appendChild(modalContent);
            document.body.appendChild(modal);

            setTimeout(function(){
                document.body.removeChild(modal);
            }, 3000);
          </script>";
    exit();
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
