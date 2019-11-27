<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Listado de personajes</title>
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
    $seleccionInformacion = $mysql->efectuarConsulta("SELECT teatro.obra_x_personajes.Obra_id as id_obra, teatro.obra.nombre as nombre, teatro.personajes.id as id_personaje, teatro.personajes.nombre as personajes, teatro.personajes.descripcion as descripcion, teatro.actores.nombre as actor, teatro.tipo_papel.nombre as papel from teatro.obra_x_personajes join teatro.obra on teatro.obra.id = teatro.obra_x_personajes.Obra_id join teatro.personajes on teatro.personajes.id = teatro.obra_x_personajes.Personajes_id join teatro.actores on teatro.actores.id = teatro.personajes.Actores_id join teatro.tipo_papel on teatro.tipo_papel.id = teatro.actores.Tipo_papel_id where teatro.obra_x_personajes.Obra_id = ".$id."");  
   
    
    $seleccionObra = $mysql->efectuarConsulta("SELECT 
    teatro.obra.nombre as nombre FROM obra WHERE teatro.obra.id = ".$id."");  
    while ($resultado2 = mysqli_fetch_assoc($seleccionObra)){
      $nombreObra2 = $resultado2['nombre'];
    }
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
            <p>Obras actualmente disponibles</p>
            <p>Todos los datos mostrados son los suministrados por el teatro ser&aacute;n de uso aplicativo.</p>
            </div>
        <div class="col-md-9 col-sm-9">
            <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material">
                  <div class="form-group">
                  <label class="col-sm-12">Nombre</label>            
                  <div class="col-md-12">
                      <input type="text" value="<?php echo $nombreObra2?>" class="form-control form-control-line" name="nombreObra" disabled>
                  </div>
                </div>
                <table class="table table-hover" id="ver_obras">
                    <thead>
                        <tr>
                          <th scope="col">Personaje</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Actor</th>
                          <th scope="col">Papel</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                    <?php 
                        while ($resultado= mysqli_fetch_assoc($seleccionInformacion)){  
                        $id_personaje = $resultado['id_personaje'];                       
                    ?>
                    
                        <tr>
                            <!-- Se traen los datos y se imprimen en las opciones del select -->
                          <td><?php echo $resultado['personajes'] ?></td>
                          <td><?php echo $resultado['descripcion'] ?></th>
                          <td><?php echo $resultado['actor'] ?></td>                      
                          <td><?php echo $resultado['papel'] ?></td>
                          <td>
                              <a href="editar_obra.php?id=<?php echo $id_personaje; ?>" class="btn btn-success " name="enviar">Editar</a>
                          </td>
                          <td> 
                              <a href="eliminar_obra.php?id=<?php echo $id_personaje; ?>" class="btn btn-danger" name="eliminar">Eliminar</a>
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
        $('#ver_obras').DataTable();
    } );
    </script>
    <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
