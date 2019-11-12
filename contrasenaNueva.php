<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - formulario de correo</title>
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
  <!--banner-->
  <div id="container">
    <?php
    session_start();
    if(isset($_SESSION['tipousuario'])){
        header( "refresh:0;url=index.php" );    
    }else{
        $id = $_GET['id'];
        $tipo_usuario = $_GET['tipo_usuario'];
        //llamado al archivo MySQL
        require_once 'Modelo/MySQL.php';
        //nueva "consulta"
        $mysql = new MySQL;
        //funcion conectar
        $mysql->conectar();    
         //respectivas variables donde se llama la función consultar, se incluye la respectiva consulta
        $seleccionUsuario = $mysql->efectuarConsulta("select clinica_cotecnova.tipo_usuario.id_tipo_usuario, clinica_cotecnova.tipo_usuario.nombre from tipo_usuario"); 
        //funcion desconectar
        $mysql->desconectar();   
        ?>
       <div id="container">
        <?php
            include("header_index.php");
        ?>
        </div> 
            <!--service-->
        <section id="service" class="section-padding">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <h2 class="ser-title">Bienvenido</h2>
                <hr class="botm-line">
                <p>Bienvenid@ al formulario de recuperacion de contraseña, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
                <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="card">
                  <!-- Tab panes -->
                  <div class="card-body">
                      <form class="form-horizontal form-material" method="Post" action="Controlador/contrasenaNueva.php?id=<?php echo $id;?>&tipo_usuario=<?php echo $tipo_usuario?>">    
                       <div class="form-group">                  
                        <label class="col-md-12">Contraseña nueva</label>
                        <div class="col-md-12">
                            <input type="password" class="form-control form-control-line" name="contrasenaNueva" placeholder="Ingrese su nueva contraseña">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <button class="btn btn-success" name="enviar">Enviar Datos</button>
                        </div>
                        <div class="col-sm-9 col-md-4">
                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ service-->
        <div id="footer">
    <?php
        include("footer.php");
    ?>
    </div>
    <?php
        }
    ?>
    <!--/ footer-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <script src="js/listasDependientes.js"></script>
</body>
</html>
