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
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <?php 
    //Valida si un tipo de usuario inicio la sesion
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){ //Sesion como medico
            ?>
                <!--banner-->
              <section id="banner2" class="banner">
                <div class="">
                  <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                      <div class="col-md-12">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                          <ul class="nav navbar-nav">
                            <li class=""><a href="index.php">Inicio</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Obras</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_obra.php">Ingresar nueva obra</a>
                                  <a class="dropdown-item btn" href="ver_obra.php">Ver obras</a>
                                  <a class="dropdown-item btn" href="ver_obra_inactivo.php">Ver obras inactivas</a>
                                  <a class="dropdown-item btn" href="asignar_personaje.php">Asignar personajes</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Personajes</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_personaje.php">Ingresar un personaje</a>
                                  <a class="dropdown-item btn" href="ver_personaje.php">Ver personajes</a>
                                  <a class="dropdown-item btn" href="ver_personaje_inactivo.php">Ver personajes inactivos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actores</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_actor.php">Ingresar un actor</a>
                                  <a class="dropdown-item btn" href="ver_actor.php">Ver actores</a>
                                  <a class="dropdown-item btn" href="ver_actor_inactivo.php">Ver actores inactivos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reemplazos</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_reemplazo.php">Ingresar un reemplazo</a>
                                  <a class="dropdown-item btn" href="ver_reemplazo.php">Ver reemplazos</a>
                                  <a class="dropdown-item btn" href="ver_reemplazo_inactivo.php">Ver reemplazos inactivos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Funciones</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="ver_funcion.php">Ver Funciones</a>
                                  <a class="dropdown-item btn" href="historial_funciones.php">Historial de Funciones</a>
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
      <?php
        } 
      ?>
  <?php         
    }else{
  ?>
      <!--banner-->
      <section id="banner2" class="banner">
        <div class="">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="col-md-12">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                  <ul class="nav navbar-nav">
                    <li class=""><a href="index.php">Inicio</a></li>
                    <li class=""><a href="servicios.php">Servicios</a></li>
                    <li class=""><a href="funciones.php">Funciones</a></li>
                    <li class=""><a href="comprar.php">Comprar tickets</a></li>
                    <li class=""><a href="login_teatro.php">Iniciar sesi&oacute;n</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
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
