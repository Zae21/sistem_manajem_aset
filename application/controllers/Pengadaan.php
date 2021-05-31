<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Pengadaan', 'mod');
		$this->load->model('M_Perencanaan');
		
	}

	public function index()
	{
		$data['title']='Tabel Pengadaan';
		//$data['kodeunik'] = $this->M_pengadaan->buat_kode();
		$data['result']=$this->mod->tampil_pengadaan()['result'];
		//$data['total_data']=$this->mod->tampil_pengadaan()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('pengadaan/pengadaan_tampil', $data);
	}

	public function detail_pengadaan($id_det_pengadaan)
	{

		$data=$this->mod->tampil_detail_pengadaan($id_det_pengadaan);
		echo json_encode($data);
		
		//$this->parser->parse('pengadaan/pengadaan_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah pengadaan';
		$data['kodeunik'] = $this->mod->buat_kode();	
		$data['result_perencanaan_pilihan'] = $this->M_Perencanaan->tampil_perencanaan_pilihan()['result'];
		
		$this->parser->parse('pengadaan/pengadaan_tambah', $data);
	}

	public function tambah_proses()
	{
		//print_r($this->input->post());die();
		$id_pengadaan = $this->input->post('id_pengadaan');
		$data=[
			"id_pengadaan"	=> $id_pengadaan,
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_perencanaan"	=> $this->input->post('tgl_perencanaan'),
			"tgl_pengadaan"	=> $this->input->post('tgl_pengadaan'),
			//"tgl_pinjam"	=> $this->input->post('tgl_pinjam'),
			"total_harga_diajukan"	=> $this->input->post('total_harga_diajukan'),
			"total_harga"	=> $this->input->post('total_pengadaan'),
			
		];
		// for ($i=0; $i <sizeof($this->input->post('nama_asset')) ; $i++) { 
		// 	echo $this->input->post('nama_asset')[$i];
		// 	echo "<br>";
		// }
		// die();
		$this->session->set_userdata('user_id');

		//$this->input->post
		$this->mod->tambah_pengadaan($data);
	     $nama_asset = $this->input->post('nama_asset');
	    
	     $jumlah = $this->input->post('jumlah');
	     $harga_pengadaan = $this->input->post('harga_pengadaan');
	     $harga_realisasi = $this->input->post('harga_realisasi');
	     $total_harga = $this->input->post('total_pengadaan');
	     //print_r($total_harga);die();
		for ($i=0; $i <sizeof($nama_asset) ; $i++) { 
				$detail = array(
			                 'id_pengadaan' => $id_pengadaan,
			                 'nama_asset' => $nama_asset[$i],
			                 
			                 'jumlah' => $jumlah[$i],
			                 'harga_pengadaan' => $harga_pengadaan[$i],
			                 'harga_realisasi' => $harga_realisasi[$i],
			                 'total_harga' => $total_harga[$i]
						  ); 
				$this->mod->tambah_detail($detail);
			}

			redirect(site_url('pengadaan'));
	}

public function isi_otomatis($id_perencanaan)
{
	# code...
	$data['result']=$this->M_Perencanaan->ambil_data_perencanaan($id_perencanaan)['result'];
	
	$data['result_detail']=$this->M_Perencanaan->ambil_detail_perencanaan($id_perencanaan);
	echo json_encode($data);

}
	

}

/* End of file Pengadaan.php */
/* Location: ./application/controllers/Pengadaan.php */