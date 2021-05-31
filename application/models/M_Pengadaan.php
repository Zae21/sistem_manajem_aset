<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pengadaan extends CI_Model {

	public $table ='pengadaan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(pengadaan.id_pengadaan,4) as kode', FALSE);
		  $this->db->order_by('id_pengadaan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pengadaan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "TRPD$ym".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}


	public function tambah_detail($detail)
	{
		$this->db->insert('det_pengadaan',$detail);
		return TRUE;
			
	}
	
	public function tampil_pengadaan()
	{

	$this->db->select('*')
    		->from('pengadaan')
    		->join('users','pengadaan.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
	$data['total_data']=$this->db->count_all_results();
    $data['result']=$this->db->query($query)->result();
    //print_r($data);die();
    
		return $data;


	}
	
	public function tampil_detail_pengadaan($id_det_pengadaan)
	{

		$this->db->select('*')
				->from('det_pengadaan')
    			->where("det_pengadaan.id_pengadaan", $id_det_pengadaan);

		$query = $this->db->get()->result();
		//print_r($query);die();
		
		return $query;
	}

	
	public function tampil_pengadaan_pilihan()
	{
		$this->db->select(["id_pengadaan"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function tambah_pengadaan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('pengadaan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}


	public function pembatalan($id)
	{
		# code...
		$this->db->set(['status_data'=> 'Dibatalkan']);
		$this->db->where('id_pengadaan', $id);
		return $this->db->update('pengadaan');
	}

	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_pengadaan', $id);
    $this->db->delete('pengadaan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}

}

/* End of file M_Pengadaan.php */
/* Location: ./application/models/M_Pengadaan.php */