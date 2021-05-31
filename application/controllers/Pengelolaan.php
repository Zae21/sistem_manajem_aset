<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Pengelolaan', 'mod');
		$this->load->model('M_Asset');
	}

	public function index()
	{
		$data['title']='Tabel pengelolaan';
		//$data['kodeunik'] = $this->M_pengelolaan->buat_kode();
		$data['result']=$this->mod->tampil_pengelolaan()['result'];
		$data['total_data']=$this->mod->tampil_pengelolaan()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('pengelolaan/pengelolaan_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah Pengelolaan';
		$data['kodeunik'] = $this->mod->buat_kode();	
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$this->parser->parse('pengelolaan/pengelolaan_tambah', $data);
	}

	public function tambah_proses()
	{
		//print_r($this->input->post());die();
		$id_pengelolaan = $this->input->post('id_pengelolaan');
		$data=[
			"id_pengelolaan"	=> $this->input->post('id_pengelolaan'),
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_transaksi"	=> $this->input->post('tgl_transaksi'),
			"peminjam"	=> $this->input->post('peminjam'),
			"status_pengelolaan"	=> $this->input->post('status_pengelolaan'),
			"total_barang"	=> $this->input->post('total_barang'),
			
			
		];
	
		$this->session->set_userdata('user_id');

		//$this->input->post
		$this->mod->tambah_pengelolaan($data);
	    $id_asset = $this->input->post('id_asset');
	    $jumlah = $this->input->post('jumlah');
	    
		for ($i=0; $i <sizeof($id_asset) ; $i++) { 
			$detail = array(
						'id_pengelolaan' => $id_pengelolaan,
		                 'id_asset' => $id_asset[$i],
		                 'jumlah' => $jumlah[$i]
		                 
					  ); 
			$this->mod->tambah_detail($detail);
		}

		redirect(site_url('pengelolaan'));
	}

	public function detail_pengelolaan($id_det_pengelolaan)
	{

		$data=$this->mod->tampil_detail_pengelolaan($id_det_pengelolaan);
		echo json_encode($data);
		
		//$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function print_data($id_det_pengelolaan)
	{
		# code...
	$data['hasil_detail'] = $this->mod->tampil_detail_pengelolaan($id_det_pengelolaan);
	//print_r($data);die();
	$this->load->view('pengelolaan/pengelolaan_cetak',$data);


	// $data['hasil_detail']=$this->mod->tampil_detail_pengelolaan($id_det_pengelolaan);
	// $data['data_utama']=$this->mod->tampil_pengelolaan()['result'];
 //    $this->load->view('pengelolaan/pengelolaan_cetak',$data);
 //    $html = $this->output->get_output();
 //    $this->load->library('dompdf_gen');
 //    $this->dompdf->load_html($html);
 //    $this->dompdf->render();
 //    $sekarang=date("d:F:Y:h:m:s");
 //    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
	}

}

/* End of file Pengelolaan.php */
/* Location: ./application/controllers/Pengelolaan.php */