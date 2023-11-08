<?php 
    include("conexion.php");

    $sql="SELECT * FROM usuarios";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infoware Web</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
    <!--Links para footer-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!---->
    <?php
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si existe la variable de sesión 'deleted_user'
    if (isset($_SESSION['deleted_user'])) {
        $deleted_user = $_SESSION['deleted_user'];

        // Mostrar la alerta con el nombre del usuario
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
            'El usuario ' . $deleted_user . ' ha sido eliminado.' .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
            '</div>';

        // Eliminar la variable de sesión para que la alerta no se muestre de nuevo
        unset($_SESSION['deleted_user']);
    }
    if (isset($_SESSION['created_user'])) {
      $created_user = $_SESSION['created_user'];

      // Mostrar la alerta con el nombre del usuario
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
          'El usuario ' . $created_user . ' ha sido ingresado.' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
          '</div>';

      // Eliminar la variable de sesión para que la alerta no se muestre de nuevo
      unset($_SESSION['created_user']);
    }
    if (isset($_SESSION['updated_user'])) {
      $updated_user = $_SESSION['updated_user'];

      // Mostrar la alerta con el nombre del usuario
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">' .
          'El usuario ' . $updated_user . ' ha sido actualizado.' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
          '</div>';

      // Eliminar la variable de sesión para que la alerta no se muestre de nuevo
      unset($_SESSION['updated_user']);
    }

    ?>


