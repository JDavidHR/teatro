<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Crear usuario</title>
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
    <?php 
    session_start();
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){ //Sesion como medico
    //llamado al archivo MySQL
    require_once 'Modelo/MySQL.php';
    //nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    //respectivas variables donde se llama la función consultar, se incluye la respectiva consulta
    //Consulto el id y nombre del tipo de usuario paciente
    $seleccionTipoUsuario = $mysql->efectuarConsulta("select clinica_cotecnova.tipo_usuario.id_tipo_usuario, clinica_cotecnova.tipo_usuario.nombre from tipo_usuario where id_tipo_usuario = 2");     
    //Consulto el id y el nombre del tipo de documento
    $seleccionDocumento = $mysql->efectuarConsulta("select clinica_cotecnova.tipos_documentos.id_tipo_documento, clinica_cotecnova.tipos_documentos.nombre from tipos_documentos");     
    //Consulto el id y el nombre de los estados civiles
    $seleccionEstado = $mysql->efectuarConsulta("select clinica_cotecnova.estados_civiles.id_estado_civil, clinica_cotecnova.estados_civiles.nombre from estados_civiles"); 
    //Consulto el id y el nombre del departamento
    $seleccionDepartamento = $mysql->efectuarConsulta("select clinica_cotecnova.departamentos.id_departamento, clinica_cotecnova.departamentos.nombre from departamentos"); 
    //Consulto el id y el nombre de la ciudad
    $seleccionCiudad = $mysql->efectuarConsulta("select clinica_cotecnova.ciudades.id_ciudad, clinica_cotecnova.ciudades.nombre from ciudades"); 
    //funcion desconectar
    $mysql->desconectar();    
    ?>
    <!--banner-->
    <div id="container">
    <?php
    include("header_index.php");    
    ?>
    </div>  
    <!--seccion donde se tienen diferentes divisiones y etiquetas-->
    <section id="service" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <h2 class="ser-title">Bienvenido</h2>
            <hr class="botm-line">
            <p>Bienvenid@ al formulario de registro, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
            <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="card">
              <!-- Tab panes -->
              <div class="card-body">
                  <!-- Formulario donde al darle al boton se envian los datos al controlador de insertar usuario -->
                  <form class="form-horizontal form-material" action="Controlador/insertarUsuario.php" method="POST">                
                  <div class="form-group">
                    <label class="col-sm-12">Tipo de documento</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="tipoDocumento" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                        <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                         <?php 
                         while ($resultado= mysqli_fetch_assoc($seleccionDocumento)){   
                             ?> 
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                          <option value="<?php echo $resultado['id_tipo_documento']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <!-- Divisiones, etiquetas e inputs -->
                  <div class="form-group">
                    <label class="col-sm-12">Numero</label>            
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese el numero del documento" name="numeroDocumento" class="form-control form-control-line" required="" onkeypress="return solonumeros(event)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Nombre Completo</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese sus nombres" name="nombreCompleto" class="form-control form-control-line" required="" onkeypress="return sololetras(event)">
                    </div>
                  </div>
                  <div class="form-group">                  
                    <label class="col-md-12">Apellidos</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" class="form-control form-control-line" required="" onkeypress="return sololetras(event)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Estado civil</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="estadoCivil" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                           <?php 
                           //se recorre el resultado de la consulta de estado civil
                         while ($resultado= mysqli_fetch_assoc($seleccionEstado)){
                             //se imprime los resultados
                             ?> 
                          <option value="<?php echo $resultado['id_estado_civil']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>                
                  <div class="form-group">
                    <label class="col-sm-12">Departamento de nacimiento</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" id="departamento" name="departamentoNacimiento" required="">
                        <option disabled selected="true">Seleccione una opcion</option>
                        <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                           <?php 
                           //se recorre los resultado de departamentos
                         while ($resultado= mysqli_fetch_assoc($seleccionDepartamento)){   
                             ?>
                        <!-- Se traen los datos y se imprimen en las opciones del select -->
                          <option value="<?php echo $resultado['id_departamento']?>"><?php echo $resultado['nombre']?></option>  
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Ciudad de nacimiento</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" id="ciudad" name="ciudadNacimiento" disabled required="">
                        <option disabled selected="true">Seleccione una ciudad</option>

                      </select>
                    </div>
                  </div>
                  <!-- Divisiones, etiquetas e inputs -->
                  <div class="form-group">
                    <label class="col-md-12">Contraseña</label>
                    <div class="col-md-12">
                        <input type="password" placeholder="Ingrese una clave" class="form-control form-control-line" name="contrasena" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-3 col-md-2">
                         <!-- Boton que "enviara" los datos -->
                        <button class="btn btn-success" name="enviar">Registrarse</button>
                    </div>
                    <div class="col-sm-9 col-md-4">
                        <!-- Boton que redirecciona al index -->
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
    <!-- Llamado de los respectivos scripts -->
    <script src="js/validacionCampos.js"></script>
    <script src="js/listasDependientes.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
</body>
</html>
