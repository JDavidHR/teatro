<?php

//Llamar clases PDF y MySQL
require '../Modelo/PDF_MC_Table.php';
require '../Modelo/MySQL.php';

//Instanciar clases PDF y MySQL
$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL();

$mysql->conectar(); //Conectar a BD

//Consulta para actualizar estado de las citas cuando ya hayan caducado
$mysql->efectuarConsulta("UPDATE clinica_cotecnova.citas SET citas.estado = 0 WHERE citas.fecha_hora < DATE_FORMAT(NOW(),'%Y-%m-%d')");

//Consultar para traer datos de la tabla citas inactivas
$datos = $mysql->efectuarConsulta("
	SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta,
	CONCAT(usuarios.nombre_completo, ' ',usuarios.apellidos) AS 'paciente',
	CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
	FROM citas 
	INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id  
	INNER JOIN medicos ON medicos.id_medico = citas.medico_id
	WHERE citas.estado = 0 AND citas.fecha_hora < DATE_FORMAT(NOW(),'%Y-%m-%d')");

$mysql->desconectar(); //Desconectar de BD

//Titulo del documento
$titulo = 'Reporte de citas vigentes'; 
$pdf->SetTitle($titulo); 

$pdf->AddPage(); //Añadir pagina al documento
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(15,75,75,55,60)); //anchos de columna
$pdf->SetLineHeight(10); //altura de línea
$pdf->SetAligns(Array('C','','','','')); //alineaciones de columnas

//Header
$pdf->SetFont('Arial','B',14);
$pdf->Cell(15,10,"ID",1,0,'C');
$pdf->Cell(75,10,'Paciente',1,0);
$pdf->Cell(75,10,'Medico',1,0);
$pdf->Cell(55,10,'Fecha y hora',1,0);
$pdf->Cell(60,10,'Motivo',1,0);

$pdf->Ln(); //Salto de linea

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

$pdf->Output('Reporte_Citas_Vigentes.pdf','I');
//I envía el fichero al navegador con la opción de guardar como...
//D envía el documento al navegador preparado para la descarga