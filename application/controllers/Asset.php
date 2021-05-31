<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('M_Asset', 'mod');
		$this->load->model('M_Kategori');
		$this->load->model('M_Jenis');
	}


	public function index()
	{
		$data['title']='Tabel asset';
		$data['result']=$this->mod->tampil_asset()['result'];
		$data['total_data']=$this->mod->tampil_asset()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('asset/asset_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah asset';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$this->parser->parse('asset/asset_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_asset"	=> $this->input->post('id_asset'),
			"nama_asset"	=> $this->input->post('nama_asset'),
			"id_jenis_asset"	=> $this->input->post('id_jenis_asset'),
			"id_kategori_asset"	=> $this->input->post('id_kategori_asset'),
			"jumlah"	=> $this->input->post('jumlah'),
			// "stok"	=> $this->input->post('stok'),
			"status"	=> $this->input->post('status'),
		];
		//print_r($_POST);
		$this->mod->tambah_asset($data);
		redirect(site_url('asset'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah asset';
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result']=$this->mod->detail_asset($id);
		$this->parser->parse('asset/asset_ubah', $data);	}

	public function ubah_proses()
	{
		$data=[
			"id_asset"	=> $this->input->post('id_asset'),
			"nama_asset"	=> $this->input->post('nama_asset'),
			"id_jenis_asset"	=> $this->input->post('id_jenis_asset'),
			"id_kategori_asset"	=> $this->input->post('id_kategori_asset'),
			"jumlah"	=> $this->input->post('jumlah'),
			// "stok"	=> $this->input->post('stok'),
			"status"	=> $this->input->post('status'),

		];

		$this->mod->ubah_asset($data);
		redirect(site_url('asset'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('asset'));
	}
	
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */