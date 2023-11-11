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

    if (isset($_SESSION['deleted_user'])) {
        $deleted_user = $_SESSION['deleted_user'];

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
            'El usuario ' . $deleted_user . ' ha sido eliminado.' .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
            '</div>';

        unset($_SESSION['deleted_user']);
    }
    if (isset($_SESSION['created_user'])) {
      $created_user = $_SESSION['created_user'];

      // Alerta Nombre de Usuario
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
          'El usuario ' . $created_user . ' ha sido ingresado.' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
          '</div>';

      unset($_SESSION['created_user']);
    }
    if (isset($_SESSION['updated_user'])) {
      $updated_user = $_SESSION['updated_user'];

      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">' .
          'El usuario ' . $updated_user . ' ha sido actualizado.' .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
          '</div>';

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

                            <form action="passwordRecovery.php" method="POST" autocomplete="off">
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
        <form action="passwordRecovery.php" method="POST" autocomplete="off">
          <input type="hidden" name="url_origen" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">
          <input type="hidden" class="form-control mb-3" name="id" placeholder="ID">
          <div class="container m-5 w-75 mx-auto">
              
              <div class="row mb-3">
                  <div class="col">
                    <input type="email" class="form-control w-75 mx-auto" name="Email" placeholder="Email de la cuenta" aria-label="Email" id="Email" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control w-75 mx-auto" name="Username" placeholder="Username de la cuenta" aria-label="Username" required>
                  </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                    <input type="password" class="form-control w-75 mx-auto" name="Password" placeholder="Nueva Contrasenia" required>
                </div>
              </div>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-primary">Recuperar contrasenia</button>
              </div>
          </div>
        </form>
      </section>

    </main>

    <div>
     <footer class="f-footer">
        <div class="f-container">
          <div class="f-row">
            <div class="f-footer-col">
              <h4>Informacion</h4>
              <ul>
                <li><a href="indexNosotros.php#about-us">Acerca de Nosotros</a></li>
                <!--<li><a href="#">Politica de Privacidad</a></li>-->
              </ul>
            </div>
            <div class="f-footer-col">
              <h4>Ayuda</h4>
              <ul>
                <li><a href="indexNosotros.php#faq">FAQ</a></li>
                <li><a href="indexNosotros.php#comms-form">Contactanos</a></li>
                <li><a href="indexNosotros.php#testimonios">Testimonios</a></li>
              </ul>
            </div>
            <div class="f-footer-col">
              <h4>Cuenta</h4>
              <ul>
                <li><a href="indexRegistro.php">Registrarse</a></li>
                <li><a href="#" data-toggle="modal" data-bs-target="#staticBackdropLogin">Unirse</a></li>
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

