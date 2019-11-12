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
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_POST['enviar']) && !empty($_GET['id']) && !empty($_POST['contrasenaNueva']) && !empty($_GET['tipo_usuario'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $id = $_GET['id'];
    $tipo_usuario = $_GET['tipo_usuario'];
    $contrasenaNueva = md5($_POST['contrasenaNueva']);
    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    if($tipo_usuario == 1){
        //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino update para meter los datos a la respectiva table
        $actualizar = $mysql->efectuarConsulta("Update clinica_cotecnova.medicos set contrasena = '".$contrasenaNueva."' where id_medico = ".$id."");        
    }else if($tipo_usuario == 2){
        $actualizar = $mysql->efectuarConsulta("Update clinica_cotecnova.usuarios set contrasena = '".$contrasenaNueva."' where id_usuario = ".$id."");
    }     
    //Desconecto la conexion de la bD
    $mysql->desconectar();
    //decision para comprobar si se ejecuto, se redirige al index principal
    if($actualizar){
      //impresion de mensaje personalizado
       echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>La contraseña ha sido actualizado correctamente.</div>";
       header( "refresh:3;url=../index.php" ); 
    } else {
        //mensaje de error personalizado
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido actualizar la contraseña.</div>";
        //redireccion
        header( "refresh:3;url=../index.php" );         
    }
}else{
  //impresion de mensaje personalizado
    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se han enviado todos los datos necesarios.</div>";
    header( "refresh:3;url=../index.php" );  
}
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
