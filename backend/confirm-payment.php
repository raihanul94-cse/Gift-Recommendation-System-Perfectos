<?php 
require("../fpdf/fpdf.php");
include '../database/db_con.php';
session_start();
$user = $_SESSION['cust_name'];
$Address = $_SESSION['address'];
$Country = "Bangladesh";
$Phone = $_SESSION['contact'];
$Date = date("Y-m-d");
$Customer_ID = $_SESSION['cust_id'];
$Invoice = $_GET['oid'];
$query=mysqli_query($con,"SELECT * FROM ORDERED_ITEM WHERE order_id='$Invoice'");
$getCustInfo=mysqli_query($con,"SELECT * FROM CUSTOMER WHERE cust_id='{$Customer_ID}'");
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetTitle($user);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(130,5,'PERFECTOS',0,0);
$pdf->Cell(59,5,'INVOICE',0,1);

$pdf->SetFont('Arial','',12);
$pdf->Cell(130,5,'Bannai, Road 16',0,0);
$pdf->Cell(59,5,'',0,1);

$pdf->Cell(130,5,'Dhaka, Bangladesh 1230',0,0);
$pdf->Cell(25,5,'Date',0,0);
$pdf->Cell(34,5,date("d-M-Y"),0,1);

$pdf->Cell(130,5,'Phone [+880123456789]',0,0);
$pdf->Cell(25,5,'#Invoice',0,0);
$pdf->Cell(34,5,$Invoice,0,1);

$pdf->Cell(130,5,'Fax [+880123456789]',0,0);
$pdf->Cell(25,5,'Customer ID',0,0);
$pdf->Cell(34,5,$Customer_ID,0,1);

$pdf->Cell(130,5,'',0,0);
$pdf->Cell(25,5,'Currency',0,0);
$pdf->Cell(34,5,'BDT',0,1);

$pdf->Cell(189,10,'--------------------------------------------------------------------------------------------------------------------------------------',0,1);

$pdf->Cell(189,10,'',0,1);

$pdf->Cell(92,5,'Bill to',0,0);
$pdf->Cell(89,5,'Shipped to',0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$user,0,0);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(79,5,$user,0,1);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$Address,0,0);

$pdf->Cell(10,5,'',0,0);
$pdf->Cell(79,5,$Address,0,1);


$pdf->Cell(10,5,'',0,0);
$pdf->Cell(90,5,$Phone,0,0);
$pdf->Cell(10,5,'',0,0);
$pdf->Cell(79,5,$Phone,0,1);

$pdf->Cell(189,10,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(130,5,'Drescription',1,0);
$pdf->Cell(35,5,'Price Per Unit',1,0);
$pdf->Cell(25,5,'Quantity',1,1);

$pdf->SetFont('Arial','',12);

$subtotal=0;
$temp;
$deliverycharge=100;
while($row = mysqli_fetch_array($query)){
	$pdf->Cell(130,5,$row['product_name'],1,0);
	$pdf->Cell(35,5,$row['price'],1,0);
	$pdf->Cell(25,5,$row['quantity'],1,1);
	$temp = $row['price'] * $row['quantity'];
	$subtotal=$subtotal+$temp;
}

$pdf->Cell(130,5,'Subtotal',1,0,'R');
$pdf->Cell(60,5,$subtotal.".00",1,1);

$pdf->Cell(130,5,'Aditional Amount',1,0,'R');
$pdf->Cell(60,5,$subtotal*.02.".00",1,1);

$pdf->Cell(130,5,'Delivery Charge',1,0,'R');
$pdf->Cell(60,5,$deliverycharge.".00",1,1);

$pdf->Cell(130,5,'Total Paid',1,0,'R');
$pdf->Cell(60,5,$subtotal+($subtotal*0.02)+$deliverycharge.".00",1,1);


$pdf->Output('D',$user.'?CID='.$Customer_ID.'.pdf',true);
?>
