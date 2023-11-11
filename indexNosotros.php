<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infoware Web</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!--Links para Meet our Team-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!---->
    <!--Links para Seccion de Testimonios-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!---->
    <!--Links para Seccion Contactanos-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!---->
    <!--Links para footer-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!---->
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
                    <a class="nav-link active" href="indexNosotros.php">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexRegistro.php">Registro</a>
                    </li>
                </ul>
                <img src="icono-usuario.png" alt="IconoUsuario" style="margin:5px;">
                <?php if(isset($_SESSION['logged_in_user'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonN" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background:none; border:none;margin-right:20px;">
                            <?php echo $_SESSION['logged_in_user']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonN">
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
        
        <section>
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
        </section>
    </header>

    <main>

        <section class="team">
            <div class="center">
                <h1>Nuestro equipo</h1>
            </div>
    
            <div class="team-content">
                <div class="box">
                    <img src="01.png">
                    <h3>Lucas Rodriguez</h3>
                    <h5>Co-fundador y Web Developer</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="02.png">
                    <h3>Juan Martinez</h3>
                    <h5>Co-fundador y Analista</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="03.png">
                    <h3>Carolina Perez</h3>
                    <h5>Co-fundadora y Editora en Jefe</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="04.png">
                    <h3>Isabella Gomez</h3>
                    <h5>Co-fundadora y Encargada de Redes Sociales</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
    
            </div>
        </section>

        <a name="about-us"></a>

        <section>
            <div class="container text-center">
                <div class="row">
                  <div class="col mr-3 secondary-bg-color rounded-3">
                    <div class="mx-auto mb-5 mt-5">
                        <h2 class="align-items-center p-color">Acerca de Nosotros</h2>
                    </div>
                    <div class="mx-auto mt-3">
                        <p class="h-color">
                            En nuestro corazón late una profunda pasión por la informatica y el hardware. Somos una comunidad dedicada a compartir nuestro entusiasmo y conocimiento sobre la tecnología. Nuestra misión es brindarte una experiencia enriquecedora, donde puedas acceder a información valiosa, consejos expertos y noticias actualizadas que te mantendrán al tanto de los avances más recientes en el fascinante mundo de la tecnología.
                        </p>
                    </div>
                  </div>
                  <div class="col ml-3">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <p class="h-color">Mision</p>
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="p-color"><strong>Proporcionar información actualizada y confiable</strong> sobre tecnología, simplificando conceptos y manteniendo a nuestros lectores al tanto de las últimas tendencias y avances tecnológicos.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <p class="h-color">Vision</p>
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="p-color"><strong>Convertirnos en la principal fuente de conocimiento tecnológico</strong> , inspirando la innovación y la exploración en un mundo digital en constante evolución.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <p class="h-color">Valores</p>
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="p-color"><strong>Guiados por la excelencia, la imparcialidad y la pasión por la tecnología</strong> , estamos comprometidos a crear una comunidad en la que la información sea accesible para todos, ayudando a las personas a navegar con éxito en el mundo tecnológico y fomentando la creatividad en la era digital.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </section>

        <a name="testimonios"></a>
        <section class="section-margin">
            <div class="container-testimonios mb-5">
                <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleSlidesOnly">
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Isabela González</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Como entusiasta de la tecnología, siempre estoy buscando las últimas noticias y tendencias. Esta página web ha sido una fuente invaluable de información para mí. Los artículos son siempre actuales, bien investigados y fáciles de entender.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Horacio Pérez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Soy un profesional de TI y necesito mantenerme al día con los avances tecnológicos. Esta página web ha sido una gran ayuda para mí. La calidad de los contenidos es excelente y siempre encuentro lo que necesito.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Maria Lopez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Como profesora, necesito encontrar formas efectivas de incorporar la tecnología en mi enseñanza. Esta página web ha sido una gran fuente de ideas e inspiración. Los consejos y trucos que he aprendido aquí han sido invaluables.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Graciela Fernández</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Esta página web es mi fuente de confianza para todas las cosas relacionadas con la tecnología. Siempre encuentro lo que necesito y más. ¡Es imprescindible para cualquier amante de la tecnología!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Fabián Rodríguez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Como estudiante de ingeniería, esta página web ha sido una herramienta invaluable para mis estudios. Los contenidos son claros, concisos y siempre al día con las últimas tendencias tecnológicas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Estela Martínez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Esta página web ha transformado la forma en que me mantengo informado sobre la tecnología. Los artículos son informativos y fáciles de entender, incluso para alguien que no es un experto en tecnología como yo.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Damián Gómez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Como empresaria, necesito mantenerme al día con los últimos avances tecnológicos. Esta página web ha sido una gran ayuda para mantenerme informada y tomar decisiones informadas para mi negocio.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Clarisa Torres</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Soy un desarrollador de software y esta página web ha sido una gran fuente de información para mantenerme al día con las últimas tendencias y tecnologías en mi campo.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="t-card">
                                        <div class="box front">
                                            <img alt="" src="anon-testimony.webp">
                                            <h2>Benito Juárez</h2>
                                            <h4>Usuario</h4>
                                            <p class="socials">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-youtube"></i>
                                            </p>
                                        </div>
                                        <div class="box back">
                                            <span class="fa fa-quote-left"></span>
                                            <p style="margin-top:60px;">
                                            Como madre, siempre estoy buscando formas de ayudar a mis hijos a aprender y crecer con la tecnología. Esta página web ha sido una gran fuente de ideas y recursos para hacer precisamente eso.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>			
        
        
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
            </script> 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js">
            </script> 
            <script>
            </script>
        </section>

        <a name="faq"></a>
        <!--Section: FAQ-->
        <section class="mx-5 my-5">
            <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
            <p class="text-center mb-5">
            Las preguntas mas frecuentes hechas por los usuarios
            </p>
        
            <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i> Ofrecen eventos o Webinarios sobre tecnologia?</h6>
                <p>
                <strong><u>Sí</u></strong> , organizamos eventos y webinarios relacionados con tecnología en los que expertos comparten sus conocimientos sobre temas actuales y tendencias tecnológicas. Puedes consultar nuestro calendario de eventos para obtener más información.
                </p>
            </div>
        
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> ¿Ofrecen tutoriales o guías para resolver problemas comunes de tecnología?</h6>
                <p>
                <strong><u>Claro</u></strong> , proporcionamos una sección de tutoriales y guías donde puedes encontrar soluciones a problemas comunes de tecnología, consejos de resolución de problemas y trucos útiles para dispositivos y software populares.
                </p>
            </div>
        
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> ¿Tienen una aplicación móvil para acceder a su contenido?
                </h6>
                <p>
                    Sí, ofrecemos una aplicación móvil que te permite acceder a nuestro contenido de manera conveniente desde tu dispositivo móvil. Puedes descargar la aplicación desde la tienda de aplicaciones de tu dispositivo.
                </p>
            </div>
        
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> ¿Cómo puedo contribuir con contenido o colaborar con su sitio web?
                </h6>
                <p>
                    Apreciamos las contribuciones de escritores y colaboradores. Si estás interesado en compartir tus conocimientos y perspectivas sobre tecnología, ponte en contacto con nuestro equipo editorial para obtener más detalles sobre cómo puedes contribuir.
                </p>
            </div>
        
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> ¿Qué áreas de tecnología cubre su sitio web?
                </h6>
                <p><strong><u>Nuestro sitio web cubre una amplia gama de áreas tecnológicas</u>.</strong>  , incluyendo pero no limitándose a la informática, electrónica de consumo, inteligencia artificial, internet de las cosas (IoT), ciberseguridad, dispositivos móviles, software, hardware, y mucho más.</p>
            </div>
        
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> ¿Ofrecen tutoriales en video?</h6>
                <p>
                    Sí, proporcionamos tutoriales en video sobre una variedad de temas tecnológicos. Puedes encontrar estos videos en nuestra sección de tutoriales o en nuestro canal de YouTube.
                </p>
            </div>
            </div>
        </section>
        <!--Section: FAQ-->

        <!--
        <section>
            <div class="section">
                <div id="aboutus-text">
                    <h2>Acerca de Nosotros</h2>
                    <p>En nuestro corazón late una profunda pasión por la <b>informatica</b> y el <b>hardware</b>. Somos una <span class="highlight-p">comunidad</span> dedicada a compartir nuestro entusiasmo y conocimiento sobre la tecnología. Nuestra misión es brindarte una experiencia enriquecedora, donde puedas acceder a <b>información valiosa</b>, <b>consejos expertos</b> y <b>noticias actualizadas</b> que te mantendrán al tanto de los avances más recientes en el fascinante mundo de la tecnología.

                        Desde los componentes más avanzados hasta las guías detalladas de construcción de PCs, estamos aquí para ayudarte a comprender y aprovechar al máximo las posibilidades que ofrece este emocionante campo. <span class="highlight-p">Nuestro compromiso</span> es empoderarte, para que te sientas confiado y capacitado en tus elecciones tecnológicas.
                        
                        Te invitamos a unirte a nuestra comunidad, donde no solo estarás informado, sino que también tendrás la oportunidad de conectarte con personas que <span class="highlight-p">comparten tu misma pasión</span>. Juntos, exploraremos las últimas tendencias, desafíos y descubrimientos en el mundo de la informática y el hardware. Descubre con nosotros un viaje emocionante en el que la tecnología se convierte en un aliado fundamental para tu vida y tu creatividad. <b>¡Bienvenido a nuestro apasionante</b> <span class="highlight-p">universo tecnológico!</span>
                    </p>
                </div>
                <div id="aboutus-column">
                    <div class="aboutus-column-type">
                        <img src="aboutus-img-1.webp" alt="Imagen Acerca de Nosotros 1" class="aboutus-img">
                        <p>Sumérgete en la comunidad tecnológica. Información actualizada y consejos expertos.</p>
                    </div>
                    <div class="aboutus-column-type">
                        <img src="aboutus-img-2.jpg" alt="Imagen Acerca de Nosotros 2" class="aboutus-img">
                        <p>Explora el mundo tecnológico con nosotros. Noticias y guías útiles.</p>
                    </div>
                </div>
            </div>
        </section>

        <a name="Devs"></a>
        <section>
            <div class="section">
                <div class="worker-container">
                    <h3>Lucas Rodriguez</h3>
                    <img src="img-worker-1.jpg" alt="Lucas Rodriguez" class="worker-img">
                    <p> Es el Co-Fundador y Director Ejecutivo de nuestra página web. Lucas lidera nuestro equipo con una visión estratégica y la habilidad de convertir ideas en realidad.</p>
                </div>
                <div class="worker-container">
                    <h3>Carolina Perez</h3>
                    <img src="img-worker-2.jpg" alt="Carolina Perez" class="worker-img">
                    <p>Es nuestra Co-Fundadora y Editora en Jefe. Combina su experiencia en comunicación y tecnología para asegurarse de que cada artículo y contenido que ofrecemos sea informativo y accesible.</p>
                </div>
                <div class="worker-container">
                    <h3>Juan Martinez</h3>
                    <img src="img-worker-3.jpeg" alt="Juan Martinez" class="worker-img">
                    <p>Se desempeña como Co-Fundador y Director Técnico de la página web. Juan trabaja incansablemente para resolver problemas técnicos y mantener la seguridad de nuestra plataforma.</p>
                </div>
                <div class="worker-container">
                    <h3>Isabella Gomez</h3>
                    <img src="img-worker-4.png" alt="Isabella Gomez" class="worker-img">
                    <p>Es nuestra Co-Fundadora y Responsable de Contenido. Con su formación en pedagogía, Isabella se encarga de que nuestros contenidos sean educativos y atractivos.</p>
                </div>
            </div>
        </section>
        
        <section>
            <div class="section">
                <div class="info-text">
                    <p>La principal meta de nuestra página web de informática es proporcionar una fuente confiable y accesible de información tecnológica para usuarios de todos los niveles de experiencia. Nos esforzamos por mantener a nuestra audiencia al tanto de las últimas tendencias, avances y noticias en el campo de la informática. Nuestra página sirve como un recurso integral donde los entusiastas de la tecnología, desde principiantes hasta expertos, pueden encontrar análisis detallados de hardware, guías paso a paso sobre software, consejos útiles para solucionar problemas y noticias actualizadas sobre el mundo tecnológico.</p>
                </div>
                <div class="info-text">
                    <p>Además de ser una fuente de información tecnológica, nuestra página web tiene un fuerte compromiso con la comunidad tecnológica. Fomentamos la interacción entre nuestros usuarios, permitiendo que compartan sus conocimientos, experiencias y preguntas en nuestros foros y secciones de comentarios. Creemos que el aprendizaje colaborativo es esencial en el campo de la informática, por lo que brindamos un espacio donde los miembros pueden conectarse, colaborar en proyectos, resolver problemas y crecer juntos. Nuestra comunidad es inclusiva y acoge a personas de todas las edades y niveles de experiencia, desde estudiantes curiosos hasta profesionales de la tecnología.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="section">
                <div class="galery-container">
                    <img src="galery-img-1.webp" alt="Imagen Informatica 1" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-2.webp" alt="Imagen Informatica 2" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-3.webp" alt="Imagen Informatica 3" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-4.webp" alt="Imagen Informatica 4" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-5.webp" alt="Imagen Informatica 5" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-6.jpg" alt="Imagen Informatica 6" class="galery-img">
                </div>
                <div class="galery-container">
                    <img src="galery-img-7.jpg" alt="Imagen Informatica 7" class="galery-img">
                </div>
            </div>
        </section>
        -->

        <a name="comms-form"></a>
        <section>
            <div class="form-area">
                <div class="container">
                    <div class="row single-form g-0">
                        <div class="col-sm-12 col-lg-6">
                            <div class="left">
                                <h2><span>Contactanos</span> <br>Tu opinion nos ayuda a mejorar</h2>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="right">
                               <i class="fa fa-caret-left"></i>
                                <form>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Message</label>
                                      <textarea type="password" class="form-control" id="exampleInputPassword1"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
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