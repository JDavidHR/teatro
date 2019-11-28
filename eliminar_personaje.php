<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Eliminar personaje</title>
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
    </div>  
    <?php
            //trae id de la obra 
            $id = $_GET['id'];
            //llamado al archivo MySQL
            require_once 'Modelo/MySQL.php';
            //nueva "consulta"
            $mysql = new MySQL;
            //funcion conectar
            $mysql->conectar();
            //consulta de toda la informacion
            $seleccionInformacion = $mysql->efectuarConsulta("select teatro.personajes.id as id_personaje, teatro.personajes.nombre from personajes where id = ".$id."");
            //funcion desconectar
            $mysql->desconectar();    
            while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
                $idPersonaje = $resultado['id_personaje'];
                $nombre = $resultado['nombre'];
            }  
    ?>
    <!--service-->
    <section id="service" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <h2 class="ser-title">Bienvenido</h2>
            <hr class="botm-line">
            <p>Bienvenid@ al formulario de borrar.</p>
            <p>Todos los datos pedidos ser&aacute;n de uso aplicativo.</p>
          </div>
          <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              <form class="form-horizontal form-material" method="post" action="Controlador/eliminarPersonaje.php?id=<?php echo $id;?>">
                  <div class="form-group">
                    <label class="col-sm-12">Id del personaje</label>
                    <div class="col-md-12">
                      <!-- Se traen los datos y se imprimen en las opciones del select -->
                      <input type="text" disabled="" value="<?php echo $idPersonaje?>" class="form-control form-control-line">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-12">Nombre del personaje</label>            
                    <div class="col-md-12">
                      <!-- Se traen los datos y se imprimen en las opciones del select -->
                      <input type="text" disabled=" "value="<?php echo $nombre?>" class="form-control form-control-line">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-12">¿Esta seguro de eliminar este personaje?</label>
                    <br>
                    <br>
                    <div class="col-sm-2 col-md-2">
                      <button class="btn btn-success" >Eliminar</button>
                    </div>
                    <div class="col-sm-10 col-md-4">
                        <a href="ver_personaje.php" class="btn btn-danger">Cancelar</a>
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
