<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
<!-- Llamado de css -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="col-lg-offset-3 col-lg-6">
<?php
    //Comprobar que los campos no esten vacios   
    if(isset($_POST['enviar']) && !empty($_POST['documentoPaciente']) &&
        !empty($_POST['documentoMedico']) && !empty($_POST['fechaCita']) &&
        !empty($_POST['horaCita']) && !empty($_POST['motivoCita']))
    {
        //Llamar al archivo MySQL
        require_once '../Modelo/MySQL.php';
            
        //Recuperar datos del formulario (crear_cita.php)    
        $documentoPaciente = $_POST['documentoPaciente'];
        $documentoMedico = $_POST['documentoMedico'];
        $fechaCita = $_POST['fechaCita'];
        $horaCita = $_POST['horaCita'];
        $motivoCita = $_POST['motivoCita'];

        //Concatenar la fecha y la hora (aaaa-mm-dd hh:mm)
        $fechaHora = $fechaCita." ".$horaCita;
        
        //Nuevo archivo MySQL y se llama a la funcion conectar()
        $mysql = new MySQL;
        $mysql->conectar();

        //Consultar id de usuarios y medicos
        $id_medico = $mysql->efectuarConsulta("select id_medico from clinica_cotecnova.medicos where numero_documento = ".$documentoMedico.""); 
        $id_usuario = $mysql->efectuarConsulta("select id_usuario from clinica_cotecnova.usuarios where numero_documento = ".$documentoPaciente."");
        
        //ciclos while que sirven para traer los respectivos id
        while($resultado = mysqli_fetch_assoc($id_medico))
        {
            $idMedico = $resultado['id_medico']; 
        }

        while($resultado = mysqli_fetch_assoc($id_usuario))
        {
            $idUsuario = $resultado['id_usuario']; 
        }
        
        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $insertarCitai = $mysql->efectuarConsulta("insert into clinica_cotecnova.citas(fecha_hora, motivo_consulta, usuario_id, medico_id, estado) values('".$fechaHora."','".$motivoCita."',".$idUsuario.",".$idMedico.", 1)"); 
        
         //Desconecto la conexion de la bD
        $mysql->desconectar();
        
        //Si se efectuo correctamente la consulta se redirige al index
        if($insertarCitai){
           //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>La cita ha sido creada correctamente.</div>";
           //redireccion
           header( "refresh:3;url=../ver_cita.php" ); 
        }
        //Sino da mensaje de error 
        else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido crear la cita.</div>";
           //redireccion
           header( "refresh:3;url=../crear_cita.php" );      
        }
    }
    //Si algun campo está vacio de redirige a la pagina del formulario
    else
    {
    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se han enviado todos los datos necesarios.</div>";
    //redireccion
    header( "refresh:3;url=../crear_cita.php" );  
    }
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>