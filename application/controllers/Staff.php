<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Staff', 'mod');
		$this->load->model('M_Auth');
		
	}

	public function index()
	{
		$data['title']='Tabel Staff';
		//$data['kodeunik'] = $this->M_Staff->buat_kode();
		$data['result']=$this->mod->tampil_staff()['result'];
		$data['total_data']=$this->mod->tampil_staff()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('staff/staff_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah Staff';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_users_pilihan'] = $this->M_Auth->tampil_users_pilihan()['result'];
		
		$this->parser->parse('staff/staff_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_staff"	=> $this->input->post('id_staff'),
			"nama_staff"	=> $this->input->post('nama_staff'),
			"alamat"	=> $this->input->post('alamat'),
			"no_hp"	=> $this->input->post('no_hp'),
			"id_user"	=> $this->input->post('id_user'),
			// "stok"	=> $this->input->post('stok'),
			"jabatan"	=> $this->input->post('jabatan'),
		];
		//print_r($_POST);
		$this->mod->tambah_staff($data);
		redirect(site_url('staff'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah Staff';
		$data['result_users_pilihan'] = $this->M_Auth->tampil_users_pilihan()['result'];
		
		$data['result']=$this->mod->detail_staff($id);
		$this->parser->parse('staff/staff_ubah', $data);	}

	public function ubah_proses()
	{
		$data=[
			"id_staff"	=> $this->input->post('id_staff'),
			"nama_staff"	=> $this->input->post('nama_staff'),
			"alamat"	=> $this->input->post('alamat'),
			"no_hp"	=> $this->input->post('no_hp'),
			"id_user"	=> $this->input->post('id_user'),
			// "stok"	=> $this->input->post('stok'),
			"jabatan"	=> $this->input->post('jabatan'),

		];

		$this->mod->ubah_staff($data);
		redirect(site_url('staff'));
	}


}

/* End of file Staff.php */
/* Location: ./application/controllers/Staff.php */