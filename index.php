<?php

$server = "localhost";
$user = "root";
$pass = "1110";
$db = "infoware";

$conexion = new mysqli($server,$user,$pass,$db);

if ($conexion->connect_errno){
    die("La conexion a la base de datos ha fallado" . $conexion->connect_errno);
}else{echo "La conexion a la base de datos se ha completado con exito";}

