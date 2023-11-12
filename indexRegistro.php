<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infoware Web</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <!--Links para footer-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!---->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <?php
    // Iniciar la sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
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
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="indexInicio.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="indexNosotros.php">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="indexRegistro.php">Registro</a>
                    </li>
                </ul>
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
                                    <p>Olvido la contrasenia? <a href="indexPasswordRecovery.php">Recuperar Contrasenia</a></p>
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

        <div id="carouselExampleCaptions" class="carousel slide mx-5">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner mx">
              <div class="carousel-item active">
                <img src="carrusel-redes.png" class="d-block w-100" alt="..." height="400px">
                <div class="carousel-caption d-none d-md-block">
                    <div class="p-3 border border-dark rounded-3 secondary-bg-color">
                        <h5>Conoce nuestras redes sociales</h5>
                        <p class="p-color">Te invitamos a conocer las redes sociales de nuestra pagina!</p>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <a href="indexRegistro.php">
                  <img src="carrusel-registration.jpg" class="d-block w-100" alt="..." height="400px">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <div class="p-3 border border-dark rounded-3 secondary-bg-color">
                        <h5>Registrate</h5>
                        <p class="p-color">Si quieres unirte a esta enorme comunidad, te invitamos a registrarte en nuestra Web.</p>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <a href="indexNosotros.php#comms-form">
                  <img src="carrusel-com.jpg" class="d-block w-100" alt="..." height="400px">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <div class="p-3 border border-dark rounded-3 secondary-bg-color">
                        <h5>Comunicate con nosotros</h5>
                        <p class="p-color">Tenemos un canal de comunicacion para poder consultar cualquier cosa.</p>
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
                  <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
          </div>
        </form>

    </main>

    <div>
     <footer class="f-footer">
        <div class="f-container">
          <div class="f-row">
            <div class="f-footer-col">
              <h4>Informacion</h4>
              <ul>
                <li><a href="indexNosotros.php#about-us">Acerca de Nosotros</a></li>
                <li><a data-bs-toggle="modal" data-bs-target="#staticBackdropPrivacyPol" class=" text-nowrap" style="margin-right:30px;" >Terminos y Politica</a></li>
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
     <!-- Modal -->
     <div class="modal fade" id="staticBackdropPrivacyPol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header bg-dark">
              <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Política de Privacidad</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-light bg-dark">
                  
                  Última actualización: 11-11-2023<br>
                  
                  <br>Gracias por visitar Infoware ("nosotros", "nuestra", "nuestro", "el sitio web"). En Infoware, valoramos y respetamos su privacidad. Esta Política de Privacidad describe cómo recopilamos, utilizamos y compartimos su información personal cuando visita nuestro sitio web. Al utilizar nuestro sitio web, usted acepta las prácticas descritas en esta política.
                  
                  <br>Información que Recopilamos<br>
                  <br>Información Personal<br>
                  <br>Podemos recopilar información personal que usted nos proporciona voluntariamente, como su nombre, dirección de correo electrónico, número de teléfono y otros datos similares cuando:<br>
                  
                  Se registra en nuestro sitio web.<br>
                  Rellena formularios en nuestro sitio web.<br>
                  Participa en encuestas, concursos o promociones en nuestro sitio web.<br>
                  Se comunica con nosotros a través de correo electrónico u otros canales de comunicación.<br>
                  <br>Información de Uso<br>
                  <br>También recopilamos información automáticamente sobre su visita a nuestro sitio web, como su dirección IP, navegador web, sistema operativo, páginas vistas, tiempo de visita y otros datos de uso similar. Utilizamos esta información para mejorar la experiencia del usuario en nuestro sitio web y para analizar tendencias de uso.
                  
                  <br>Uso de la Información<br>
                  <br>Utilizamos la información personal que recopilamos para los siguientes fines:<br>
                  
                  Proporcionar y mantener nuestro sitio web.<br>
                  Personalizar su experiencia en nuestro sitio web.<br>
                  Comunicarnos con usted, responder a sus preguntas y proporcionarle información relevante.<br>
                  Enviarle boletines informativos y promociones, si ha dado su consentimiento.<br>
                  Cumplir con obligaciones legales y regulaciones aplicables.<br>
                  <br>Compartir la Información<br>
                  <br>No vendemos ni alquilamos su información personal a terceros. Sin embargo, podemos compartir su información personal con terceros en las siguientes circunstancias:<br>
                  
                  Con su consentimiento.<br>
                  <br>Para cumplir con obligaciones legales y regulaciones aplicables.<br>
                  Con proveedores de servicios que nos ayudan a operar nuestro sitio web y prestar servicios relacionados.<br>
                  En caso de fusión, adquisición o venta de todos o parte de nuestros activos, su información personal podría ser transferida a la entidad adquirente.<br>
                  <br>Cookies y Tecnologías Similares<br>
                  <br>Utilizamos cookies y tecnologías similares para recopilar información de uso y mejorar su experiencia en nuestro sitio web. Puede gestionar las preferencias de cookies a través de la configuración de su navegador.<br>
                  
                  <br>Enlaces a Terceros<br>
                  <br>Nuestro sitio web puede contener enlaces a sitios web de terceros. No somos responsables de las prácticas de privacidad de estos sitios web. Le recomendamos revisar las políticas de privacidad de los sitios web de terceros que visite.<br>
                  
                  <br>Sus Derechos de Privacidad<br>
                  <br>Usted tiene derechos sobre su información personal, incluido el derecho a acceder, rectificar, eliminar y oponerse al procesamiento de sus datos personales. Puede ejercer estos derechos contactándonos a través de la información de contacto proporcionada a continuación.<br>
                  
                  <br>Cambios en esta Política<br>
                  <br>Podemos actualizar esta Política de Privacidad periódicamente para reflejar cambios en nuestras prácticas de privacidad. La fecha de la última actualización se indica al principio de la política. Le recomendamos que revise esta política periódicamente para estar informado sobre cómo protegemos su información.<br>
                  
                  <br>Póngase en Contacto con Nosotros<br>
                  <br>Si tiene alguna pregunta o inquietud sobre esta Política de Privacidad, comuníquese con nosotros a través de [dirección de correo electrónico de contacto].
                  
                  <br>Recuerda personalizar esta política de privacidad según las necesidades y características específicas de tu sitio web. Además, asegúrate de cumplir con todas las leyes y regulaciones de privacidad aplicables en tu jurisdicción. Esta política de privacidad genérica es solo un punto de partida y no constituye asesoramiento legal.
              </div>
              <div class="modal-footer text-light bg-dark">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
          </div>
      </div>
      </div>
    </div>

</body>
</html>