<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
     <?php 
    //Inicia sesion
    session_start();
    //Valida si un tipo de usuario inicio la sesion
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){ //Sesion como medico
            ?>
     <!--banner-->
              <section id="banner2" class="banner">
                <div class="bg-color2">
                  <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                      <div class="col-md-12">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                          <ul class="nav navbar-nav">
                            <li class=""><a href="index.php">Inicio</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cita</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_cita.php">Crear cita</a>
                                  <a class="dropdown-item btn" href="ver_cita.php">Ver citas activas</a>
                                  <a class="dropdown-item btn" href="historial_cita.php">Ver historial de citas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medico</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_medicos.php">Crear medico</a>
                                  <a class="dropdown-item btn" href="ver_medico.php">Ver medicos</a>
                                  <a class="dropdown-item btn" href="ver_medico_inactivo.php">Ver medicos inactivos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuario</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_usuario.php">Crear usuario</a>
                                  <a class="dropdown-item btn" href="ver_usuario.php">Ver usuarios</a>
                                  <a class="dropdown-item btn" href="ver_usuario_inactivo.php">Ver usuarios inactivos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="reportes.php">Generar reportes</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Backup</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="Controlador\backup.php">Crear backup</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']?></a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="Controlador\cerrar_sesion.php">Cerrar sesion</a>
                                </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </nav>
                </div>
              </section>
              <!--/ banner-->
            <!--banner-->
            <section id="banner" class="banner">
              <div class="bg-color">      
                <div class="container">
                  <div class="row">
                    <div class="banner-info">
                      <div class="banner-logo text-center">
                        <img src="img/logo.png" class="img-responsive">
                      </div>
                      <div class="banner-text text-center">
                        <h1 class="white">¿Ya reservaste la cita a tu paciente?</h1>
                        <p>Bienvenido a la Cl&iacute;nica Cotecnova online, aqu&iacute; te atenderemos lo m&aacute;s r&aacute;pido posible para cumplir con tus necesidades.</p>
                        <a href="crear_cita.php" class="btn btn-appoint">Crear cita</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!--/ banner-->
            <?php
        }else if($_SESSION['tipousuario'] == 2){ //Sesion como usuario
            ?>
             <!--banner-->
            <section id="banner" class="banner">
              <div class="bg-color">
                <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <div class="col-md-12">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                      </div>
                      <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="index.php">Inicio</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cita</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="ver_cita.php">Ver citas activas</a>
                                  <a class="dropdown-item btn" href="historial_cita.php">Ver historial de citas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']?></a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="Controlador\cerrar_sesion.php">Cerrar sesion</a>
                                </div>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </nav>
                <div class="container">
                  <div class="row">
                    <div class="banner-info">
                      <div class="banner-logo text-center">
                        <img src="img/logo.png" class="img-responsive">
                      </div>
                      <div class="banner-text text-center">
                        <h1 class="white">No olvides siempre revisar tus citas</h1>
                        <p>Mantente informad@ en la pestaña citas</p>
                        <a href="ver_cita.php" class="btn btn-appoint">Ir a revisar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!--/ banner-->
            <?php
        }
    }else{
        ?>
                <!--banner-->
        <section id="banner2" class="banner">
          <div class="bg-color2">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="col-md-12">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                  </div>
                  <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li class=""><a href="index.php">Inicio</a></li>
                      <li class=""><a href="servicios.php">Servicios</a></li>
                      <li class=""><a href="about.php">Acerca de nosotros</a></li>
                      <li class=""><a href="login.php">Iniciar sesi&oacute;n</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </section>
        <!--/ banner-->
         <!--banner-->
            <section id="banner" class="banner">
              <div class="bg-color">      
                <div class="container">
                  <div class="row">
                    <div class="banner-info">
                      <div class="banner-logo text-center">
                        <img src="img/logo.png" class="img-responsive">
                      </div>
                      <div class="banner-text text-center">
                        <h1 class="white">¿Ya reservaste tu cita?</h1>
                        <p>Bienvenido a la Cl&iacute;nica Cotecnova online, aqu&iacute; te atenderemos lo m&aacute;s r&aacute;pido posible para cumplir con tus necesidades.</p>
                        <a href="login.php" class="btn btn-appoint">Reservar mi cita</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!--/ banner-->       
        <?php
    }
        ?>
  <!-- Llamado de los respectivos scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
</body>
</html>
