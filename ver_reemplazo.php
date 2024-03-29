<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Ver reemplazos</title>
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
        $consulta = $mysql->efectuarConsulta("SELECT teatro.reemplazos.id as idReemplazo, teatro.reemplazos.nombre as nombre, teatro.reemplazos.Actores_id, teatro.reemplazos.Funciones_id,teatro.actores.id,teatro.actores.nombre as nombre_actor, teatro.tipo_funcion.id as tipo_fun 
            from teatro.reemplazos 
            join tipo_funcion on teatro.tipo_funcion.id = teatro.reemplazos.Funciones_id
            join actores on teatro.actores.id = teatro.reemplazos.Actores_id 
            where teatro.reemplazos.estado = 1");
        //funcion desconectar
        $mysql->desconectar();    
        ?>
    </div>  
    <!--service-->
    <section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
            <h2 class="ser-title">Bienvenido</h2>
            <hr class="botm-line">
            <p>Reemplazos actualmente existentes</p>
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
                            <th scope="col">Nombre del Actor de Reemplazo</th>
                            <th scope="col">Actor a Reemplazar</th>
                            <th scope="col">Funcion</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                    <?php 
                        while ($resultado= mysqli_fetch_assoc($consulta)){  
                        $idReemplazo = $resultado['idReemplazo'];                       
                    ?>
                    
                        <tr>
                            <!-- Se traen los datos y se imprimen en las opciones del select -->
                            <td><?php echo $resultado['nombre'] ?></td>
                            <td><?php echo $resultado['nombre_actor'] ?></th>
                            <td><?php echo $resultado['tipo_fun'] ?></td>
                            <td>
                                 <a href="editar_reemplazo.php?id=<?php echo $idReemplazo; ?>" class="btn btn-success " name="enviar">Editar</a>
                            </td>
                            <td> 
                                <a href="eliminar_Reemplazo.php?id=<?php echo $idReemplazo ?>" class="btn btn-danger" name="eliminar">Eliminar</a>
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
        $('#ver_obra').DataTable();
    } );
    </script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
