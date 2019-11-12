<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <!--  -->
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
   //Valida si un tipo de usuario inicio la sesion
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){ //Sesion como medico
            ?>
     <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle" align="center">
              <h4 class="white no-padding">Acerca de nosotros</h4>
            </div>
            <div class="info-sec">
              <p>Praesent convallis tortor et enim laoreet, vel consectetur purus latoque penatibus et dis parturient.</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle"  align="center">
              <h4 class="white no-padding">Gu&iacute;a r&aacute;pida</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.php"><i class="fa fa-circle"></i>Inicio</a></li>
                <li><a href="servicios.php"><i class="fa fa-circle"></i>Servicios</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Cl&iacute;nica Cotecnova. Todos los derechos reservados.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->
            <?php
        }else if($_SESSION['tipousuario'] == 2){ //Sesion como usuario
            ?>            
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle" align="center">
              <h4 class="white no-padding">Servicio Online</h4>
            </div>
            <div class="info-sec">
              <p>¡Conoce acerca de todos los servicios a los cuales puedes acceder y se beneficiado!</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle"  align="center">
              <h4 class="white no-padding">Gu&iacute;a r&aacute;pida</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.php"><i class="fa fa-circle"></i>Inicio</a></li>
                <li><a href="ver_citaU.php"><i class="fa fa-circle"></i>Citas</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Cl&iacute;nica Cotecnova. Todos los derechos reservados.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->
            <?php
        }
    }else{
        ?>
        <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle" align="center">
              <h4 class="white no-padding">Servicio Online</h4>
            </div>
            <div class="info-sec">
              <p>¡Conoce acerca de todos los servicios a los cuales puedes acceder y se beneficiado!</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle"  align="center">
              <h4 class="white no-padding">Gu&iacute;a r&aacute;pida</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.php"><i class="fa fa-circle"></i>Inicio</a></li>
                <li><a href="servicios.php"><i class="fa fa-circle"></i>Servicios</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Cl&iacute;nica Cotecnova. Todos los derechos reservados.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->
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
