<?php

$server = "localhost";
$user = "root";
$pass = "1110";
$db   = "infoware";

$conexion = new mysqli($server,$user,$pass,$db);

if($conexion->connect_errno){
    die("La conexion ha fallado" . $conexion->connect_errno);
}

?>

