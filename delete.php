<?php

include("conexion.php");

$username=$_GET['id'];

echo $username;

$sql="DELETE FROM usuarios  WHERE username='$username'";
$query=mysqli_query($conexion,$sql);

if($query){
    Header("Location: indexAdmin.php");
}

?>