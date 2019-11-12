<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - ver medicos inactivos</title>
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
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
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
  //llamado al archivo MySQL
    require_once 'Modelo/MySQL.php';
    //nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();    
     //respectivas variables donde se llama la función consultar, se incluye la respectiva consulta
    $consulta = $mysql->efectuarConsulta("SELECT clinica_cotecnova.medicos.id_medico, clinica_cotecnova.medicos.numero_documento, clinica_cotecnova.medicos.nombre_completo, clinica_cotecnova.medicos.apellidos ,  clinica_cotecnova.tipos_medicos.nombre from medicos join tipos_medicos  on clinica_cotecnova.medicos.tipos_medicos_id = clinica_cotecnova.tipos_medicos.id_tipo_medico where estado = 0");    
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
          <p>Bienvenid@ al ver medicos inactivos</p>
          <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material">
                <table class="table table-hover" id="ver_medico_inactivo">
                    <thead>
                      <tr>
                        <th scope="col">Numero Documento</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Tipo de medico</th>
                        <th scope="col">Activar</th>
                      </tr>
                    </thead>
                    <tbody>
                     <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                    <?php 
                      while ($resultado= mysqli_fetch_assoc($consulta)){      
                      $idMedico = $resultado['id_medico'];
                    ?>
                      <tr>
                           <!-- Se traen los datos y se imprimen en las opciones del select -->
                        <td><?php echo $resultado['numero_documento'] ?></td>
                        <td><?php echo $resultado['nombre_completo'] ?></td>
                        <td><?php echo $resultado['apellidos'] ?></td>                      
                        <td><?php echo $resultado['nombre'] ?></td>
                        <td>
                            <!-- Boton para redirigir a archivo que activa medico -->
                            <a href="Controlador/activarMedico.php?id=<?php echo $idMedico; ?>" class="btn btn-primary" name="enviar">Activar</a> 
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                      </tbody>
                  </table>
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
  <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#ver_medico_inactivo').DataTable();
    } );
    </script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
