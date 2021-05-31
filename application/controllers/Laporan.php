<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->load->library('Pdf');
		$this->load->model('m_laporan');		
	}
	
	public function sewa()
	{
		$this->load->view('laporan/view_laporan_sewa');
	}
	
	public function proses_sewa()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Sewa</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;">ID Sewa</th>						
						<th style="border:1px solid #000;" width="90px">ID Customer</th>
						<th style="border:1px solid #000;" width="100px">Tanggal Transaksi</th>
						<th style="border:1px solid #000;" width="100px">Down Payment</th>
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_sewa($startdate,$enddate)->result();
		$result = $this->m_laporan->total($startdate,$enddate)->result();
		foreach($data as $row){
		$table .= '<tr align="center">
						<td style="border:1px solid #000;" width="30px">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_sewa.'</td>						
						<td style="border:1px solid #000;">'.$row->id_customer.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_transaksi.'</td>
						<td style="border:1px solid #000;">'.$row->dp.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 30, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 125, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40">';		
		$table .= '<tr align="center">
						<td>( Pimpinan )</td>
						<td>( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 30, '',$table, 0, 1, 0, true, 'C', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_sewa'.$date_create.'.pdf', 'I');
	}
	
	public function pembayaran()
	{
		$this->load->view('laporan/view_laporan_pembayaran');
	}
	
	public function proses_pembayaran()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Pembayaran</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Pembayaran</th>						
						<th style="border:1px solid #000;" width="90px">ID Sewa</th>
						<th style="border:1px solid #000;" width="80px">Tanggal Bayar</th>
						<th style="border:1px solid #000;">Jumlah Bayar</th>
						<th style="border:1px solid #000;">Jenis Bayar</th>
						<th style="border:1px solid #000;">Status</th>
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_pembayaran($startdate,$enddate)->result();
		$result = $this->m_laporan->total_pembayaran($startdate,$enddate)->result();
		foreach($data as $row){
		$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_pembayaran.'</td>						
						<td style="border:1px solid #000;">'.$row->id_sewa.'</td>
						<td style="border:1px solid #000;">'.$tgl_bayar.'</td>
						<td style="border:1px solid #000;">'.$row->jumlah_bayar.'</td>
						<td style="border:1px solid #000;">'.$row->jenis_bayar.'</td>
						<td style="border:1px solid #000;">'.$row->status.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_pembayaran'.$date_create.'.pdf', 'I');
	}
	
}