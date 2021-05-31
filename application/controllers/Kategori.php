<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Kategori', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel kategori';
		//$data['kodeunik'] = $this->M_Kategori->buat_kode();
		$data['result']=$this->mod->tampil_kategori()['result'];
		$data['total_data']=$this->mod->tampil_kategori()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('kategori/kategori_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah kategori';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('kategori/kategori_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_kategori_asset"	=> $this->input->post('id_kategori_asset'),
			"nama_kategori"	=> $this->input->post('nama_kategori'),
			
		];

		$this->mod->tambah_kategori($data);
		redirect(site_url('kategori'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah kategori';
		$data['result']=$this->mod->detail_kategori($id);
		$this->parser->parse('kategori/kategori_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_kategori_asset"	=> $this->input->post('id_kategori_asset'),
			"nama_kategori"	=> $this->input->post('nama_kategori')
		];

		$this->mod->ubah_kategori($data);
		redirect(site_url('kategori'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('kategori'));
	}
}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */