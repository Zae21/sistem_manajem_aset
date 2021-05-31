<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penghapusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_penghapusan', 'mod');
		$this->load->model('M_Asset');
	}

	public function index()
	{
		$data['title']='Tabel penghapusan';
		//$data['kodeunik'] = $this->M_penghapusan->buat_kode();
		$data['result']=$this->mod->tampil_penghapusan()['result'];
		$data['total_data']=$this->mod->tampil_penghapusan()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('penghapusan/penghapusan_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah penghapusan';
		$data['kodeunik'] = $this->mod->buat_kode();	
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$this->parser->parse('penghapusan/penghapusan_tambah', $data);
	}

	public function tambah_proses()
	{
		//print_r($this->input->post());die();
		$id_penghapusan = $this->input->post('id_penghapusan');
		$data=[
			"id_penghapusan"	=> $this->input->post('id_penghapusan'),
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_transaksi"	=> $this->input->post('tgl_transaksi'),
			"peminjam"	=> $this->input->post('peminjam'),
			"status_penghapusan"	=> $this->input->post('status_penghapusan'),
			"total_barang"	=> $this->input->post('total_barang'),
			
			
		];
	
		$this->session->set_userdata('user_id');

		//$this->input->post
		$this->mod->tambah_penghapusan($data);
	    $id_asset = $this->input->post('id_asset');
	    $jumlah = $this->input->post('jumlah');
	    
		for ($i=0; $i <sizeof($id_asset) ; $i++) { 
			$detail = array(
						'id_penghapusan' => $id_penghapusan,
		                 'id_asset' => $id_asset[$i],
		                 'jumlah' => $jumlah[$i]
		                 
					  ); 
			$this->mod->tambah_detail($detail);
		}

		redirect(site_url('penghapusan'));
	}

	public function detail_penghapusan($id_det_penghapusan)
	{

		$data=$this->mod->tampil_detail_penghapusan($id_det_penghapusan);
		echo json_encode($data);
		
		//$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function print_data($id_det_penghapusan)
	{
		# code...
	$data['hasil_detail'] = $this->mod->tampil_detail_penghapusan($id_det_penghapusan);
	//print_r($data);die();
	$this->load->view('penghapusan/penghapusan_cetak',$data);


	// $data['hasil_detail']=$this->mod->tampil_detail_penghapusan($id_det_penghapusan);
	// $data['data_utama']=$this->mod->tampil_penghapusan()['result'];
 //    $this->load->view('penghapusan/penghapusan_cetak',$data);
 //    $html = $this->output->get_output();
 //    $this->load->library('dompdf_gen');
 //    $this->dompdf->load_html($html);
 //    $this->dompdf->render();
 //    $sekarang=date("d:F:Y:h:m:s");
 //    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
	}

}

/* End of file penghapusan.php */
/* Location: ./application/controllers/penghapusan.php */