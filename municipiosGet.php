<?php
//llamado del archivo mysql
    require_once 'Modelo/MySQL.php';
    //creacion de nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    //se asigna el id enviado anteriormente en una variable
    $id_departamento =$_REQUEST['id_departamento'];
    //respectiva consulta
    $municipios = $mysql->efectuarConsulta("SELECT * FROM ciudades WHERE departamento_id = '.$id_departamento.'");
    //funcion desconectar
    $mysql->desconectar();
    //se imprime el mensaje en el select
    echo '<option value = "">Selecciona una ciudad</option>';
    //ciclo while que nos sirve para traer los datos del while
    while ($resultado= mysqli_fetch_assoc($municipios)){
    //Se traen los datos y se imprimen en las opciones del select -->
        echo '<option value = "'.$resultado['id_ciudad'].'">'.$resultado['nombre'].'</option>'; 
    }                       
?>