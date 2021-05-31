<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('M_Auth', 'mod');
	}

	public function index()
	{
		$data['title']='Authentification';
		$this->parser->parse('auth/auth', $data);
	}
	
	public function auth()
	{
	$data = array('username' => htmlspecialchars($this->input->post('username', TRUE)),
						'password' => md5(htmlspecialchars($this->input->post('password', TRUE)))
					);
		$hasil = $this->mod->cek_user($data);
		if ($hasil) {
				$sess_data['id_user'] = $hasil->id_user;
				$sess_data['username'] = $hasil->username;
				$sess_data['nama_user'] = $hasil->nama_user;
				$sess_data['hak_akses'] = $hasil->hak_akses;
				$this->session->set_userdata($sess_data);

				if ($hasil->hak_akses == 'Super Admin') {
					# code...
					redirect('dashboard');
				}
				elseif ($hasil->hak_akses == 'Pegawai') {
					# code...
					redirect('dashboard2');
				}
				elseif ($hasil->hak_akses == 'Admin') {
					# code...
					redirect('dashboard');
				}
				else {
					
				redirect('dashboard3');
				}
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}

	}
	public function logout()
	{
		session_destroy();
		redirect('dashboard');

	}

	public function user()
	{
		$data['result'] = $this->mod->get_users();
		$this->load->view('auth/user_tampil',$data);
	}
	
	public function tambah()
	{
		$this->load->view('auth/user_tambah');
	}
	
	public function tambah_proses()
	{
		$data=[
			"nama_user"	=> $this->input->post('nama'),
			"username"	=> $this->input->post('username'),
			"password"	=> md5(htmlspecialchars($this->input->post('password'))),
			"email"	=> $this->input->post('email'),
			"telepon"	=> $this->input->post('telp'),
			"hak_akses"	=> $this->input->post('hakses'),
			"status"	=> $this->input->post('status')
		];
		$this->mod->insert($data);
		redirect('auth/user');
	}
	
	public function edit($id_user)
	{
		$data['result']=$this->mod->detail_user($id_user);
		$this->load->view('auth/user_ubah',$data);
	}
	
	public function update()
	{
		$data=[
			"nama_user"	=> $this->input->post('nama'),
			"username"	=> $this->input->post('username'),
			"password"	=> md5(htmlspecialchars($this->input->post('password'))),
			"email"	=> $this->input->post('email'),
			"telepon"	=> $this->input->post('telp'),
			"hak_akses"	=> $this->input->post('hakses'),
			"status"	=> $this->input->post('status')
		];
		
		$where=[
			"id_user" => $this->input->post('id_user')
			];
		$this->mod->update($where,$data);
		redirect('auth/user');
	}		
	
	public function delete($id_user)
	{
		$this->mod->delete($id_user);
		redirect('auth/user');
	}
	
	public function ubah_password()
	{	 
		$this->load->view('auth/ubah_password');
	}
	
	public function proses_ubahPassword()
	{
		$data = [
			"password"	=> md5(htmlspecialchars($this->input->post('password')))
			];
		$where = [
			"id_user" => $this->session->userdata('id_user')
			];
			
		$this->mod->update($where,$data);
		redirect('dashboard');
	}

	 
}


/* End of file  */
/* Location: ./application/controllers/ */