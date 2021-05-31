<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pengelolaan extends CI_Model {

	public $table = 'pengelolaan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(pengelolaan.id_pengelolaan,4) as kode', FALSE);
		  $this->db->order_by('id_pengelolaan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pengelolaan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$this->db->insert('det_pengelolaan',$detail);
		return TRUE;
		//print('<pre>'); print_r($query); exit();

		//$this->db->query($query);	
	}

	public function tampil_pengelolaan()
	{

	$this->db->select('*')
    		->from('pengelolaan')
    		->join('users','pengelolaan.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function tampil_detail_pengelolaan($id_det_pengelolaan)
	{

		$this->db->select('*')
				->from('det_pengelolaan dp')
				->join('pengelolaan pa','pa.id_pengelolaan=dp.id_pengelolaan')
    			->join('asset as','as.id_asset=dp.id_asset')
    			->join('users','users.id_user=pa.id_user')
    			->where("dp.id_pengelolaan", $id_det_pengelolaan);

		$query = $this->db->get()->result();
		//print_r($this->db->last_query());die();
		
		return $query;
	}

	public function detail_pengelolaan()
	{
		$this->db->select('*')
				->from('det_pengelolaan')
    			->join('kategori_asset','det_pengelolaan.id_kategori_asset=kategori_asset.id_kategori_asset')
    			->join('jenis_asset','det_pengelolaan.id_jenis_asset=jenis_asset.id_jenis_asset');
	
		$query = $this->db->get()->result();
		//print_r($query);die();
		return $query;
	}
	
	public function tampil_pengelolaan_pilihan()
	{
		$where = "status_data = 'Disetujui'";
		$this->db->select(['id_pengelolaan','total_pengelolaan'])
			->from('pengelolaan')
			->where($where);

		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function ambil_data_pengelolaan($id_pengelolaan)
	{
		# code...
		$this->db->select('*')
    		->from('pengelolaan')
    		->join('users','pengelolaan.id_user=users.id_user')
    		->where("pengelolaan.id_pengelolaan", $id_pengelolaan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	
		return $data;
	}

	public function ambil_detail_pengelolaan($id_pengelolaan)
	{
		# code...
		$this->db->select('*')
    		->from('det_pengelolaan')
    		->where("det_pengelolaan.id_pengelolaan", $id_pengelolaan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data=$this->db->query($query)->result();
	
		return $data;
	}

	public function tambah_pengelolaan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('pengelolaan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_pengelolaan($data)
	{
		$this->db->where("id_pengelolaan", $this->input->post('id_pengelolaan'));
		$query=$this->db->set($data)->get_compiled_update('pengelolaan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function pembatalan($id)
	{
		# code...
		$this->db->set(['status_data'=> 'Dibatalkan']);
		$this->db->where('id_pengelolaan', $id);
		return $this->db->update('pengelolaan');
	}

	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_pengelolaan', $id);
    $this->db->delete('pengelolaan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}

}

/* End of file M_Pengelolaan.php */
/* Location: ./application/models/M_Pengelolaan.php */