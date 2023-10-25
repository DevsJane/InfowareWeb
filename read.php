<?php 
include("conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM usuarios WHERE username='$id'";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                                
                                <input type="text" class="form-control mb-3" name="Username" placeholder="Username" value="<?php echo $row['username']  ?>">
                                <input type="text" class="form-control mb-3" name="Password" placeholder="Password" value="<?php echo $row['password']  ?>">
                                <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="Apellido" placeholder="Apellido" value="<?php echo $row['apellido']  ?>">
                                <input type="text" class="form-control mb-3" name="Telefono" placeholder="Telefono" value="<?php echo $row['telefono']  ?>">
                                <input type="text" class="form-control mb-3" name="Sexo" placeholder="Sexo" value="<?php echo $row['sexo']  ?>">
                                <textarea class="form-control mb-3" name="Descripcion" rows="3" placeholder="Descripcion"><?php echo $row['descripcion']  ?></textarea>
                                <textarea class="form-control mb-3" name="Direccion" rows="3" placeholder="Direccion"><?php echo $row['direccion']  ?></textarea>
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>