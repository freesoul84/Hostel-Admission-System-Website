<?php
include("database.php");
$database=new Database();
$result = $database->runQuery("SELECT * FROM fymeritlist");
$header = $database->runQuery("SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='malaygiri_hostel' 
    AND `TABLE_NAME`='fymeritlist'");

require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(26,4,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',8);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(26,4,$column,1);
}
$pdf->Output();
?>