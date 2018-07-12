<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function select()
    {
        return $this->db->get('user')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id_user',$id)->get('user')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $set['password'] = md5($set['password']);
        $this->db->insert('user',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $set['password'] = md5($set['password']);
        $this->db->where('id_user',$id);
        $this->db->update('user',$set);
    }
    public function delete($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }
}

/* End of file ModelName.php */