<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Penghapusan extends CI_Model {

	public $table = 'penghapusan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(penghapusan.id_penghapusan,4) as kode', FALSE);
		  $this->db->order_by('id_penghapusan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('penghapusan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "TPL$ym".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tambah_detail($detail)
	{	
		//print_r($detail);die()	;
		$this->db->insert('det_penghapusan',$detail);
		return TRUE;
		//print('<pre>'); print_r($query); exit();

		//$this->db->query($query);	
	}

	public function tampil_penghapusan()
	{

	$this->db->select('*')
    		->from('penghapusan')
    		->join('users','penghapusan.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function tampil_detail_penghapusan($id_det_penghapusan)
	{

		$this->db->select('*')
				->from('det_penghapusan dp')
				->join('penghapusan pa','pa.id_penghapusan=dp.id_penghapusan')
    			->join('asset as','as.id_asset=dp.id_asset')
    			->join('users','users.id_user=pa.id_user')
    			->where("dp.id_penghapusan", $id_det_penghapusan);

		$query = $this->db->get()->result();
		//print_r($this->db->last_query());die();
		
		return $query;
	}

	public function detail_penghapusan()
	{
		$this->db->select('*')
				->from('det_penghapusan')
    			->join('kategori_asset','det_penghapusan.id_kategori_asset=kategori_asset.id_kategori_asset')
    			->join('jenis_asset','det_penghapusan.id_jenis_asset=jenis_asset.id_jenis_asset');
	
		$query = $this->db->get()->result();
		//print_r($query);die();
		return $query;
	}
	
	public function tampil_penghapusan_pilihan()
	{
		$where = "status_data = 'Disetujui'";
		$this->db->select(['id_penghapusan','total_penghapusan'])
			->from('penghapusan')
			->where($where);

		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function ambil_data_penghapusan($id_penghapusan)
	{
		# code...
		$this->db->select('*')
    		->from('penghapusan')
    		->join('users','penghapusan.id_user=users.id_user')
    		->where("penghapusan.id_penghapusan", $id_penghapusan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	
		return $data;
	}

	public function ambil_detail_penghapusan($id_penghapusan)
	{
		# code...
		$this->db->select('*')
    		->from('det_penghapusan')
    		->where("det_penghapusan.id_penghapusan", $id_penghapusan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data=$this->db->query($query)->result();
	
		return $data;
	}

	public function tambah_penghapusan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('penghapusan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_penghapusan($data)
	{
		$this->db->where("id_penghapusan", $this->input->post('id_penghapusan'));
		$query=$this->db->set($data)->get_compiled_update('penghapusan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function pembatalan($id)
	{
		# code...
		$this->db->set(['status_data'=> 'Dibatalkan']);
		$this->db->where('id_penghapusan', $id);
		return $this->db->update('penghapusan');
	}

	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_penghapusan', $id);
    $this->db->delete('penghapusan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}

}

/* End of file M_penghapusan.php */
/* Location: ./application/models/M_penghapusan.php */