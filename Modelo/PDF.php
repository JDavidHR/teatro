<?php

require '../Reportes_PDF/fpdf/fpdf.php';

class PDF extends FPDF
{
    //Cabecera de página
    function Header() 
    {
        global $titulo; 
        
        $this->Image('../img/logo.png',15,8,50); //Logo
        $this->SetFont('Arial','B',25); //Arial bold 15
        $this->Ln(15); //Salto de línea
        $this->Cell(100); //Movernos a la derecha
        $this->Cell(80,10,$titulo,0,0,'C'); //Titulo
        $this->Ln(30); 
    }
    
    //Pie de página
    function Footer()
    {
        $this->SetY(-15); //Posición: a 1,5 cm del final
        $this->SetFont('Arial','I',8); //Arial italic 8
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C'); //Número de página
    }
    
    //Cargar datos
    /*function LoadData($file)
    {
        //Leer fichero
        $lines = file($file);
        $data = array();
        
        foreach($lines as $line)
        {
            $data[] = explode(';',trim($line));
        }
        return $data;
    }
    
    //Tabla
    function FancyTable($header,$data)
    {
        //Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        //Cabecera
        
        //Anchuras de las columnas
        $w = array(10, 60, 60, 40,40);
        
        for($i=0;$i<count($header);$i++)
        {
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();
        
        //Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        //Datos
        $fill = false;
        
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
            $this->Cell($w[4],6,number_format($row[4]),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        //Linea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }*/
    
    // Tabla simple
    /*function BasicTable($header,$w,$h)
    {
        //Cabecera
        foreach($header as $col)
            $this->Cell($w,$h,$col,1,0,'C');
        $this->Ln();
        
        //Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(50,8,$col,1);
            $this->Ln();
        }
    }*/
}