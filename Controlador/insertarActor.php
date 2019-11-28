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
    if(isset($_POST['enviar']) && !empty($_POST['cedula']) &&
        !empty($_POST['nombresApellidos']) && !empty($_POST['fecha']) && !empty($_POST['genero']) && !empty($_POST['papel']))
    {
        //Llamar al archivo MySQL
        require_once '../Modelo/MySQL2.php';
            
        //Recuperar datos del formulario (crear_cita.php)
        $cedula = $_POST['cedula'];  
        $nombre = $_POST['nombresApellidos'];
        $fecha = $_POST['fecha'];
        $genero = $_POST['genero'];
        $papel = $_POST['papel'];
        

        
        //Nuevo archivo MySQL y se llama a la funcion conectar()
        $mysql = new MySQL;
        $mysql->conectar();

      
        
        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $insertarActor = $mysql->efectuarConsulta("insert into teatro.actores(cedula, nombre, fecha_nacimiento, Genero_id, Tipo_papel_id, estado) VALUES ('".$cedula."','".$nombre."','".$fecha."','".$genero."','".$papel."',1)"); 
        
         //Desconecto la conexion de la bD
        $mysql->desconectar();
        
        //Si se efectuo correctamente la consulta se redirige al index
        if($insertarActor){
           //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../crear_actor.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong> El actor ha sido creado correctamente.</div>";
           //redireccion
           header( "refresh:3;url=../ver_actor.php" ); 
        }
        //Sino da mensaje de error 
        else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_actor.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> No se ha podido añadir el actor.</div>";
           //redireccion
           header( "refresh:3;url=../crear_actor.php" );      
        }
    }
    
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>