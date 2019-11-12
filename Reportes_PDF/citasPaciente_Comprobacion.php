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

		if(!empty($_POST['pacientes']) && isset($_POST['pacientes']))
		{
			require '../Modelo/MySQL.php';

			$documentoPaciente = $_POST['pacientes'];

			$mysql = new MySQL();
			$mysql->conectar();

			$id_usuario = $mysql->efectuarConsulta("
				SELECT id_usuario, CONCAT(nombre_completo, ' ',apellidos) AS 'paciente' 
				FROM clinica_cotecnova.usuarios 
				WHERE numero_documento = ".$documentoPaciente);

			$mysql->desconectar();

			while($resultado = mysqli_fetch_assoc($id_usuario))
			{
			    $idUsuario = $resultado['id_usuario']; 
			    $nombre = $resultado['paciente'];
			}    

            if($_GET['value'] == 1)
            {
            	header("refresh:3;url=citasPaciente.php?id=$idUsuario&name=$nombre");
            }
            else if($_GET['value'] == 2)
            {
            	header("refresh:3;url=../Controlador/citasPaciente_Excel.php?id=$idUsuario&name=$nombre");
            }
			
			
		}else
		{
			echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../reportes.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> No se han enviado todos los datos necesarios.</div>";
		    
		    //redireccion
		    header("refresh:3;url=../reportes.php");
		}

		?>
		
	</div>
	<!-- Llamado de los respectivos scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>