<?php
//Llamar clases PDF y MySQL
require '../Modelo/PDF_MC_Table.php';
require '../Modelo/MySQL.php';

//Instanciar clases PDF y MySQL
$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL();

$fecha1 = $_GET['f1'];
$fecha2 = $_GET['f2'];

$mysql->conectar(); //Conectar a BD

$datos = $mysql->efectuarConsulta("
	SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta,
	CONCAT(usuarios.nombre_completo, ' ',usuarios.apellidos) AS 'paciente',
	CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
	FROM citas 
	INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id  
	INNER JOIN medicos ON medicos.id_medico = citas.medico_id
	WHERE DATE_FORMAT(citas.fecha_hora,'%Y-%m-%d') BETWEEN '".$fecha1."' AND '".$fecha2."'");

$mysql->desconectar(); //Desconectar de BD

$fecha_1 = date_create($fecha1);
$fecha_2 = date_create($fecha2);

//Titulo del documento
$titulo = 'Citas desde '.date_format($fecha_1,'d-m-Y').' hasta '.date_format($fecha_2,'d-m-Y'); 
$pdf->SetTitle($titulo);

$pdf->AddPage(); //Añadir pagina al documento
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(15,75,75,55,60)); //anchos de columna
$pdf->SetLineHeight(10); //altura de línea
$pdf->SetAligns(Array('C','','','','')); //alineaciones de columnas

//Header
$pdf->SetFont('Arial','B',14);
$pdf->Cell(15,10,'ID',1,0,'C');
$pdf->Cell(75,10,'Paciente',1,0);
$pdf->Cell(75,10,'Medico',1,0);
$pdf->Cell(55,10,'Fecha y hora',1,0);
$pdf->Cell(60,10,'Motivo',1,1);
$pdf->SetFont('Arial','',14);
	

//Ciclo para recorrer datos de la tabla
foreach($datos as $item)
{
    $pdf->Row(Array(
        utf8_decode($item['id_cita']),
        utf8_decode($item['paciente']),
        utf8_decode($item['medico']),
        utf8_decode($item['fecha_hora']),
        utf8_decode($item['motivo_consulta']) 
    ));
}

$pdf->AliasNbPages(); //Numeracion de paginas
	
$pdf->Output('Reporte_Citas_Paciente.pdf','I'); 
//I envía el fichero al navegador con la opción de guardar como...
//D envía el documento al navegador preparado para la descarga
?>