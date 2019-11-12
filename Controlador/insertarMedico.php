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

if(isset($_POST['enviar']) && !empty($_POST['tipoDocumento']) && !empty($_POST['numeroDocumento']) && !empty($_POST['nombreCompleto']) && !empty($_POST['apellidos']) && !empty($_POST['estadoCivil']) && !empty($_POST['contrasena']) && !empty($_POST['tipoMedico'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $tipoDocumento= $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estadoCivil'];
    $contrasena = md5($_POST['contrasena']);
    $tipoMedico = $_POST['tipoMedico'];
    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    //consulta donde se hace el llamado del numero de documento
    $repetido = $mysql->efectuarConsulta("select numero_documento from clinica_cotecnova.medicos where numero_documento = ".$numeroDocumento."");
    
    //condicion que comprueba si hay algun dato en la consulta
    if(mysqli_num_rows($repetido) > 0){
        //Desconecto la conexion de la bD
        $mysql->desconectar();
        //impresion de mensajes personalizados
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_medicos.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> Numero de documento ya existe.</div>";
        //redireccion
        header("refresh:3;url=../crear_medicos.php" ); 
    }else{
        //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
        $insertarMedicoi= $mysql->efectuarConsulta("insert into clinica_cotecnova.medicos(tipo_Usuario_id, numero_documento, nombre_completo, apellidos, contrasena, tipo_documento_id, estado_civil_id, tipos_medicos_id, estado) VALUES(1,'".$numeroDocumento."','".$nombreCompleto."','".$apellidos."','".$contrasena."',".$tipoDocumento.",".$estadoCivil.",".$tipoMedico.", 1 )");  
        //Desconecto la conexion de la bD
        $mysql->desconectar(); 
        //decision para comprobar si se ejecuto, se redirige al index principal
        
        if($insertarMedicoi){
          //impresion de mensajes personalizados
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_medico.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong> El medico ha sido registrado correctamente.</div>";
           //redireccion
           header( "refresh:3;url=../ver_medico.php" );    
        } else {
            //mensaje de error personalizado
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_medicos.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> No se ha podido registrar al medico.</div>";
           //redireccion
           header( "refresh:3;url=../crear_medicos.php" );          
        }
    }        
}else{
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
  //mensaje personalizado
    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_medicos.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se han enviado todos los datos necesarios.</div>";
    //redireccion
    header( "refresh:3;url=../crear_medicos.php" ); 
}
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
