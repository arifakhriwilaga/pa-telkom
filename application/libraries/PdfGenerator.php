<?php
 
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);

    require_once APPPATH.'vendor/dompdf/dompdf/lib/html5lib/Parser.php';
		require_once APPPATH.'vendor/dompdf/dompdf/src/Autoloader.php';
    // require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
		// require_once APPPATH.'vendor/dompdf/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
		// require_once APPPATH.'vendor/dompdf/dompdf/lib/php-svg-lib/src/autoload.php';
 
    $dompdf = new Dompdf();
    // $options = new Options();
		// $options->set('isRemoteEnabled', TRUE);
		$dompdf->set_option('isRemoteEnabled', TRUE);
		// $dompdf = new Dompdf($options);
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));

  }
}