</head>
<body>

    <header>
        <h1 class="center-text p-color">Infoware</h1>

        <nav class="navbar navbar-expand-lg secondary-bg-color my-5" data-bs-theme="dark">
          <div class="container-fluid">
              <img src="logo-nav.png" id="logo-nav">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                
                <img src="icono-usuario.png" alt="IconoUsuario" style="margin:5px;">
                <?php if(isset($_SESSION['logged_in_user'])): ?>
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background:none; border:none;margin-right:20px;">
                            <?php echo $_SESSION['logged_in_user']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdropLogin" 
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; margin-right:20px;">
                        Iniciar Sesion
                    </button>
                    <!-- Modal -->
                    <!-- Jquery -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <script>
                    $(document).ready(function(){
                        <?php if(isset($_SESSION['login_error'])): ?>
                            // Volver a abrir el modal de inicio de sesión
                            $('#staticBackdropLogin').modal('show');
                        <?php endif; ?>
                    });
                    </script>

                    <div class="modal fade" id="staticBackdropLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                            <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Iniciar Sesion</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-light bg-dark">

                            <?php if(isset($_SESSION['login_error'])): ?>
                                <p class="text-danger"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
                            <?php endif; ?>

                            <form action="login.php" method="POST" autocomplete="off">
                                <div class="row mb-3">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUsername" name="Username">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" name="Password">
                                    </div>
                                </div>
                                <div class="container mx-auto">
                                    <p>No tiene cuenta? <a href="indexRegistro.php">Registrarse</a></p>
                                </div>
                                <div class="mx-auto mb-3 text-light bg-dark d-flex justify-content-center">
                                    <button type="submit" class="btn btn-secondary">Iniciar</button>
                                </div>
                            </form>

                            </div>
                        </div>
                        </div>
                      </div>
                    </div>  
                <?php endif; ?>    
              </div>
            </div>
        </nav>

    </header>

    <main>

      <section>
        <div id="carouselExampleCaptions" class="carousel slide mx-5">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner mx">
            <div class="carousel-item active">
              <img src="carrusel-redes.jpeg" class="d-block w-100" alt="..." height="400px">
              <div class="carousel-caption d-none d-md-block">
                  <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                      <h5>Conoce nuestras redes sociales</h5>
                      <p>Te invitamos a conocer las redes sociales de nuestra pagina!</p>
                  </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="carrusel-register.jpeg" class="d-block w-100" alt="..." height="400px">
              <div class="carousel-caption d-none d-md-block">
                  <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                      <h5>Registrate</h5>
                      <p>Si quieres unirte a esta enorme comunidad, te invitamos a registrarte en nuestra Web.</p>
                  </div>
              </div>
            </div>
            <div class="carousel-item">
              <img src="carrusel-comm.jpg" class="d-block w-100" alt="..." height="400px">
              <div class="carousel-caption d-none d-md-block">
                  <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                      <h5>Comunicate con nosotros</h5>
                      <p>Tenemos un canal de comunicacion para poder consultar cualquier cosa.</p>
                  </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section>
        <div class="container mt-5">
                <div class="col mx-auto"> 
                    
                    <div class="col-md-3 mx-auto">
                    <button class="btn btn-primary d-flex mx-auto mb-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Insertar Usuario</button>
                    <div class="offcanvas offcanvas-top bg-dark text-white" data-bs-backdrop="static" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" style="height:500px;">
                      <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasTopLabel">Insertar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <form action="insertar.php" method="POST" autocomplete="off">
                          <input type="hidden" name="url_origen" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">
                          <input type="hidden" class="form-control mb-3" name="id" placeholder="ID">
                          <div class="container m-5 w-75 mx-auto">
                              <div class="row d-flex justify-content-center align-items-center mt-5 mb-3">
                                  <div class="col">
                                    <input type="text" class="form-control w-75 mx-auto" name="Nombre" placeholder="Nombre" aria-label="First name" required>
                                  </div>
                                  <div class="col">
                                    <input type="text" class="form-control w-75 mx-auto" name="Apellido" placeholder="Apellido" aria-label="Last name" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <div class="col">
                                    <input type="email" class="form-control w-75 mx-auto" name="Email" placeholder="Email" aria-label="Email" id="Email" required>
                                  </div>
                                  <div class="col">
                                    <input type="text" class="form-control w-75 mx-auto" name="Username" placeholder="Username" aria-label="Username" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                    <input type="password" class="form-control w-75 mx-auto" name="Password" placeholder="Contrasenia" required>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control w-75 mx-auto" name="Re-Password" placeholder="Confirmar Contrasenia" required>
                                </div>
                              </div>
                              <!--
                              <div class="mb-3 mx-auto">
                                  <input type="email" class="form-control w-75 mx-auto" id="email" placeholder="Email">
                              </div>
                              -->
                              <div class="row mb-3">
                                  <div class="col">
                                    <select class="form-select w-75 mx-auto" name="Sexo" aria-label="Default select example" required>
                                        <option selected>Sexo</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                  </div>
                                  <div class="col">
                                      <input type="date" class="form-control w-75 mx-auto" name="Birthday" placeholder="Fecha de Cumpleanios" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col">
                                  <input type="text" class="form-control w-75 mx-auto" name="Pais" placeholder="Pais" required>
                                </div>
                                <div class="col">
                                  <select class="form-select w-75 mx-auto" name="Area" aria-label="Default select example" required>
                                      <option selected>Area de Interes</option>
                                      <option value="Hardware y Componentes">Hardware y Componentes</option>
                                      <option value="Software">Software</option>
                                      <option value="Videojuegos">Videojuegos</option>
                                      <option value="Inteligencia Artifical">Inteligencia Artifical</option>
                                      <option value="Tecnologia Movil">Tecnologia Movil</option>
                                      <option value="Ciberseguridad">Ciberseguridad</option>
                                  </select>
                                </div>
                              </div>
                              <div class="d-flex justify-content-center align-items-center">
                                  <button type="submit" class="btn btn-primary">Ingresar</button>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="col-md-3 mx-auto">
                      <!-- Botón para abrir el modal -->
                      <button type="button" class="btn btn-primary d-flex mx-auto mb-5"  data-toggle="modal" data-target="#miModal">
                        Busqueda Avanzada
                      </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title" id="miModalLabel">Busqueda Avanzada</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body bg-dark">
                            <!--Busqueda Avanzada-->
                            <div class="container py-4 text-center d-flex flex-column align-items-center justify-content-center">
                            <h2>Usuarios</h2>

                            <div class="row g-4">

                                <div class="col-auto">
                                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                                </div>

                                <div class="col-auto">
                                    <select name="num_registros" id="num_registros" class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <label for="num_registros" class="col-form-label">registros </label>
                                </div>

                                <div class="col-5"></div>

                                <div class="col-auto">
                                    <label for="campo" class="col-form-label">Buscar: </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="campo" id="campo" class="form-control">
                                </div>
                            </div>

                            <div class="row py-4">
                                <div class="col">
                                    <table class="table table-sm table-bordered table-striped divTabla">
                                        <thead>
                                            <th class="sort asc" style="font-size:10px; width:20px;">id</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">email</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">username</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">password</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">nombre</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">apellido</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">sexo</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">fecha_nacimiento</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">pais</th>
                                            <th class="sort asc" style="font-size:10px; width:20px;">area_interes</th>
                                            <th style="font-size:10px; width:20px;"></th>
                                            <th style="font-size:10px; width:20px;"></th>
                                        </thead>

                                        <!-- El id del cuerpo de la tabla. -->
                                        <tbody id="content">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label id="lbl-total"></label>
                                </div>

                                <div class="col-6" id="nav-paginacion"></div>

                                <input type="hidden" id="pagina" value="1">
                                <input type="hidden" id="orderCol" value="0">
                                <input type="hidden" id="orderType" value="asc">
                            </div>
                        </div>

                        <script>
                        /* Llamando a la función getData() */
                        getData()

                        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
                        document.getElementById("campo").addEventListener("keyup", function() {
                            getData()
                        }, false)
                        document.getElementById("num_registros").addEventListener("change", function() {
                            getData()
                        }, false)


                        /* Peticion AJAX */
                        function getData() {
                            let input = document.getElementById("campo").value
                            let num_registros = document.getElementById("num_registros").value
                            let content = document.getElementById("content")
                            let pagina = document.getElementById("pagina").value
                            let orderCol = document.getElementById("orderCol").value
                            let orderType = document.getElementById("orderType").value

                            if (pagina == null) {
                                pagina = 1
                            }

                            let url = "load.php"
                            let formaData = new FormData()
                            formaData.append('campo', input)
                            formaData.append('registros', num_registros)
                            formaData.append('pagina', pagina)
                            formaData.append('orderCol', orderCol)
                            formaData.append('orderType', orderType)

                            fetch(url, {
                                    method: "POST",
                                    body: formaData
                                }).then(response => response.json())
                                .then(data => {
                                    content.innerHTML = data.data
                                    document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                                        ' de ' + data.totalRegistros + ' registros'
                                    document.getElementById("nav-paginacion").innerHTML = data.paginacion
                                }).catch(err => console.log(err))
                        }

                        function nextPage(pagina){
                            document.getElementById('pagina').value = pagina
                            getData()
                        }

                        let columns = document.getElementsByClassName("sort")
                        let tamanio = columns.length
                        for(let i = 0; i < tamanio; i++){
                            columns[i].addEventListener("click", ordenar)
                        }

                        function ordenar(e){
                            let elemento = e.target

                            document.getElementById('orderCol').value = elemento.cellIndex

                            if(elemento.classList.contains("asc")){
                                document.getElementById("orderType").value = "asc"
                                elemento.classList.remove("asc")
                                elemento.classList.add("desc")
                            } else {
                                document.getElementById("orderType").value = "desc"
                                elemento.classList.remove("desc")
                                elemento.classList.add("asc")
                            }

                            getData()
                        }

                        </script>

                        <!-- Bootstrap core JS -->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                        <!---->

                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

                    

                    </div>

                    <div class="col-md-8 d-flex mr-5 mb-5">
                        <table class="table table-dark" style="width:200px;height:200px;">
                            <thead class="table-success table-striped table-secondary" >
                                <tr>
                                    <th style="text-align: center;padding: 15px;">Email</th>
                                    <th style="text-align: center;padding: 15px;">Username</th>
                                    <th style="text-align: center;padding: 15px;">Password</th>
                                    <th style="text-align: center;padding: 15px;">Nombre</th>
                                    <th style="text-align: center;padding: 15px;">Apellido</th>
                                    <th style="text-align: center;padding: 15px;">Sexo</th>
                                    <th style="text-align: center;padding: 15px;">Birthday</th>
                                    <th style="text-align: center;padding: 15px;">Pais</th>
                                    <th style="text-align: center;padding: 15px;">Area Interes</th>
                                    <th style="text-align: center;padding: 15px;"></th>
                                    <th style="text-align: center;padding: 15px;"></th>
                                </tr>
                            </thead>

                            <tbody>
                                    <?php
                                        $sql="SELECT * FROM usuarios";
                                        $query=mysqli_query($conexion,$sql);
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <th><?php  echo $row['email']?></th>
                                            <th><?php  echo $row['username']?></th>
                                            <th><?php  echo $row['password']?></th>
                                            <th><?php  echo $row['nombre']?></th>
                                            <th><?php  echo $row['apellido']?></th>   
                                            <th><?php  echo $row['sexo']?></th>   
                                            <th><?php  echo $row['fecha_nacimiento']?></th>   
                                            <th><?php  echo $row['pais']?></th>
                                            <th><?php  echo $row['area_interes']?></th>          
                                            <th><a href="read.php?id=<?php echo $row['username'] ?>" class="btn btn-info">Editar</a></th>
                                            <th><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $row['id'] ?>">Eliminar</a></th>
                                            <!--Notificacion Delete-->
                                            <div class="modal" tabindex="-1" id="DeleteModal<?php echo $row['id'] ?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark">
                                                    <h5 class="modal-title">Confirmacion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-dark">
                                                    <p>Estas seguro que quieres eliminar a <?php echo $row['username'];?>?</p>
                                                    <?php
                                                    $dato=$row['id']-$row['username'];

                                                    list($id, $username) = explode('-', $dato);

                                                    echo $username;
                                                    ?>
                                                    </div>
                                                    <div class="modal-footer bg-dark">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                                    <a href="delete.php?id=<?php echo $row['username'] ?>" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>                                       
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
      </section>

    </main>

    <div>
      <footer class="f-footer">
        <div class="f-container">
          <div class="f-row">
            <div class="f-footer-col">
              <h4>Informacion</h4>
              <ul>
                <li><a href="indexNosotros.html#about-us">Acerca de Nosotros</a></li>
                <li><a href="#">Politica de Privacidad</a></li>
              </ul>
            </div>
            <div class="f-footer-col">
              <h4>Ayuda</h4>
              <ul>
                <li><a href="indexNosotros.html#faq">FAQ</a></li>
                <li><a href="indexNosotros.html#comms-form">Contactanos</a></li>
                <li><a href="indexNosotros.html#testimonios">Testimonios</a></li>
              </ul>
            </div>
            <div class="f-footer-col">
              <h4>Cuenta</h4>
              <ul>
                <li><a href="indexRegistro.html">Registrarse</a></li>
                <li><a href="#">Unirse</a></li>
              </ul>
            </div>
            <div class="f-footer-col">
              <h4>Siguenos</h4>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
     </footer>
    </div>

</body>
</html>

