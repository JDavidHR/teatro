<?php

    //llamar al archivo fpdf principa
    require '../Reportes_PDF/fpdf/fpdf.php';

    //crea una nueva clase que extiende la clase fpdf
    class PDF_MC_Table extends FPDF 
    {
        //variable para almacenar anchos y alineaciones de celdas y altura de línea
        var $widths;
        var $aligns;
        var $lineHeight;

        //Cabecera de página
        function Header()
        {
            global $titulo; 

            $this->Image('../img/logo.png',15,8,35); //Logo
            $this->SetFont('Arial','B',25); //Arial bold 15
            $this->Ln(5); //Salto de línea
            $this->Cell(100); //Movernos a la derecha
            $this->Cell(80,10,$titulo,0,0,'C'); //Titulo
            $this->Ln(15); //Salto de línea
        }

        //Pie de página
        function Footer()
        {
            $this->SetY(-15); //Posición: a 1,5 cm del final
            $this->SetFont('Arial','I',8); //Arial italic 8
            $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C'); //Número de página
        }
        
        //Establecer la matriz de anchos de columna
        function SetWidths($w){
            $this->widths=$w;
        }

        //Establecer la matriz de alineaciones de columnas
        function SetAligns($a){
            $this->aligns=$a;
        }

        //Establecer altura de línea
        function SetLineHeight($h){
            $this->lineHeight=$h;
        }

        //Calcular la altura de la fila
        function Row($data)
        {
            //número de línea
            $nb=0;
            
            //realiza un ciclo de cada dato para encontrar el mayor número de línea en una fila.
            for($i=0;$i<count($data);$i++)
            {
                //NbLines calculará cuántas líneas se necesitan para mostrar el texto ajustado en el ancho especificado
                //entonces la función max comparará el resultado con el actual $nb. Retornando el mejor. Y reasignar el $nb
                $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            }

            //echo 'número de línea '.$nb.'<br>';
            
            //multiplica el número de línea por la altura de la línea. 
            //Esta será la altura de la fila actual
            $h = $this->lineHeight * $nb;

            //echo 'altura de la fila actual '.$h.'<br>';
            //echo 'altura de la fila '.$this->lineHeight.'<br>';
            
            //Emita un salto de página primero si es necesario
            $this->CheckPageBreak($h);
            
            //Dibuja las celdas de la fila actual
            for($i=0;$i<count($data);$i++)
            {
                //ancho de la columna actual
                $w=$this->widths[$i];
                
                //alineación de la col actual. si no está configurado, déjelo a la izquierda.
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                
                //Guardar la posición actual
                $x=$this->GetX();
                $y=$this->GetY();
                
                //Dibuja el borde
                $this->Rect($x,$y,$w,$h);
                
                //Imprime el texto
                $this->MultiCell($w,10,$data[$i],0,$a);
                
                //Coloca la posición a la derecha de la celda
                $this->SetXY($x+$w,$y);
            }
            
            //Ir a la siguiente línea
            $this->Ln($h);
        }

        function CheckPageBreak($h)
        {
            //Si la altura h causara un desbordamiento, agregue una nueva página inmediatamente
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }

        function NbLines($w,$txt)
        {
            //calcula el número de líneas que tomará un MultiCell de ancho w
            $cw=&$this->CurrentFont['cw'];
            
            if($w == 0)
                $w = $this->w - $this->rMargin - $this->x;
            
            $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
            
            $s = str_replace("\r",'',$txt);
            
            $nb = strlen($s);
            
            if($nb > 0 and $s[$nb-1] == "\n")
                $nb--;
            
            $sep =- 1;
            $i = 0;
            $j = 0;
            $l = 0;
            $nl = 1;
            
            while($i < $nb)
            {
                $c = $s[$i];
                
                if($c == "\n")
                {
                    $i++;
                    $sep =- 1;
                    $j = $i;
                    $l = 0;
                    $nl++;
                    
                    continue;
                }

                if($c == ' ')
                    $sep=$i;
                
                $l += $cw[$c];
                
                if($l > $wmax)
                {
                    if($sep == -1)
                    {
                        if($i == $j)
                            $i++;
                    }
                    else
                        $i = $sep + 1;
                    
                    $sep = -1;
                    $j = $i;
                    $l = 0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }
    }
?>