<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Editar actor</title>
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
      if($_SESSION['tipousuario'] == 1){ //Sesion como medico
          include("header_index.php");
  ?>
  <?php
    $id = $_GET['id'];
    //llamado al archivo MySQL
    require_once 'Modelo/MySQL.php';
    //nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    //consulta de toda la informacion
    $seleccionInformacion = $mysql->efectuarConsulta("SELECT teatro.actores.id as id_actor, teatro.actores.cedula as cedula, teatro.actores.nombre as nombre, teatro.actores.fecha_nacimiento as fecha, teatro.genero.id as id_genero, teatro.genero.nombre as genero, teatro.tipo_papel.id as id_papel, teatro.tipo_papel.nombre as papel from teatro.actores join teatro.genero on teatro.genero.id = teatro.actores.Genero_id join teatro.tipo_papel on teatro.tipo_papel.id = teatro.actores.Tipo_papel_id where teatro.actores.id =  ".$id."");

    while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
      $cedula = $resultado['cedula'];
      $nombre = $resultado['nombre'];
      $fecha = $resultado['fecha'];
      $genero = $resultado['genero'];
      $papel = $resultado['papel'];

      $id_actor = $resultado['id_actor'];
      $id_genero = $resultado['id_genero'];
      $id_papel = $resultado['id_papel'];
    } 
     $seleccionGenero = $mysql->efectuarConsulta("SELECT teatro.genero.id as id_genero, teatro.genero.nombre as genero from genero");
     $seleccionPapel = $mysql->efectuarConsulta("SELECT teatro.tipo_papel.id as id_tipo, teatro.tipo_papel.nombre as papel from tipo_papel");
    //funcion desconectar
    $mysql->desconectar();    
  ?>
  </div>  
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Bienvenido</h2>
          <hr class="botm-line">
          <p>Bienvenid@ al formulario de actualizar.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              <form class="form-horizontal form-material" method="Post" action="Controlador/updateActor.php?id=<?php echo $id; ?>">
                <div class="form-group">
                  <label class="col-sm-12">Cedula</label>            
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $cedula?>" class="form-control form-control-line" name="cedula" required="" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Nombres y apellidos</label>            
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $nombre?>" class="form-control form-control-line" name="nombre" required="" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Fecha de nacimiento</label>            
                  <div class="col-md-12">
                      <input type="date" value="<?php echo $fecha?>" class="form-control form-control-line" name="fecha" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Genero</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="genero">
                          <option value="<?php echo $id_genero?>" selected="true"><?php echo $genero?></option>
                          <option disabled>Seleccione un genero</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionGenero)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_genero']?>"><?php echo $resultado['genero']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Papel</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipo_papel">
                          <option value="<?php echo $id_papel?>" selected="true"><?php echo $papel?></option>
                          <option disabled>Seleccione un tipo de papel</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionPapel)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_tipo']?>"><?php echo $resultado['papel']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>             
                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <button class="btn btn-success" name="enviar">Modificar</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <a href="ver_actor.php" class="btn btn-danger">Cancelar</a>
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
      header( "refresh:0;url=login_teatro.php" );    
  }
?>
  <script src="js/validacionCampos.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
