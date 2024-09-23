<?php
require_once('tcpdf/tcpdf.php');

if (isset($_GET['name'])) {
    $name = $_GET['name'];

} else {
    echo "Name parameter not found.";
}
$html = file_get_contents('certificate_template.html');
$currentDate = date('F d,Y');
$html = str_replace('{{NAME}}', $name, $html); 
$html = str_replace('{{DATE}}', $currentDate, $html);

// Create new TCPDF instance
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetFont('brushscriptmtkursiv','',14,'',true);
// Set document properties
$pdf->SetCreator('BDMS');
$pdf->SetAuthor('BDMS');
$pdf->SetTitle('Certificate');
$pdf->SetSubject('Certificate');
$pdf->SetKeywords('Certificate, BDMS');

// Set default header and footer data
$pdf->SetHeaderData('', 0, '', '', array(0,0,0), array(255,255,255));
$pdf->setFooterData(array(0,0,0), array(255,255,255));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont('courier');

// Set margins
$pdf->SetMargins(10, 10, 10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Write the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// Set the path to save the certificate

$filename = $_GET['name'] . '_' . date('Y-m-d_H-i-s') . '.pdf';

// Save the certificate file on the server
$pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/BDMS/certificates/' . $filename, 'F');
header("Location: success_download_certificate.php?filename=" . urlencode($filename));
exit;
?>
