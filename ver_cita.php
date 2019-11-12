
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - ver cita</title>
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
        include("header_index.php");
    ?>
    </div>  
    <?php
        //Llamar al archivo MySQL
        require_once 'Modelo/MySQL.php';
        //Nuevo archivo MySql
        $mysql = new MySQL;
        //Conectar a la base de datos
        $mysql->conectar();
        
        //Consulta para actualizar estado de las citas cuando ya hayan caducado

        $mysql->efectuarConsulta("UPDATE clinica_cotecnova.citas SET citas.estado = 0 WHERE citas.fecha_hora < NOW()");

        $mysql->efectuarConsulta("UPDATE clinica_cotecnova.citas SET citas.estado = 0 WHERE citas.fecha_hora < NOW()");

        
        //Si la sesión es como medico
        if(isset($_SESSION['idMedico'])){
            $idMedico = $_SESSION['idMedico'];
            //Muestra las citas asignadas a ese medico 
            $citasMedico = $mysql->efectuarConsulta("SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) as diferencia_dias, clinica_cotecnova.citas.id_cita, clinica_cotecnova.usuarios.nombre_completo as paciente, clinica_cotecnova.medicos.nombre_completo as medico, clinica_cotecnova.citas.motivo_consulta, clinica_cotecnova.citas.fecha_hora from citas join usuarios  on clinica_cotecnova.citas.usuario_id = clinica_cotecnova.usuarios.id_usuario join medicos on clinica_cotecnova.citas.medico_id = clinica_cotecnova.medicos.id_medico where clinica_cotecnova.citas.medico_id = ".$idMedico." and clinica_cotecnova.citas.estado = 1 and clinica_cotecnova.citas.fecha_hora > DATE_FORMAT(NOW(),'%Y-%m-%d') ");     
        
        }
        //Si la sesión es como medico
        else if($_SESSION['idUsuario']){
            $idUsuario = $_SESSION['idUsuario'];
            //Muestra las citas asignadas a ese usuario 
            $citasUsuario = $mysql->efectuarConsulta("SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) as diferencia_dias,clinica_cotecnova.citas.id_cita, clinica_cotecnova.usuarios.nombre_completo as paciente, clinica_cotecnova.medicos.nombre_completo as medico, clinica_cotecnova.citas.motivo_consulta, clinica_cotecnova.citas.fecha_hora from citas join usuarios  on clinica_cotecnova.citas.usuario_id = clinica_cotecnova.usuarios.id_usuario join medicos on clinica_cotecnova.citas.medico_id = clinica_cotecnova.medicos.id_medico where clinica_cotecnova.citas.usuario_id = ".$idUsuario." and  clinica_cotecnova.citas.estado = 1 and clinica_cotecnova.citas.fecha_hora > DATE_FORMAT(NOW(),'%Y-%m-%d') ");     
        }
    $mysql->desconectar();
        //Si el usuario es medico
        if($_SESSION['tipousuario'] == 1){
            ?>
               <!--service-->
                <section id="service" class="section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <h2 class="ser-title">Bienvenido</h2>
                        <hr class="botm-line">
                        <p>Bienvenid@ al ver citas</p>
                        <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="card">
                          <!-- Tab panes -->
                          <div class="card-body">
                            <form class="form-horizontal form-material">
                            <table id="ver_cita" class="table table-hover display">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre del paciente</th>
                                    <th scope="col">Nombre del medico</th>
                                    <th scope="col">Motivo de consulta</th>
                                    <th scope="col">Fecha y hora de la cita</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                //Si la consulta tiene resultados
                                if(!empty($citasMedico))
                                { 
                                    while ($resultado= mysqli_fetch_assoc($citasMedico))
                                    { 
                                        //Trae el resultado de la consulta 
                                        //SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) ...
                                        if($resultado['diferencia_dias'] == 1)
                                        {
                                ?>
                                    <!-- Si la fecha de la cita esta a un dia de la fecha actual, muestra esos datos en rojo -->
                                    <tr style="color: red;">
                                        <td scope="row" ><?php echo $resultado['paciente'] ?></td>
                                        <td><?php echo $resultado['medico'] ?></td>
                                        <td><?php echo $resultado['motivo_consulta'] ?></td>
                                        <td><?php echo $resultado['fecha_hora'] ?></td>
                                    </tr>
                                <?php
                                        }else{
                                ?>
                                    <tr>
                                        <!-- sino los muestra normal -->
                                        <td scope="row" ><?php echo $resultado['paciente'] ?></td>
                                        <td><?php echo $resultado['medico'] ?></td>
                                        <td><?php echo $resultado['motivo_consulta'] ?></td>
                                        <td><?php echo $resultado['fecha_hora'] ?></td>
                                    </tr>
                                <?php
                                      }
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
            <?php
        //Si se inicia sesion como usuario    
        }else if($_SESSION['tipousuario'] == 2){
            ?>
             <!--service-->
                <section id="service" class="section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <h2 class="ser-title">Bienvenido</h2>
                        <hr class="botm-line">
                        <p>Bienvenid@ a tu modulo de citas</p>
                        <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="card">
                          <!-- Tab panes -->
                          <div class="card-body">
                            <form class="form-horizontal form-material">
                            <table id="ver_cita" class="table table-hover display">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre del paciente</th>
                                    <th scope="col">Nombre del medico</th>
                                    <th scope="col">Motivo de consulta</th>
                                    <th scope="col">Fecha y hora de la cita</th>
                                    <th scope="col">Cancelar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                //Si la consulta tiene resultados
                                if(!empty($citasUsuario))
                                { 
                                    while ($resultado= mysqli_fetch_assoc($citasUsuario)){ 
                                        
                                        //Trae el resultado de la consulta 
                                        //SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) ...
                                        if($resultado['diferencia_dias'] == 1)
                                        {
                                ?> 
                                    <tr style="color: red;">
                                        <!-- Si la fecha de la cita esta a un dia de la fecha actual, muestra esos datos en rojo -->
                                        <td scope="row"><?php echo $resultado['paciente'] ?></td>
                                        <td><?php echo $resultado['medico'] ?></td>
                                        <td><?php echo $resultado['motivo_consulta'] ?></td>
                                        <td><?php echo $resultado['fecha_hora'] ?></td>
                                        <td>
                                            <!-- Boton que redirecciona al index -->
                                            <a href="Controlador/cancelar_cita.php?id=<?php echo $resultado['id_cita']; ?>" class="btn btn-danger  col-lg-12 " name="eliminar">Cancelar</a>
                                        </td>
                                    </tr>                                
                                <?php
                                     }
                                  else{
                                ?>
                                    <tr>
                                        <!-- sino los muestra normal -->
                                        <td><?php echo $resultado['paciente'] ?></td>
                                        <td><?php echo $resultado['medico'] ?></td>
                                        <td><?php echo $resultado['motivo_consulta'] ?></td>
                                        <td><?php echo $resultado['fecha_hora'] ?></td>
                                        <td>
                                            <!-- Boton que redirecciona al index -->
                                            <a href="Controlador/cancelar_cita.php?id=<?php echo $resultado['id_cita']; ?>" class="btn btn-danger  col-lg-12 " name="eliminar">Cancelar</a>
                                        </td>
                                    </tr>
                                <?php
                                      }
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
            <?php
        }     
    ?>  
   <!--footer-->
  <div id="footer">
  <?php
  include("footer.php");
  ?>
  </div>
  <!--/ footer-->
  <?php
    }else{
        header( "refresh:0;url=login.php" );    
    }
    ?>

<script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#ver_cita').DataTable();
    } );
  </script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
