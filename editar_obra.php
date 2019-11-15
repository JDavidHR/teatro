<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova</title>
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
    $seleccionInformacion = $mysql->efectuarConsulta("SELECT 
    teatro.obra.id, teatro.obra.nombre as nombre, teatro.autor.nombre as autor, teatro.autor.id as id_autor, teatro.director.id as id_director, teatro.tipo_obra.id as id_tipo_obra, 
    teatro.tipo_obra.nombre as tipo, teatro.director.nombre as director FROM obra 
     JOIN autor on teatro.obra.Autor_id = teatro.autor.id JOIN tipo_obra on teatro.obra.Tipo_obra_id = teatro.tipo_obra.id JOIN director on teatro.obra.Director_id = teatro.director.id
    WHERE teatro.obra.id = ".$id."");  
    while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
      $nombreObra = $resultado['nombre'];
      $nombreAutor = $resultado['autor'];
      $tipoObra = $resultado['tipo'];
      $nombreDirector = $resultado['director'];
      $id_director = $resultado['id_director'];
      $id_autor = $resultado['id_autor'];
      $id_tipo_obra = $resultado['id_tipo_obra'];
    } 
    $seleccionAutor = $mysql->efectuarConsulta("SELECT teatro.autor.id,teatro.autor.nombre from autor");
    $seleccionTipoObra = $mysql->efectuarConsulta("SELECT teatro.tipo_obra.id,teatro.tipo_obra.nombre from tipo_obra");
    $seleccionDirector = $mysql->efectuarConsulta("SELECT teatro.director.id,teatro.director.nombre from director");
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
          <p>Bienvenid@ al formulario de actualizar, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              <form class="form-horizontal form-material" method="Post" action="Controlador/updateObra.php?id=<?php echo $id_obra; ?>">
                <div class="form-group">
                  <label class="col-sm-12">Nombre</label>            
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $nombreObra?>" class="form-control form-control-line" name="numeroDocumento" required="" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Autor</label>
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $nombreAutor?>" class="form-control form-control-line" name="nombreCompleto" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">                  
                  <label class="col-md-12">Genero</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="estadoCivil">
                          <option value="<?php echo $id_tipo_obra?>" selected="true"><?php echo $tipoObra?></option>
                          <option disabled>Seleccione uno si va a editar</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionTipoObra)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_tipo_obra']?>"><?php echo $resultado['nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Director</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="estadoCivil">
                          <option value="<?php echo $id_director?>" selected="true"><?php echo $nombreDirector?></option>
                          <option disabled>Seleccione un director si va a editar</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionDirector)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_director']?>"><?php echo $resultado['nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>              
                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <button class="btn btn-success" name="enviar">Modificar</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <a href="ver_obra.php" class="btn btn-danger">Cancelar</a>
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
