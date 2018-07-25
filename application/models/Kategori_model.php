<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function select()
    {
        return $this->db->get('kategori')->result();
    }
    public function select_id($id)
    {
        return $this->db->where('id',$id)->get('kategori')->result()[0];
    }
    public function insert()
    {
        $set = $this->input->post();
        $this->db->insert('kategori',$set);
    }
    public function update($id)
    {
        $set = $this->input->post();
        $this->db->where('id',$id);
        $this->db->update('kategori',$set);
    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kategori');
    }
    public function search($search)
    {
        $this->db->select('*');
        $this->db->like('nama_kategori',$search);
        $query = $this->db->get("kategori");
        return $query->result();    
    }
}

/* End of file ModelName.php */