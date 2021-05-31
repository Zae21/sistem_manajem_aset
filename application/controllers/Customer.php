<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_customer', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel customer';
		//$data['kodeunik'] = $this->m_customer->buat_kode();
		$data['result']=$this->mod->tampil_customer()['result'];
		$data['total_data']=$this->mod->tampil_customer()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('customer/customer_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah customer';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('customer/customer_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_customer"	=> $this->input->post('id_customer'),
			"nama"	=> $this->input->post('nama'),
			"no_id"	=> $this->input->post('no_id'),
			"jenis_id"	=> $this->input->post('jenis_id'),
			"alamat"	=> $this->input->post('alamat'),
			"no_hp"	=> $this->input->post('no_hp'),
			
		];

		$this->mod->tambah_customer($data);
		redirect(site_url('customer'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah customer';
		$data['result']=$this->mod->detail_customer($id);
		$this->parser->parse('customer/customer_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_customer"	=> $this->input->post('id_customer'),
			"nama"	=> $this->input->post('nama'),
			"no_id"	=> $this->input->post('no_id'),
			"jenis_id"	=> $this->input->post('jenis_id'),
			"alamat"	=> $this->input->post('alamat'),
			"no_hp"	=> $this->input->post('no_hp'),
		];

		$this->mod->ubah_customer($data);
		redirect(site_url('customer'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('customer'));
	}
}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */