<?php
  //include el archivo mysql
  require_once '../Modelo/MySQL.php';
  //Nuevo archivo MySql
  $mysql = new MySQL;
  //llamado de la funcion
  $mysql->crearBackup();
?>