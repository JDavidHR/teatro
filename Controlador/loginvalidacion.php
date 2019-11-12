<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="col-lg-offset-3 col-lg-6">
<?php
    // valido si existen las variables del login y si estan vacias
    if(isset($_POST['Identificacion']) && isset($_POST['pass']) && isset($_POST['tipousuario']) && 
            !empty($_POST['Identificacion']) && !empty($_POST['pass']) && !empty($_POST['tipousuario']) ){
        //llamo el archivo de conexion de la bd
        require_once '../Modelo/MySQL.php';
        
        //lleno las variables
        $usuario = $_POST['Identificacion'];
        $contra = md5($_POST['pass']);
        $tipousuario = $_POST['tipousuario'];
        //instancio la clase MySQL
        $mysql = new MySQL;
        //llamo la funcion de conectar a la BD
        $mysql->conectar();
        //pregunto si el tipo usuario es 1 = Medico
        if($tipousuario == 1){
            //Consulto si existe un usuario con ese estado
            $ConsultarEstado = $mysql->efectuarConsulta("select clinica_cotecnova.medicos.estado from medicos where  numero_documento = ".$usuario." and contrasena = '".$contra."'");
            //Pregunto si la consulta esta vacia
            if(!empty($ConsultarEstado)){
                //Consulto si el numero de filas es mayor a 0 
                if(mysqli_num_rows($ConsultarEstado) > 0){
                    //recorro el objeto de la consulta
                    while ($resultado = mysqli_fetch_assoc($ConsultarEstado)){
                        //almaceno los resultados en variables
                        $estado = $resultado["estado"];
                    }
                    //si estado es = 1 el usuario esta activo
                    if($estado = 1){
                        //realizo la consulta para ver si existe un usuario en la bd y esta activo
                        $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.medicos.id_medico, clinica_cotecnova.medicos.nombre_completo, clinica_cotecnova.medicos.tipo_Usuario_id  from medicos where  numero_documento = ".$usuario." and contrasena = '".$contra."' and estado = 1"); 
                        //Cuento si la consulta esta vacia
                        if (!empty($usuarios)){
                            //consulto si existen filas en el objeto
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_medico = $resultado["id_medico"];
                                    $nombre = $resultado["nombre_completo"];
                                    $tipo_usuario = $resultado['tipo_Usuario_id'];
                                }
                                // Almaceno las variables en sesiones
                                $_SESSION['idMedico'] = $id_medico;
                                $_SESSION['nombre'] = $nombre;
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                 //redirecciono al index
                                header("Location: ../index.php");
                            }else{
                                //Mesanje de error por si no hay filas en la consulta
                                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                                header( "refresh:3;url=../login.php" );
                            }                                    
                        }else{
                            //Mensaje de error si la consulta esta vacia
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                            header( "refresh:3;url=../login.php" ); 
                        } 
                    }else{
                        //Mensaje de error si el usuario esta desactivado
                        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>El usuario esta inactivo.</div>";
                        header( "refresh:3;url=../login.php" ); 
                    }      
                }else{
                    //Mensaje de error si la consulta del estado no tiene filas
                    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta.</div>";
                    header( "refresh:3;url=../login.php" ); 
                }                    
            }else{
                //Mensaje de error si la consulta del estado esta vacio
                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No existe el usuario.</div>";
                header( "refresh:3;url=../login.php" ); 
            }            
           //pregunto si el tipo usuario es 2 = paciente 
        }else if($tipousuario == 2){
            //Consulto si existe un usuario con ese estado
            $ConsultarEstado = $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.estado from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."'"); 
            //Pregunto si esta vacia la consulta
            if(!empty($ConsultarEstado)){
                //Pregunto si la consulta trae un ibjeto con filas
                if(mysqli_num_rows($ConsultarEstado) > 0){
                    //Recorro la consulta
                    while ($resultado = mysqli_fetch_assoc($ConsultarEstado)){
                        //almaceno los resultados en variables
                        $estado = $resultado["estado"];
                    }
                    //si estado es = 1 el usuario esta activo
                    if($estado = 1){
                        //realizo la consulta para ver si existe un usuario en la bd y esta activo
                        $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.id_usuario, clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.tipo_Usuario_id from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."' and estado = 1 "); 
                        //Cuento si la consulta de $usuarios esta vacia
                        if (!empty($usuarios)){ 
                            //Pregunto si el objeto tiene filas
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_usuario = $resultado["id_usuario"];
                                    $nombre = $resultado["nombre_completo"];
                                    $tipo_usuario = $resultado['tipo_Usuario_id'];
                                }
                                // alamceno las variables en sesiones
                                $_SESSION['idUsuario'] = $id_usuario;
                                $_SESSION['nombre'] = $nombre;
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                 //redirecciono al index
                                header("Location: ../index.php");
                            }else{
                                //Mensaje de error por si no hay filas en el objeto
                                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                                header( "refresh:3;url=../login.php" ); 
                            }                                    
                        }else{
                            //Mensaje de error si la consulta esta vacia
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta o esta inactivo.</div>";
                            header( "refresh:3;url=../login.php" ); 
                        } 
                    }else{
                        //Mensaje de error si el usuario esta inactivo
                        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>El usuario esta inactivo.</div>";
                        header( "refresh:3;url=../login.php" ); 
                    }      
                }else{
                    //Mensaje de error si no hay filas en el objeto 
                    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Usuario o contraseña incorrecta.</div>";
                    header( "refresh:3;url=../login.php" ); 
                }                    
            }else{
                //Mensaje de error si la consulta esta vacia
                echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No existe el usuario.</div>";
                header( "refresh:3;url=../login.php" ); 
            }
        }else{
            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>Este tipo de usuario no existe.</div>";
            header( "refresh:3;url=../login.php" );
        }
        //Desconecto la conexion de la bD
        $mysql->desconectar();          
    }else{
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../login.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se enviaron los datos.</div>";
        header( "refresh:3;url=../login.php" );
    }   
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
    
    

