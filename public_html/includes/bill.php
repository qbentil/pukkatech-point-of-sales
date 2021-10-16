
<?php
session_start();
include_once "../fpdf/fpdf.php";
include_once "../includes/DBoperation.php";
if(isset($_GET['orderDate']) && isset($_GET['invoice_no']) && $_GET['customerName'] != ""){
    $obj = new DBOperation();
    $rows = $obj->getUserData("users", $_GET['vendor']);
    foreach ($rows as $vendor ) {
        $v_name = $vendor['first_name']." ".$vendor['last_name'];
    }
   $pdf = new FPDF("P", 'mm', array(85,150));
   $pdf->AddPage();
    // $pdf->SetFillColor(0,0,0);
    $pdf->Image('../images/Pukka-logo-04.png',20,-6,40);
        $pdf->Cell(0,10,"",0,1);
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(65, 5, "INVENTORY MANAGEMENT SYSTEM", 0,1,"C");
    $pdf->Cell(50,2,"",0,1);
    // $pdf->Cell(50,10,"",0,1);
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(40, 5, "Order Date", 0,0);
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(40, 5, ": ".$_GET['orderDate'], 0,1);
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(40, 5, "Vendor", 0,0);
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(40, 5, ": ".$v_name, 0,1);
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(40, 5, "Customer Name", 0,0, "L");
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(40, 5, ": ". $_GET['customerName'], 0,1, "L");
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(40, 5, "Customer Phone", 0,0, "L");
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(40, 5, ": ". $_GET['customer_phone'], 0,1, "L");
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(40, 5, "Invoice No.", 0,0, "L");
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(40, 5, ": ". $_GET['invoice_no'], 0,1, "L");
    $pdf->Cell(50, 2, "", 0,1);
    // $pdf->Cell(50,10,"",0,1);
    

    $pdf->SetFont("Arial", "U", 8);
    $pdf->Cell(65,5,"INVOICE DETAILS",0,1, "C");
        // $pdf->Cell(50,10,"",0,1);
    $pdf->SetFont("Arial", null, 7);
    $pdf->Cell(5,5,"#",0,0,"L");
	$pdf->Cell(20,7,"Item Name",0,0,"C");
	$pdf->Cell(15,7,"Quantity",0,0,"L");
	$pdf->Cell(15,7,"Price",0,0,"L");
	$pdf->Cell(15,7,"Total (GHC)",0,1,"L");

	for ($i=0; $i < count($_GET["pid"]) ; $i++) { 
        $pdf->Cell(5,5, ($i+1) ,0,0,"L");
        $pdf->SetFont("Arial", null, 6);
        $pdf->Cell(20,5, $_GET["pro_names"][$i],0,0,"L");
        $pdf->SetFont("Arial", null, 7);
		$pdf->Cell(15,5, $_GET["qty"][$i],0,0,"L");
		$pdf->Cell(15,5, $_GET["uPrice"][$i],0,0,"L");
		$pdf->Cell(15,5, ($_GET["qty"][$i] * $_GET["uPrice"][$i]) ,0,1,"L");
	}

    $pdf->Cell(50,3,"",0,1);
    

    $pdf->SetFont("Arial", "U", 8);
    $pdf->Cell(65,5,"SUMMARY",0,1, "C");


    $pdf->SetFont("Arial", null, 8);
	$pdf->Cell(25,5,"Sub Total",0,0);
	$pdf->Cell(25,5,": GHC".$_GET["sub_total"],0,1);
	// $pdf->Cell(50,10,"Gst Tax",0,0);
	// $pdf->Cell(50,10,": ".$_GET["gst"],0,1);
	$pdf->Cell(25,5,"Discount",0,0);
	$pdf->Cell(25,5,": ".$_GET["discount"]."%",0,1);
	$pdf->Cell(25,5,"Net Total",0,0);
	$pdf->Cell(25,5,": GHC".$_GET["net_total"],0,1);
	// $pdf->Cell(50,10,"Paid",0,0);
	// $pdf->Cell(50,10,": ".$_GET["paid"],0,1);
	// $pdf->Cell(50,10,"Due Amount",0,0);
	// $pdf->Cell(50,10,": ".$_GET["due"],0,1);
	$pdf->Cell(25,5,"Payment Type",0,0);
	$pdf->Cell(25,5,": ".$_GET["payment_method"],0,1);


	$pdf->Cell(65,3,"Signature:",0,1,"R");
	$pdf->Cell(65,3,"_________",0,1,"R");

    // $pdf->SetY(-25);
    // $pdf->Cell(25,5,"",0,1);
    // $pdf->Cell(25,5,"",0,1);
    $pdf->SetFont('Arial','I',5);
    $pdf->Cell(65,5,'Copyright '.Date("Y").' Pukka Web Services. All Rights Reserved.',0,0,'C');
	$pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET['invoice_no'].".pdf", "I");
//    $pdf->Output();
}
