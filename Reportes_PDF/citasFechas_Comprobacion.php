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

		if(!empty($_POST['date1']) && isset($_POST['date1']) && !empty($_POST['date2']) && isset($_POST['date2']))
		{
                        require '../Modelo/MySQL.php';

			$fecha1 = $_POST['date1'];
			$fecha2 = $_POST['date2'];
                        
                        if($fecha1 <= $fecha2)
                        {
                            header("refresh:3;url=citasFechas.php?f1=$fecha1&f2=$fecha2");
                        }
                        else{
                            echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../reportes.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> Rango de fecha incorrecto.</div>";
		    
                            //redireccion
                            header("refresh:3;url=../reportes.php");
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