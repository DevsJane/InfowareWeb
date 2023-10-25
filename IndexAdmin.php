<?php 
    include("conexion.php");

    $sql="SELECT * FROM usuarios";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Infoware</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                
                            <form action="insertar.php" method="POST">
                              <div class="container m-5 w-75 mx-auto">
                                <div class="row d-flex justify-content-center align-items-center mt-5 mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control w-75 mx-auto" name="Nombre" placeholder="Nombre" aria-label="First name">
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control w-75 mx-auto" name="Apellido" placeholder="Apellido" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                      <input type="text" class="form-control w-75 mx-auto" name="Username" placeholder="Usuario" aria-label="Username">
                                    </div>
                                    <div class="col">
                                      <input type="text" class="form-control w-75 mx-auto" name="Telefono" placeholder="Numero de telefono" aria-label="Phone Number">
                                    </div>
                                </div>
                                <!--
                                <div class="mb-3 mx-auto">
                                    <input type="email" class="form-control w-75 mx-auto" id="email" placeholder="Email">
                                </div>
                                -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select w-75 mx-auto" name="Sexo" aria-label="Default select example">
                                            <option selected>Sexo</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control w-75 mx-auto" name="Fecha de Nacimiento" id="birthday" placeholder="Fecha de Cumpleanios">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <textarea class="form-control w-75 mx-auto" name="Descripcion" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion Personal"></textarea>
                                    </div>

                                    <div class="col">
                                        <textarea class="form-control w-75 mx-auto" name="Direccion" id="exampleFormControlTextarea1" rows="3" placeholder="Direccion"></textarea>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="password" class="form-control w-75 mx-auto" name="Password" id="contra" placeholder="Contrasenia">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                          </form>

                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Sexo</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Descripcion</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            $query=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['username']?></th>
                                                <th><?php  echo $row['password']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['apellido']?></th>
                                                <th><?php  echo $row['telefono']?></th>   
                                                <th><?php  echo $row['sexo']?></th>   
                                                <th><?php  echo $row['fecha_nacimiento']?></th>   
                                                <th><?php  echo $row['descripcion']?></th>
                                                <th><?php  echo $row['direccion']?></th>          
                                                <th><a href="read.php?id=<?php echo $row['username'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['username'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>