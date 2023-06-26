<?php       
error_reporting(E_ALL);
// include autoloader
ob_start();
require 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'portrait');
//$dompdf->setPaper('A4', 'landscape');
ob_start();
require('file.php');
$html=ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render('file.pdf',['Attachment'=>false]);

//For view
$dompdf->stream();
// for download
//$dompdf->stream("sample.pdf");

?>

