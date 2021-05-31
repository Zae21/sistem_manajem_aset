<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Auth extends CI_Model {

    public $variable;
    

    public function __construct()
    {
        parent::__construct();
    }

    function cek_user($data)
    {
        $data = $this->db
        ->get_where('users', $data)
        ->row();
        //  $query=$this->db->get_compiled_select();
        //$data = $this->db->query($query)->row();
            return $data;
    }
    function cek_username($user,$table)
    {
        $this->db->where('username',$user);
        return $this->db->get('users');
    }
    function ganti_password($user,$data,$table)
    {
    $this->db->where('username',$user);
    $this->db->update('users',$data);
    }
    function get_users()
    {
        $this->db->select('id_user,
                            username,
                            nama_user,
                            password,
                            email,
                            telepon,
                            foto,
                            hak_akses,
                            status');
        $this->db->from('users');
        $query = $this->db->get()->result();
        return $query;
    }
    
    function insert($add)
    {
        $this->db->insert('users',$add);
    }
    
    public function detail_user($id_user)
    {
        $this->db->select('id_user,
                            username,
                            nama_user,
                            password,
                            email,
                            telepon,
                            foto,
                            hak_akses,
                            status');
        $this->db->from('users');
        $this->db->where("id_user", $id_user);
        $query = $this->db->get()->result();
        return $query;
    }
    
    function update($where,$edit)
    {
        $this->db->where($where);
        $this->db->update('users',$edit);
    }
    
    function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
    }
    

}

/* End of file  */
/* Location: ./application/models/ */