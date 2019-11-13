<?php
//condicion para ver si los campos estan vacios
if(isset($_POST['sesion']) && !empty($_POST['doc']) && !empty($_POST['pass'])){

    require_once '../Modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables con el metodo post
    $documento = $_POST['doc'];
    $pass = $_POST['pass'];
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//funcion llamada desde mysql.php
    
    //consulta donde hace la comparacion de lo que el usuario ingresa con lo almacenado en la base de datos
    $usuarios = $mysql->efectuarConsulta("SELECT teatro.administradores.numero_documento,teatro.administradores.password FROM teatro.administradores WHERE teatro.administradores.numero_documento='".$documento."' && teatro.administradores.password='".$pass."'");
    
    $mysql->desconectar();//funcion llamada desde mysql.php
}


    
//condicion donde si la consulta encuentra el valor ingresado, es decir si no encuentra nada el valor sera 0 y si encuentra algo sera 1
 if (mysqli_num_rows($usuarios) > 0){
     
     require_once '../Modelo/usuarios2.php';//se llama la pagina donde se estan almacenando los usuarios ingresados
       $mysql->conectar();//funcion llamada desde mysql.php
        session_start();//inicio de sesion

        $usuario = new Usuario();//declaracion del nuevo array
        //este while hace lo mismo que el foreach, recorre los datos
 while ($resultado= mysqli_fetch_assoc($usuarios)){
        $documento= $resultado["numero_documento"];

        $pass=  $resultado["password"];
    
             $usuario->setdocumento($documento); //llama el metodo del documento usuarios
             
             $usuario->setpass($pass);//llama el metodo del documento usuarios
       }
       //declaracion de variables
        $_SESSION['usuario'] = $usuario;
        $_SESSION['acceso'] = true; //variable logica
         
        header("Location: ../index.php");//ubicacion si el usuario ingresado existe
       

        
    }
    else{
     header("Location: ../login_teatro.php"); //ubicacion si el usuario ingresado no existe

    }


?>