<?php
if(isset($_POST['name']) && isset($_POST['tome']) && isset($_POST['name_tome']) && isset($_POST['id'])){			

header('Refresh: 0.5; url=../../../../index.php/livre/index');

if(isset($_POST['achat'])){	
	$dbConnexion = new PDO("mysql:host=rhidfriwfwrhiddb.mysql.db;dbname=rhidfriwfwrhiddb","rhidfriwfwrhiddb","J52mAc2g58");
	//$dbConnexion = Yii::app()->db->createCommand()

	$st = $dbConnexion->prepare("INSERT INTO Livre_achete (id_user, id_livre) VALUES('".$_POST['id']."', '".$_POST['tome']."')");
	$st->execute();
}

// Include the main TCPDF library and TCPDI.
require_once('../tcpdf.php');
require_once('../tcpdi-master/tcpdi.php');

// Create new PDF document.
$pdf = new TCPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Add a page from a PDF by file path.
$pdf->SetHeaderData("", "", "".$_POST['name']."", "", array(0,64,255), array(0,64,128));
$pdf->AddPage();

$pdf->setSourceFile('../../../../DL/Tome '.$_POST['tome'].' DEMO.pdf');
//$pdf->setSourceFile('../../../../DL/Tome 15.pdf');

$idx = $pdf->importPage(1, '/MediaBox');
$pdf->useTemplate($idx);

$pdfdata = file_get_contents('../../../../DL/Tome '.$_POST['tome'].' DEMO.pdf'); // Simulate only having raw data available.
//$pdfdata = file_get_contents('../../../../DL/Tome 15.pdf'); // Simulate only having raw data available.
$pagecount = $pdf->setSourceData($pdfdata); 
for ($i = 1; $i <= $pagecount; $i++) { 
    $tplidx = $pdf->importPage($i, '/MediaBox');
    $pdf->AddPage();
    $pdf->useTemplate($tplidx); 
}

$pdf->Output("".$_POST['name_tome'].".pdf", "D");
}

?>