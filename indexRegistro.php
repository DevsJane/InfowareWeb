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
                    <a class="nav-link active" aria-current="page" href="indexInicio.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="indexNosotros.html">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexRegistro.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdropLogin" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            Iniciar Sesion
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdropLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Iniciar Sesion</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-light bg-dark">

                                    <form>
                                        <div class="row mb-3">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                          <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3">
                                          </div>
                                        </div>
                                        <div class="row mb-3">
                                          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                          <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3">
                                          </div>
                                        </div>
                                    </form>
                                    <div class="container mx-auto">
                                        <p>No tiene cuenta? <a href="indexRegistro.html">Registrarse</a></p>
                                    </div>
                                </div>
                                <div class="mx-auto mb-3 text-light bg-dark">
                                    <a href="indexInicio.html"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Iniciar</button></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>  
                    </li>
                </ul>
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


        <form action="insertar.php" method="POST">
          <input type="hidden" name="url_origen" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">
          <input type="hidden" class="form-control mb-3" name="id" placeholder="ID">
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
                    <input type="email" class="form-control w-75 mx-auto" name="Email" placeholder="Email" aria-label="Email" id="Email">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control w-75 mx-auto" name="Username" placeholder="Username" aria-label="Username">
                  </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                    <input type="password" class="form-control w-75 mx-auto" name="Password" placeholder="Contrasenia">
                </div>
                <div class="col">
                    <input type="password" class="form-control w-75 mx-auto" name="Re-Password" placeholder="Confirmar Contrasenia">
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
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col">
                      <input type="date" class="form-control w-75 mx-auto" name="Birthday" placeholder="Fecha de Cumpleanios">
                  </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <input type="text" class="form-control w-75 mx-auto" name="Pais" placeholder="Pais">
                </div>
                <div class="col">
                  <select class="form-select w-75 mx-auto" name="Area" aria-label="Default select example">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
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