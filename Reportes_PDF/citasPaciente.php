<?php
//Llamar clases PDF y MySQL
require '../Modelo/PDF_MC_Table.php';
require '../Modelo/MySQL.php';

//Instanciar clases PDF y MySQL
$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL();

$idUsuario = $_GET['id'];
$paciente = $_GET['name'];

$mysql->conectar(); //Conectar a BD

$datos = $mysql->efectuarConsulta("
	SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta, 
	CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
	FROM citas 
	INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id 
	INNER JOIN medicos ON medicos.id_medico = citas.medico_id 
	WHERE usuarios.id_usuario = ".$idUsuario);

$mysql->desconectar(); //Desconectar de BD

//Titulo del documento
$titulo = 'Citas de '.$paciente; 
$pdf->SetTitle($titulo);

$pdf->AddPage(); //Añadir pagina al documento
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(10,85,75,80)); //anchos de columna
$pdf->SetLineHeight(10); //altura de línea
$pdf->SetAligns(Array('C','','','','')); //alineaciones de columnas

$pdf->Cell(15); //Mover 15 espacios para centrar la tabla

//Header
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10,10,'ID',1,0,'C');
$pdf->Cell(85,10,'Medico',1,0);
$pdf->Cell(75,10,'Fecha y hora',1,0);
$pdf->Cell(80,10,'Motivo',1,1);
$pdf->SetFont('Arial','',14);
	

//Ciclo para recorrer datos de la tabla
foreach($datos as $item)
{
	$pdf->Cell(15);
    $pdf->Row(Array(
        utf8_decode($item['id_cita']),
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