<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Editar obra</title>
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
    $seleccionInformacion = $mysql->efectuarConsulta("SELECT teatro.funciones.id as idFuncion,teatro.funciones.fecha_hora, teatro.funciones.Teatro_id, teatro.funciones.Tipo_funcion_id, teatro.funciones.Tipo_cliente_id,teatro.funciones.precio,teatro.tipo_teatro.id,teatro.tipo_teatro.tipo,teatro.tipo_funcion.id,teatro.tipo_funcion.Nombre as tipo_fun, teatro.tipo_cliente.id,teatro.tipo_cliente.Nombre 
            from teatro.funciones
            join teatro.tipo_teatro on teatro.funciones.Teatro_id = teatro.tipo_teatro.id 
            join teatro.tipo_funcion on teatro.funciones.Tipo_funcion_id = teatro.tipo_funcion.id 
            join teatro.tipo_cliente on teatro.funciones.Tipo_cliente_id = teatro.tipo_cliente.id
            where teatro.funciones.id = ".$id."");




    while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
      $fecha = $resultado['fecha_hora'];
      $precio = $resultado['precio'];
    } 
    $tipo_teatro = $mysql->efectuarConsulta("SELECT teatro.tipo_teatro.id,teatro.tipo_teatro.tipo from tipo_teatro");
    $tipo_funcion = $mysql->efectuarConsulta("SELECT teatro.tipo_funcion.id,teatro.tipo_funcion.Nombre as tipo_fun from tipo_funcion");
    $tipo_cliente = $mysql->efectuarConsulta("SELECT teatro.tipo_cliente.id,teatro.tipo_cliente.Nombre from tipo_cliente");
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
              <form class="form-horizontal form-material" method="Post" action="Controlador/updateObra.php?id=<?php echo $id; ?>">
                <div class="form-group">
                  <label class="col-sm-12">Fecha y Hora</label>            
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $fecha?>" class="form-control form-control-line" name="fecha" required="" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Precio</label>
                  <div class="col-sm-12">
                      <input type="text" value="<?php echo $precio?>" class="form-control form-control-line" name="precio" required="" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">                  
                  <label class="col-md-12">Genero</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipoObra">
                          <option value="<?php echo $id_tipo_obra?>" selected="true"><?php echo $tipoObra?></option>
                          <option disabled>Seleccione uno si va a editar</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($tipo_funcion)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id']?>"><?php echo $resultado['nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Director</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="nombreDirector">
                          <option value="<?php echo $id_director?>" selected="true"><?php echo $nombreDirector?></option>
                          <option disabled>Seleccione un director si va a editar</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($tipo_cliente)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id']?>"><?php echo $resultado['nombre']?></option>  
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
