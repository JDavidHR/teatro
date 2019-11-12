<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Eliminar usuario</title>
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
  <div id="container">
    <?php
    session_start();
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){ //Sesion como medico
            include("header_index.php");
    ?>
  <?php
  //Trae el id del usuario
    $id = $_GET['id'];
    //llamado al archivo MySQL
    require_once 'Modelo/MySQL.php';
    //nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    //consulta de toda la informacion
    $seleccionInformacion = $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.numero_documento, clinica_cotecnova.usuarios.nombre_completo from usuarios where id_usuario = ".$id.""); 
    //funcion desconectar
    $mysql->desconectar();    
    while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
        $numeroDocumento = $resultado['numero_documento'];
        $nombre_completo = $resultado['nombre_completo'];
    }
    ?>
  </div>  
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Bienvenido</h2>
          <hr class="botm-line">
          <p>Bienvenid@ al formulario de borrar, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" action="Controlador/eliminarUsuario.php?id=<?php echo $id;?>">
                    <div class="form-group">
                  <label class="col-sm-12">¿Esta seguro de eliminar el usuario?</label>
                  <div class="col-md-12">
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                        <input type="text" disabled="" value="<?php echo $nombre_completo?>" class="form-control form-control-line">
                        
                    </div>
                  </div>         
                 <div class="form-group">
                  <label class="col-sm-12">Numero de documento del usuario</label>            
                  <div class="col-md-12">
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                        <input type="text" disabled=" "value="<?php echo $numeroDocumento?>" class="form-control form-control-line">
                    </div>
                </div>    
                <div class="form-group">
                  <div class="col-sm-2 col-md-2">
                    <button class="btn btn-success" >Eliminar</button>
                  </div>
                  <div class="col-sm-10 col-md-4">
                      <a href="ver_usuario.php" class="btn btn-danger">Cancelar</a>
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
  <!--footer-->
  <div id="footer">
  <?php
  include("footer.php");
  ?>
  </div>
  <!--/ footer-->
    <?php
        }else{
            header( "refresh:0;url=index.php" );   
        }
    }else{
        header( "refresh:0;url=login.php" );    
    }
   ?>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
