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
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    if(isset($_POST['enviar']) && !empty($_POST['correoElectronico']) && !empty($_POST['numeroDocumento']) && !empty($_POST['tipousuario'])){
        
        $tipo_usuario = $_POST['tipousuario'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $correo = $_POST['correoElectronico'];
        
        require '../email/src/PHPMailer.php';
        require '../email/src/SMTP.php';
        require '../email/src/Exception.php';

        //Traigo el id del usuario
        //lamado al archivo MySQL
        require_once '../Modelo/MySQL.php';
        //nueva "archivo" MySQL
        $mysql = new MySQL;
        //llamado a funcion conectar
        $mysql->conectar();
        
        if($tipo_usuario == 1){
            $documentoExiste = $mysql->efectuarConsulta("select id_medico from medicos where numero_documento = ".$numeroDocumento." and tipo_Usuario_id = ".$tipo_usuario."");
            if(mysqli_num_rows($documentoExiste) > 0){
                //Desconecto la conexion de la bD
                $mysql->desconectar();
                while ($resultado= mysqli_fetch_assoc($documentoExiste)){  
                    $id = $resultado['id_medico'];    
                }
                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'pruebacorreocotecnova@gmail.com';                     // SMTP username
                    $mail->Password   = 'pruebacotecnova';                               // SMTP password
                    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('pruebacorreocotecnova@gmail.com', 'Juan rios');
                    $mail->addAddress($correo);       // Name is optional

                    // Content
                    $mail->isHTML(true);                    
                    $mail->CharSet = 'UTF-8';               // Set email format to HTML
                    $mail->Subject = 'Recuperar contraseña';
                    $mail->Body    = 'ingrese al siguiente link para recuperar cambiar la contraseña: http://localhost/clinica_cotecnova/contrasenaNueva.php?id='.$id.'&tipo_usuario='.$tipo_usuario;

                    $mail->send();
                    echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>El mensaje ha sido enviado correctamente.</div>";
                } catch (Exception $e) {
                    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Hubo error al enviar el mensaje:.{$mail->ErrorInfo}</div>";
                }
            }else{
                $mysql->desconectar();
                //impresion de mensajes personalizados
                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../formularioCorreo.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> Numero de documento no existe o incorrecto o tipo de usuario no existe.</div>";
                //redireccion
                header( "refresh:3;url=../formularioCorreo.php" ); 
            }
        }else{
            $documentoExiste = $mysql->efectuarConsulta("select id_usuario from usuarios where numero_documento = ".$numeroDocumento." and tipo_Usuario_id = ".$tipo_usuario."");
            if(mysqli_num_rows($documentoExiste) > 0){
                //Desconecto la conexion de la bD
                $mysql->desconectar();
                while ($resultado= mysqli_fetch_assoc($documentoExiste)){  
                    $id = $resultado['id_usuario'];    
                }
                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'pruebacorreocotecnova@gmail.com';                     // SMTP username
                    $mail->Password   = 'pruebacotecnova';                               // SMTP password
                    $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('pruebacorreocotecnova@gmail.com', 'Juan rios');
                    $mail->addAddress($correo);       // Name is optional

                    // Content
                    $mail->isHTML(true);                    
                    $mail->CharSet = 'UTF-8';               // Set email format to HTML
                    $mail->Subject = 'Recuperar contraseña';
                    $mail->Body    = 'ingrese al siguiente link para recuperar cambiar la contraseña: http://localhost/clinica_cotecnova/contrasenaNueva.php?id='.$id.'&tipo_usuario='.$tipo_usuario;

                    $mail->send();
                    echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>El mensaje ha sido enviado correctamente.</div>";
                } catch (Exception $e) {
                    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Hubo error al enviar el mensaje:.{$mail->ErrorInfo}</div>";
                }
            }else{
                $mysql->desconectar();
                //impresion de mensajes personalizados
                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../formularioCorreo.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> Numero de documento no existe o incorrecto o tipo de usuario no existe.</div>";
                //redireccion
                header( "refresh:3;url=../formularioCorreo.php" ); 
            }
        }            
    }else{
        //impresion de mensaje personalizado
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../formularioCorreo.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se han enviado todos los datos.</div>";
        //redireccion
        header( "refresh:3;url=../formularioCorreo.php" ); 
        
    }
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>

