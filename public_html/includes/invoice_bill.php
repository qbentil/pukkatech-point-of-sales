
<?php
// include_once "../fpdf/fpdf.php";
if(isset($_GET['orderDate']) && isset($_GET['vendor'])){
    // session_start(); 
    require('pdf.php');
    $data =array(
        "price" => 50,
        "name" => "Orange",
        "quantity" => 3,
        "company" => "Pukka",
    );
    $pdf = new Invoice();
    $pdf->SetFillColor(214,214,214);
    $pdf->AddPage();
    $pdf->add_from("XYZ Enterprises\nabc street,PO 8976\nTel:9876567891");
    $pdf->add_to("ABC Enterprises\ndef street,PO 8975\nTel:9876567756");
    $pdf->add_order_detail(date("Y-m-d"),'GHC');
    $pdf->populate_table($data);
    $pdf->Output();
}