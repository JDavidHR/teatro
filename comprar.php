<?php
//llamado al archivo MySQL
require_once 'Modelo/MySQL.php';
//nueva "consulta"
$mysql = new MySQL;
//funcion conectar
$mysql->conectar(); 

$tipo_teatro  =  $mysql->efectuarConsulta ( " SELECT  teatro.tipo_teatro.id, teatro.tipo_teatro.tipo from tipo_teatro " );
$tipo_funcion  =  $mysql->efectuarConsulta ( " SELECT  teatro.tipo_funcion.id, teatro.tipo_funcion.Nombre as tipo_fun from tipo_funcion ");
$tipo_cliente  =  $mysql->efectuarConsulta ( " SELECT  teatro.tipo_cliente.id, teatro.tipo_cliente.Nombre from tipo_cliente " );

$mysql->desconectar(); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style_comprar.css">
    <title>Compra de Ticket</title>
</head>

<body>
    <div class="container" id="advanced-search-form">
        <h2>Compra del Ticket</h2>
        <center><form method="Post" action="Controlador/compra_funcion.php">
            <div class="form-group">
                <label for="first-name">Fecha</label>
                <input type="Date" class="form-control" placeholder="Fecha" id="first-name" name="fecha">
            </div>

            <div class="form-group">
                  <label class="col-md-12">Teatro</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipo_teatro">
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($tipo_teatro)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id']?>"><?php echo $resultado['tipo']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>

            <div class="form-group">
                  <label class="col-md-12">Tipo Funcion</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipo_fun">
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($tipo_funcion)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id']?>"><?php echo $resultado['tipo_fun']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
            
            <div class="form-group">
                  <label class="col-md-12">Tipo Cliente</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="tipo_cliente">
                        <?php 
                         //se recorre el resultado de la consutla de estado civil
                        while ($resultado= mysqli_fetch_assoc($tipo_cliente)){
                           //se imprime los resultados
                           ?> 
                        <option value="<?php echo $resultado['id']?>"><?php echo $resultado['Nombre']?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>
            
            
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-info btn-lg btn-responsive" id="search" name="enviar"> Comprar</button>
        </form></center>
    </div>
</body>

</html>
