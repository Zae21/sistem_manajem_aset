<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jenis extends CI_Model {

	public $table='jenis_asset';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(jenis_asset.id_jenis_asset,4) as kode', FALSE);
		  $this->db->order_by('id_jenis_asset','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('jenis_asset');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "HRG-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_jenis()
	{
		$this->db->select('*')
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function tampil_jenis_pilihan()
	{
		$this->db->select(['id_jenis_asset','nama_jenis'])
			->from('jenis_asset');

		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_jenis($id_jenis)
	{
		$this->db->select()
			->from($this->table)
			->where("id_jenis_asset", $id_jenis);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_jenis($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('jenis_asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_jenis($data)
	{
		$this->db->where("id_jenis_asset", $this->input->post('id_jenis_asset'));
		$query=$this->db->set($data)->get_compiled_update('jenis_asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_jenis_asset', $id);
    $this->db->delete('jenis_asset');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_jenis.php */
/* Location: ./application/models/m_jenis.php */