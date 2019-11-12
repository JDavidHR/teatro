<?php
	//Incluimos librería y archivo de conexión
	require '../excel/Classes/PHPExcel.php';
	//llamado al archivo mysql
	require_once '../Modelo/MySQL.php';
	//Nuevo archivo MySql
	$mysql = new MySQL;
	//funcion conectar
    $mysql->conectar();
    
    session_start(); 

    $idMedico = $_SESSION['idMedico'];

        //Consultar para traer datos de la tabla citas
	$datos = $mysql->efectuarConsulta("
        SELECT citas.id_cita, citas.fecha_hora, citas.motivo_consulta, 
	CONCAT(usuarios.nombre_completo, ' ',usuarios.apellidos) AS 'paciente', 
	CONCAT(medicos.nombre_completo, ' ',medicos.apellidos) AS 'medico'
	FROM citas 
	INNER JOIN usuarios ON usuarios.id_usuario = citas.usuario_id 
	INNER JOIN medicos ON medicos.id_medico = citas.medico_id 
	WHERE medicos.id_medico = ".$idMedico."");
        
        /*while($resultado = mysqli_fetch_assoc($datos))
        {
            $medico = $resultado['medico'];
        }*/

	$mysql->desconectar();

	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../img/logo.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Natalia Agudelo")->setDescription("Reporte de Citas de medico");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Citas de Medico");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));

	
	$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:E6')->applyFromArray($estiloTituloColumnas);
        
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'CITAS DE MEDICO');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
        
        
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
            $objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $objPHPExcel->getActiveSheet()->setCellValue('B6', 'PACIENTE');
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
            $objPHPExcel->getActiveSheet()->setCellValue('D6', 'FECHA_HORA');
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $objPHPExcel->getActiveSheet()->setCellValue('E6', 'MOTIVO_CONSULTA');
            
            //Recorremos los resultados de la consulta y los imprimimos
            while($rows = mysqli_fetch_assoc($datos)){

                    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['id_cita']);
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['paciente']);
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['fecha_hora']);
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['motivo_consulta']);

                    $fila++; //Sumamos 1 para pasar a la siguiente fila
            }
            
            $fila = $fila-1;
	
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:E".$fila);

            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="citas_medico.xlsx"');
            header('Cache-Control: max-age=0');
        
        
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');
	//$writer->save('php://output');
?>