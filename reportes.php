<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Reportes</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <!-- Llamado de css -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">

  <script src="js/Chart.min.js"></script>
  <script src="js/utils.js"></script>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
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
    $seleccionCedulaP = $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.numero_documento, clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.apellidos from usuarios");

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
          <p>Bienvenid@ al formulario de registro, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              
                <!--<form class="form-horizontal form-material" action="#" method="POST">-->
                    <div class="list-group">
                        <li class="list-group-item">
                            <a href="Reportes_PDF/citasVigentes.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver citas vigentes PDF</a><br>
                            <a href="Controlador/citasVigentes_Excel.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver citas vigentes EXCEL</a>
                        </li>
                        <li class="list-group-item">
                            <a href="Reportes_PDF/citasCaducadas.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver citas caducadas PDF</a><br>
                            <a href="Controlador/citasCaducadas_Excel.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver citas caducadas EXCEL</a>
                        </li>
                        <li class="list-group-item">
                            <a href="Reportes_PDF/citasMedico.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver mis citas PDF</a><br>
                            <a href="Controlador/citasMedico_Excel.php" style="color: #999999;" target="_blank" rel="noopener noreferrer">Ver mis citas EXCEL</a>
                        </li>

                        <li class="list-group-item">
                            <form action="#" target="_blank" name="form_pacientes" id="form_id" method="POST">
                                <select class="custom-select mr-sm-2" name="pacientes">
                                    <option value="0" selected disabled>Seleccionar documento de paciente</option> 
                                    <?php 
                                    //cliclo while que nos servira para traer los datos que haya seleccionado en la cedula
                                    while ($resultado = mysqli_fetch_assoc($seleccionCedulaP)){   
                                    ?>
                                    <!-- Se traen los datos y se imprimen en las opciones del select -->
                                    <!-- impresion de los datos traidos en el select con sus respectivas variables -->
                                    <option value="<?php echo $resultado['numero_documento']?>"><?php echo $resultado['numero_documento']." - ".$resultado['nombre_completo']." ".$resultado['apellidos'];?></option>  
                                    <?php } ?>
                                </select><br>

                                <a href="javascript:enviarDocPDF()" style="color: #999999;">Ver citas de este paciente PDF</a><br>
                                <a href="javascript:enviarDocEXCEL()" style="color: #999999;">Ver citas de este paciente EXCEL</a>
                                    
                                <script type="text/javascript">
                                  function enviarDocPDF()
                                  {
                                    document.getElementById("form_id").action = "Reportes_PDF/citasPaciente_Comprobacion.php?value=1";
                                    document.form_pacientes.submit();
                                  }
                                  function enviarDocEXCEL()
                                  {
                                    document.getElementById("form_id").action = "Reportes_PDF/citasPaciente_Comprobacion.php?value=2";
                                    document.form_pacientes.submit();
                                  }
                                </script>
                            </form>
                        </li>

                        <li class="list-group-item">
                            <form action="Reportes_PDF/citasFechas_Comprobacion.php" target="_blank" name="form_fechas" method="POST">
                                Desde&nbsp<input type="date" name="date1" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>> Hasta <input type="date" name="date2" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>><br>

                                <a href="javascript:enviarFechasPDF()" style="color: #999999;">Ver citas en este rango PDF</a><br>
                                <a href="javascript:enviarFechasEXCEL()" style="color: #999999;">Ver citas en este rango EXCEL</a>

                                <script type="text/javascript">
                                    function enviarFechasPDF()
                                    {
                                        document.form_fechas.submit();
                                        document.form_fechas.value=
                                    }
                                    function enviarFechasEXCEL()
                                    {
                                        document.form_fechas.submit();
                                    }
                                </script>
                            </form>
                        </li>
                    </div>
                <!--</form>-->
            </div>
          </div> 
        </div>
      </div>

      
    <div id="canvas-holder" class="col-lg-5">
      <canvas id="chart1"></canvas>
    </div>

      <div id="canvas-holder" class="col-lg-5">
      <canvas id="chart2"></canvas>
    </div>
      <script>
          //Grafico 1
        var randomScalingFactor = function() {
          return Math.round(Math.random() * 100);
        };

        
        var config = {
          type: 'doughnut',
          data: {
            datasets: [{
              data: 
              <?php
                $mysql->conectar();
                $usuarios = $mysql->efectuarConsulta("select count(*) as cantidad FROM usuarios"); 
                $medicos = $mysql->efectuarConsulta("select count(*) as cantidadM FROM medicos");
                $mysql->desconectar();
              ?>
                [
                /*randomScalingFactor()*/
                <?php
                while ($resultado = mysqli_fetch_assoc($usuarios)) {
                  echo $resultado['cantidad'];
                 } 
                ?>,
                <?php
                while ($resultado = mysqli_fetch_assoc($medicos)) {
                  echo $resultado['cantidadM'];
                 } 
                ?>
              ],
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.yellow,
              ],
              label: 'Dataset 1'
            }],
            labels: [
              'Pacientes',
              'Medicos'
            ]
          },
          options: {
            responsive: true,
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Cantidad total de usuarios'
            },
            animation: {
              animateScale: true,
              animateRotate: true
            }
          }
        };
        
        
        //Grafico 2
        //var MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        var color = Chart.helpers.color;
        var barChartData = {
          labels: 
            <?php
              $contador = 0;
              $mysql->conectar();
              $annio1 = $mysql->efectuarConsulta("select DATE_FORMAT(fecha_hora, '%Y') as annio from citas GROUP BY annio");
              $mysql->desconectar();
            ?>
            [
              <?php
                while ($resultado1 = mysqli_fetch_assoc($annio1)) {
                  echo $resultado1['annio'];
                  
                  $contador++;
                  if($contador < 2){
                    echo ", ";
                  }
                } 
              ?>
            , ],
          datasets: [{
            label: 'Citas',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: 
            <?php
              $contador = 0;
              $mysql->conectar();
              $consulta = $mysql->efectuarConsulta("select COUNT(*) as cantidad, DATE_FORMAT(fecha_hora, '%Y') as anio from citas GROUP BY anio"); 
              $mysql->desconectar();
            ?>
            [
              <?php
                while ($resultado = mysqli_fetch_assoc($consulta)) {
                  echo $resultado['cantidad'];
                  $contador++;
                  if($contador < 2){
                    echo ", ";
                  }
                } 
              ?>,
            ]
          }]

        };

        window.onload = function() {
            // Grafico 1
           var ctx = document.getElementById('chart1').getContext('2d');
          window.myDoughnut = new Chart(ctx, config);
            
            // Grafico 2
          var barra = document.getElementById('chart2').getContext('2d');
          window.myBar = new Chart(barra, {
            type: 'bar',
            data: barChartData,
            options: {
              responsive: true,
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Citas en los diferentes años'
              }
            }
          });
          //Grafico 3
        };
      </script>      
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
  <script src="js/funcionesExcel.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
