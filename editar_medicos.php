<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Modificar medicos</title>
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
    clinica_cotecnova.tipos_documentos.id_tipo_documento,
    clinica_cotecnova.tipos_documentos.nombre as tipo_documento, 
    clinica_cotecnova.medicos.numero_documento, 
    clinica_cotecnova.medicos.id_medico, 
    clinica_cotecnova.medicos.nombre_completo, 
    clinica_cotecnova.medicos.apellidos, 
    clinica_cotecnova.estados_civiles.id_estado_civil,
    clinica_cotecnova.estados_civiles.nombre as estado, 
    clinica_cotecnova.medicos.tipos_medicos_id,
    clinica_cotecnova.tipos_medicos.id_tipo_medico,
    clinica_cotecnova.tipos_medicos.nombre as nombreMedico,
    clinica_cotecnova.medicos.contrasena  
    FROM medicos 
    INNER JOIN tipos_documentos on clinica_cotecnova.medicos.tipo_documento_id = clinica_cotecnova.tipos_documentos.id_tipo_documento 
    INNER JOIN estados_civiles on clinica_cotecnova.medicos.estado_civil_id = clinica_cotecnova.estados_civiles.id_estado_civil 
    INNER JOIN tipos_medicos on clinica_cotecnova.medicos.tipos_medicos_id = clinica_cotecnova.tipos_medicos.id_tipo_medico
    WHERE id_medico = ".$id."");  
    while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){
        $id_medico = $resultado['id_medico'];
        $id_tipo_documento = $resultado['id_tipo_documento'];
        $tipo_documento = $resultado['tipo_documento'];
        $numeroDocumento = $resultado['numero_documento'];
        $nombre_completo = $resultado['nombre_completo'];
        $apellidos = $resultado['apellidos'];
        $id_estado = $resultado['id_estado_civil'];
        $estado = $resultado['estado'];
        $tipoMedico = $resultado['tipos_medicos_id'];
        $nombreMedico = $resultado['nombreMedico'];
        $contrasena = $resultado['contrasena'];        
    } 
    $seleccionEstado = $mysql->efectuarConsulta("select clinica_cotecnova.estados_civiles.id_estado_civil, clinica_cotecnova.estados_civiles.nombre from estados_civiles");
    $seleccionTipo = $mysql->efectuarConsulta("select clinica_cotecnova.tipos_medicos.id_tipo_medico, clinica_cotecnova.tipos_medicos.nombre from tipos_medicos");
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
              <form class="form-horizontal form-material" method="Post" action="Controlador/updateMedico.php?id=<?php echo $id_medico; ?>">
                <div class="form-group">
                  <label class="col-sm-12">Tipo de documento</label>
                  <div class="col-sm-12">
                      <select disabled class="form-control form-control-line" name="tipoDocumento">
                        <option value="<?php echo $id_tipo_documento?>"><?php echo $tipo_documento?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Numero</label>            
                  <div class="col-md-12">
                      <input type="text" disabled="" value="<?php echo $numeroDocumento?>" class="form-control form-control-line" name="numeroDocumento" required="" onkeypress="return solonumeros(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Nombre Completo</label>
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $nombre_completo?>" class="form-control form-control-line" name="nombreCompleto" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">                  
                  <label class="col-md-12">Apellidos</label>
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $apellidos?>" class="form-control form-control-line" name="apellidos" onkeypress="return sololetras(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Estado civil</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="estadoCivil">
                          <option value="<?php echo $id_estado?>" selected="true"><?php echo $estado?></option>
                          <option disabled>Seleccione un estado si va a editar</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionEstado)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_estado_civil']?>"><?php echo $resultado['nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Tipo de medico</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipoMedico">
                          <option value="<?php echo $tipoMedico?>" selected="true"><?php echo $nombreMedico?></option>
                          <option disabled>Seleccione una opcion</option>
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($seleccionTipo)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id_tipo_medico']?>"><?php echo $resultado['nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>              
                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <button class="btn btn-success" name="enviar">Modificar</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <a href="ver_medico.php" class="btn btn-danger">Cancelar</a>
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
  <script src="js/validacionCampos.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
