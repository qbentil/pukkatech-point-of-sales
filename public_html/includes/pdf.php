<?php 
require('../fpdf/fpdf.php');

class Invoice extends FPDF{

    function Header(){
        $this->SetFont('Arial','B',24);
        $this->Cell(60);
        $this->Cell(60,10,'XYZ ENTERPRISES');
        $this->Ln(10);
        $this->Line(0,20,$this->GetPageWidth(),20);
        $this->Ln(10);
        $this->SetFont('Arial','B',14);
        $this->Cell(70);
        $this->Cell(60,10,'PURCHASE ORDER',1,1,'C',true);
        $this->Image('../images/Pukka-Logo-03.png',95,45,20);
        $this->Ln(10);
    }

    function add_from($str){
        $this->SetFont('Arial','',10);
        $this->setXY(10,50);
        $this->Cell(70,7,'From',1,2,'L',true);
        $this->MultiCell(70,8,$str,'LRB',1);
    }

    function add_to($str){
        $x = $this->GetX();
        $this->setXY($x+120,50);
        $this->Cell(60,7,'To',1,2,'L',true);
        $y = $this->GetY();
        $this->MultiCell(60,8,$str,'LRB',1);
        $this->Ln(10);
    }

    function add_order_detail($rdate,$cur){
        $this->Cell(50);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->setXY($x,$y);
        $this->Cell(50,7,'Order date',1,2,'L',true);
        $this->Cell(50,8,$rdate,'LRB',1);
        $this->setXY($x+50,$y);
        $this->Cell(40,7,'Currency',1,2,'L',true);
        $this->Cell(40,8,$cur,'LRB',1);
        $this->Ln(10);
    }

    function populate_table($data){
        $x=$this->GetX();
        $y=$this->GetY();
        $this->setXY($x,$y);
        $this->Cell(20,7,'S.No.',1,2,'L',true);
        $this->setXY($x+20,$y);
        $this->Cell(50,7,'Item Name',1,2,'L',true);
        $this->setXY($x+70,$y);
        $this->Cell(30,7,'Company',1,2,'L',true);
        $this->setXY($x+100,$y);
        $this->Cell(20,7,'Qty.',1,2,'L',true);
        $this->setXY($x+120,$y);
        $this->Cell(30,7,'Unit Price',1,2,'L',true);
        $this->setXY($x+150,$y);
        $this->Cell(30,7,'Total Price',1,2,'L',true);
        $i=1;
        $total=0;
        foreach($data as $d){
            $price = $d["price"]*$d["quantity"];
            $this->Ln(0);
            $x=$this->GetX();
            $y=$this->GetY();
            $this->setXY($x,$y);
            $this->Cell(20,7,$i,1,2,'L');
            $this->setXY($x+20,$y);
            $this->Cell(50,7,$d["name"],1,2,'L');
            $this->setXY($x+70,$y);
            $this->Cell(30,7,$d["company"],1,2,'L');
            $this->setXY($x+100,$y);
            $this->Cell(20,7,$d["quantity"],1,2,'L');
            $this->setXY($x+120,$y);
            $this->Cell(30,7,$d["price"],1,2,'L');
            $this->setXY($x+150,$y);
            $this->Cell(30,7,$price,1,2,'L');
            $total += $price;
            $i++;
        }
        $this->Ln(0);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->setXY($x+120,$y);
        $this->Cell(30,7,'Grand Total',1,2,'C',true);
        $this->setXY($x+150,$y);
        $this->Cell(30,7,round($total,2),1,2,'L');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Copyright 2018 XYZ Enterprises. All Rights Reserved.',0,0,'C');
    }
}

?>