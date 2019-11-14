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
    if(isset($_POST['enviar']) && !empty($_POST['nombre_obra']) &&
        !empty($_POST['autor']) && !empty($_POST['obra']) &&
        !empty($_POST['director']))
    {
        //Llamar al archivo MySQL
        require_once '../Modelo/MySQL2.php';
            
        //Recuperar datos del formulario (crear_cita.php)    
        $nombre = $_POST['nombre_obra'];
        $autor = $_POST['autor'];
        $obra = $_POST['obra'];
        $director = $_POST['director'];
        

        
        //Nuevo archivo MySQL y se llama a la funcion conectar()
        $mysql = new MySQL;
        $mysql->conectar();

      
        
        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $insertarCitai = $mysql->efectuarConsulta("insert into teatro.obra(nombre,Autor_id,Tipo_obra_id,Director_id,estado) VALUES ('".$nombre."','".$autor."','".$obra."','".$director."',1)"); 
        
         //Desconecto la conexion de la bD
        $mysql->desconectar();
        
        //Si se efectuo correctamente la consulta se redirige al index
        if($insertarCitai){
           //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>La obra ha sido creada correctamente.</div>";
           //redireccion
           header( "refresh:3;url=../ver_obra.php" ); 
        }
        //Sino da mensaje de error 
        else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_cita.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido añadir la obra.</div>";
           //redireccion
           header( "refresh:3;url=../crear_cita.php" );      
        }
    }
    
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>