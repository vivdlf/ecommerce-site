<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
// Require FPDF class
require("fpdf/fpdf.php");
$lol = $_POST["button"];
// Instantiate and use the FPDF class 
$pdf = new FPDF();
$date  = date("D M d Y");
$totalItem;
//Add a new page
$pdf->AddPage();

// Set font format and font-size
$pdf->SetFont('Arial', '', 8);

$pdf->Cell(55, 5, 'Reference Code', 0, 0);
$pdf->Cell(58, 5, ': 026ETY', 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(52, 5, ': '.$date, 0, 1);

$pdf->Cell(55, 5, 'Amount', 0, 0);
$temp = $_SESSION["Total"];
//var_dump($temp);
foreach ($temp as $key => $value) {
    if ($key == "Total Number of Items")
    $totalItem = $value;
}
//var_dump($totalItem);
$pdf->Cell(58, 5, ': '. $totalItem, 0, 0);
$pdf->Cell(25, 5, 'Channel', 0, 0);
$pdf->Cell(52, 5, ': WEB', 0, 1);

$pdf->Cell(55, 5, 'Status', 0, 0);
$pdf->Cell(58, 5, ': Complete', 0, 1);

$pdf->Line(10,30,200,30);

$pdf->Ln(10);
// $pdf->Cell(55, 5, 'Product Title', 0, 0);
// $pdf->Cell(58, 5, ': ', 0, 1);

$temp = $_SESSION["Items"];

foreach ($temp as $key => $value) {
    //echo $value->Title;
    $pdf->Cell(55, 5, 'Product Title', 0, 0);
    $pdf->Cell(58, 5, ': ' . $value->Title  , 0, 0);
    $pdf->Cell(25, 5, 'Qty', 0, 0);
    $pdf->Cell(52, 5, ': '. $value->Amount, 0, 1);
    $pdf->Cell(55, 5, ' ', 0, 0);
    $pdf->Cell(58, 5, '', 0, 0);
    $pdf->Cell(25, 5, 'Price', 0, 0);
    $pdf->Cell(52, 5, ': ' . $value->Price * $value->Amount, 0, 1);
   

}
$pdf->Ln(10);

$temp = $_SESSION["Total"];
$subtotal;
foreach ($temp as $key => $value) {
    if ($key == "Cart Subtotal")
        $subtotal= $value;
}
$pdf->Cell(55, 5, 'Merchandise Subtotal', 0, 0);
$pdf->Cell(58, 5, ': ' . $subtotal, 0, 1);

$temp = $_SESSION["Total"];
$tax;
foreach ($temp as $key => $value) {
    if ($key == "Cart Tax")
        $tax= $value;
}

$pdf->Cell(55, 5, 'Tax (GST)', 0, 0);
$pdf->Cell(58, 5, ': ' . $tax, 0, 1);

$temp = $_SESSION["Total"];
$total;
foreach ($temp as $key => $value) {
    if ($key == "Cart Total")
        $total =  $value;
}
$pdf->Cell(55, 5, 'Merchandise Total', 0, 0);
$pdf->Cell(58, 5, ': '.$total, 0, 1);

$pdf->Line(10, 60, 200, 60);

$pdf->Ln(10);
// $pdf->Cell(55, 5, 'Paid By', 0, 0);
// $pdf->Cell(58, 5, ': ', 0, 1);

// $pdf->Line(155, 75, 195, 75);
// $pdf->Ln(5);
// $pdf->Cell(140,5,'',0,0);
// $pdf->Cell(50,5, ': Signature', 0,1, 'C');
// return the generated output
if($pdf->Output('D', 'receipt.pdf')){

}




?>