<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Ver Funciones - Historial</title>
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

        $consulta = $mysql->efectuarConsulta("SELECT teatro.funciones.id as idFuncion,teatro.funciones.fecha_hora ,teatro.funciones.Teatro_id, teatro.funciones.Tipo_funcion_id, teatro.funciones.Tipo_cliente_id,teatro.funciones.precio,teatro.tipo_teatro.id,teatro.tipo_teatro.tipo,teatro.tipo_funcion.id,teatro.tipo_funcion.Nombre as tipo_fun, teatro.tipo_cliente.id,teatro.tipo_cliente.Nombre 
            from teatro.funciones
            join teatro.tipo_teatro on teatro.funciones.Teatro_id = teatro.tipo_teatro.id 
            join teatro.tipo_funcion on teatro.funciones.Tipo_funcion_id = teatro.tipo_funcion.id 
            join teatro.tipo_cliente on teatro.funciones.Tipo_cliente_id = teatro.tipo_cliente.id");
        //funcion desconectar
        $mysql->desconectar();    
        ?>
               <!--service-->
                    <section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
            <h2 class="ser-title">Bienvenido</h2>
            <hr class="botm-line">
            <p>Funciones actualmente disponibles</p>
            <p>Todos los datos mostrados son los suministrados por el teatro ser&aacute;n de uso aplicativo.</p>
            </div>
        <div class="col-md-9 col-sm-9">
            <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material">
                <table class="table table-hover" id="ver_obra">
                    <thead>
                        <tr>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Teatro</th>
                            <th scope="col">Tipo Funcion</th>
                            <th scope="col">Tipo Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    //Si la consulta tiene resultados
                    if(!empty($consulta))
                    { 
                        while ($resultado= mysqli_fetch_assoc($consulta))
                        { 
                            
                    ?>
                        <!-- Si la fecha de la cita esta a un dia de la fecha actual, muestra esos datos en rojo -->
                        <tr>
                            <td><?php echo $resultado['fecha_hora'] ?></td>
                            <td><?php echo $resultado['tipo'] ?></th>
                            <td><?php echo $resultado['tipo_fun'] ?></td>                      
                            <td><?php echo $resultado['Nombre'] ?></td>
                            <td>
                        </tr>
                    <?php
                            
                    ?>
                       
                    <?php
                          }
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
        $('#ver_obra').DataTable();
    } );
    </script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>