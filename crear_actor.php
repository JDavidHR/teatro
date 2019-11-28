<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teatro Cotecnova - Nuevo actor</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <!-- Llamado de css -->
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
  <!-- Llamado a la plantilla de header -->
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
    $seleccionGenero = $mysql->efectuarConsulta("SELECT teatro.genero.id as id_genero, teatro.genero.nombre as genero from genero");
    $seleccionPapel = $mysql->efectuarConsulta("SELECT teatro.tipo_papel.id as id_tipo, teatro.tipo_papel.nombre as papel from tipo_papel");

    //funcion desconectar
    $mysql->desconectar();    
    ?>
  </div>  
  <!--service-->
  <!-- creacion de seccion, divs, titulos y parrafos -->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Bienvenido</h2>
          <hr class="botm-line">
          <p>Bienvenid@ al formulario de registro, por favor rellenar los siguientes campos.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              
              <form class="form-horizontal form-material" action="Controlador/insertarActor.php" method="POST">
                
                <div class="form-group">
                  <label class="col-sm-12">Cedula</label>
                  <div class="col-sm-12">
                      <input type="text" name="cedula" placeholder="Digite la cedula" class="form-control form-control-line">
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-sm-12">Nombres y Apellidos</label>
                  <div class="col-sm-12">
                      <input type="text" name="nombresApellidos" placeholder="Ingrese los nombres y apellidos" class="form-control form-control-line">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12">Fecha de nacimiento</label>
                  <div class="col-sm-12">
                      <input type="date" name="fecha" class="form-control form-control-line">
                  </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-12">Genero</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="genero">
                          <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                          <option value="0">Elija un genero</option>   
                        <?php 
                        //cliclo while que nos servira para traer los datos que haya seleccionado en la cedula
                            while ($resultado = mysqli_fetch_assoc($seleccionGenero)){   
                        ?> 
                          <!-- Se traen los datos y se imprimen en las opciones del select -->
                        
                          <!-- impresion de los datos traidos en el select con sus respectivas variables -->
                        <option value="<?php echo $resultado['id_genero']?>"><?php echo $resultado['genero'];?></option> 
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Papel</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="papel">
                          <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                          <option value="0">Elija un tipo de papel</option>   
                        <?php 
                        //cliclo while que nos servira para traer los datos que haya seleccionado en la cedula
                            while ($resultado = mysqli_fetch_assoc($seleccionPapel)){   
                        ?> 
                          <!-- Se traen los datos y se imprimen en las opciones del select -->
                        
                          <!-- impresion de los datos traidos en el select con sus respectivas variables -->
                        <option value="<?php echo $resultado['id_tipo']?>"><?php echo $resultado['papel'];?></option> 
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <!-- creacion de boton registrar --> 
                    <button class="btn btn-success" name="enviar">Registrar</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <!-- creacion de boton cancelar que redirige al index del medico -->
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
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
  <!-- Llamado a la plantilla de footer -->
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

  <!-- Llamado de respectivos scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
