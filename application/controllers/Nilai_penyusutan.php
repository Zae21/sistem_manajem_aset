<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai_penyusutan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_nilai_penyusutan', 'mod');
		$this->load->model('M_Asset');
	}


	public function index()
	{
		$data['title']='Tabel nilai_penyusutan';
		
		//$data['kodeunik'] = $this->m_nilai_penyusutan->buat_kode();
		$data['result']=$this->mod->tampil_nilai_penyusutan()['result'];
		$data['total_data']=$this->mod->tampil_nilai_penyusutan()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('nilai_penyusutan/nilai_penyusutan_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah nilai_penyusutan';
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('nilai_penyusutan/nilai_penyusutan_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_nilai_penyusutan"	=> $this->input->post('id_nilai_penyusutan'),
			"id_asset"	=> $this->input->post('id_asset'),
			"umur"	=> $this->input->post('umur'),
			"nilai_penyusutan"	=> $this->input->post('nilai_penyusutan'),
			
		];

		$this->mod->tambah_nilai_penyusutan($data);
		redirect(site_url('nilai_penyusutan'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah nilai_penyusutan';
		$data['result']=$this->mod->detail_nilai_penyusutan($id);
		$this->parser->parse('nilai_penyusutan/nilai_penyusutan_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_nilai_penyusutan"	=> $this->input->post('id_nilai_penyusutan'),
			"id_asset"	=> $this->input->post('id_asset'),
			"durasi"	=> $this->input->post('durasi'),
			"nilai_penyusutan"	=> $this->input->post('nilai_penyusutan')
		];

		$this->mod->ubah_nilai_penyusutan($data);
		redirect(site_url('nilai_penyusutan'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('nilai_penyusutan'));
	}
}

/* End of file nilai_penyusutan.php */
/* Location: ./application/controllers/nilai_penyusutan.php */