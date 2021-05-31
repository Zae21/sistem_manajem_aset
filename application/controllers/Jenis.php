<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('M_Jenis', 'mod');
		
		$this->load->model('M_Asset');
		
	}


	public function index()
	{
		$data['title']='Tabel Jenis';
		//print_r($data);
		//$data['kodeunik'] = $this->M_Jenis->buat_kode();
		$data['result']=$this->mod->tampil_Jenis()['result'];
		$data['total_data']=$this->mod->tampil_Jenis()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('jenis/jenis_tampil', $data);
	}

	public function tambah()
	{
		
		$data['title']='Tambah Jenis';
		$data['kodeunik'] = $this->mod->buat_kode();
		
		//print_r($data); exit();

		$this->parser->parse('jenis/jenis_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_jenis_asset"	=> $this->input->post('id_jenis_asset'),
			"nama_jenis"	=> $this->input->post('nama_jenis'),
			
		];

		$this->mod->tambah_Jenis($data);
		redirect(site_url('jenis'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah Jenis';
		$data['result']=$this->mod->detail_jenis($id);
		$this->parser->parse('jenis/jenis_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_jenis_asset"	=> $this->input->post('id_jenis_asset'),
			"nama_jenis"	=> $this->input->post('nama_jenis'),

		];

		$this->mod->ubah_jenis($data);
		redirect(site_url('jenis'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('jenis'));
	}
}

/* End of file Jenis.php */
/* Location: ./application/controllers/Jenis.php */