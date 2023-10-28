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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                                <input type="hidden" class="form-control mb-3" name="id" placeholder="ID" value="<?php echo $row['id']  ?>">
                                <input type="text" class="form-control mb-3" name="Email" placeholder="Email" value="<?php echo $row['email']  ?>">
                                <input type="text" class="form-control mb-3" name="Username" placeholder="Username" value="<?php echo $row['username']  ?>">
                                <input type="text" class="form-control mb-3" name="Password" placeholder="Password" value="<?php echo $row['password']  ?>">
                                <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="Apellido" placeholder="Apellido" value="<?php echo $row['apellido']  ?>">
                                <select class="form-select w-75 mx-auto" name="Sexo" aria-label="Default select example" value="<?php echo $row['sexo']  ?>">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                </select>
                                <input type="date" class="form-control w-75 mx-auto" name="Birthday" id="birthday" placeholder="Fecha de Nacimiento" value="<?php echo $row['fecha_nacimiento']  ?>">
                                <input type="text" class="form-control mb-3" name="Pais" placeholder="Pais" value="<?php echo $row['pais']  ?>">
                                <select class="form-select w-75 mx-auto" name="Area" aria-label="Default select example" value="<?php echo $row['area_interes']  ?>" placeholder="Area de Interes">
                                    
                                    <option value="Hardware y Componentes">Hardware y Componentes</option>
                                    <option value="Software">Software</option>
                                    <option value="Videojuegos">Videojuegos</option>
                                    <option value="Inteligencia Artifical">Inteligencia Artifical</option>
                                    <option value="Tecnologia Movil">Tecnologia Movil</option>
                                    <option value="Ciberseguridad">Ciberseguridad</option>
                                </select>
                                
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">Actualizar</button>

                            <!--Notificacion Editar-->
                            <div class="modal" tabindex="-1" id="UpdateModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Confirmacion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Estas seguro que quieres actualizar este usuario?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                    <input type="submit" data-bs-toggle="modal" data-bs-target="#UpdateModal" class="btn btn-primary btn-block" value="Actualizar">
                                    </div>
                                </div>
                                </div>
                            </div>
                    </form>
                    
                </div>
    </body>
</html>