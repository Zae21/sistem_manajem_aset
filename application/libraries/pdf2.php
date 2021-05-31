<?php
if(! defined ('BASEPATH')) exit ('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
	function __construct()
	{
		parent::__construct();
	}

	public function Footer() {
		$this->writeHTML("<hr>", true, false, false, false, '');
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 5, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}