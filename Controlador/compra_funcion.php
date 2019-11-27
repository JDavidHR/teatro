<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Procesando</title>
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
    if(isset($_POST['enviar']) && !empty($_POST['fecha']) &&
        !empty($_POST['tipo_teatro']) && !empty($_POST['tipo_fun']) &&
        !empty($_POST['tipo_cliente']))
    {
        //Llamar al archivo MySQL
        require_once '../Modelo/MySQL.php';
            
        //Recuperar datos del formulario (crear_cita.php)    
        $fecha = $_POST['fecha'];
        $fecha = date('Y-m-d');
        $hora = $_POST['hora'];
        $tipo_teatro = $_POST['tipo_teatro'];
        $tipo_fun = $_POST['tipo_fun'];
        $tipo_cliente = $_POST['tipo_cliente'];
        
        $fechaHora = $fecha." ".$hora;

        
        //Nuevo archivo MySQL y se llama a la funcion conectar()
        $mysql = new MySQL;
        $mysql->conectar();

        

        
        //Si se efectuo correctamente la consulta se redirige al index
        if($tipo_fun == 1){
          

        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $compra = $mysql->efectuarConsulta("insert into teatro.funciones(fecha_hora,Teatro_id,Tipo_funcion_id,Tipo_cliente_id,precio) VALUES ('".$fechaHora."','".$tipo_teatro."','".$tipo_fun."','".$tipo_cliente."',10000)"); 

          if($compra){
           //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>Compra exitosa.</div>";
           //redireccion
           header( "refresh:3;url=../index.php" ); 
        }
        //Sino da mensaje de error 
        else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido realizar la compra.</div>";
           //redireccion
           header( "refresh:3;url=../compra.php" );      
        }
      }
        if($tipo_fun == 2){
          

        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $compra = $mysql->efectuarConsulta("insert into teatro.funciones(fecha_hora,Teatro_id,Tipo_funcion_id,Tipo_cliente_id,precio) VALUES ('".$fecha."','".$tipo_teatro."','".$tipo_fun."','".$tipo_cliente."',15000)"); 

            if($compra){
           //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>Compra exitosa.</div>";
           //redireccion
           header( "refresh:3;url=../index.php" ); 
        }
        //Sino da mensaje de error 
        else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido realizar la compra.</div>";
           //redireccion
           header( "refresh:3;url=../compra.php" );      
        }
      }
        
    }
    
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>