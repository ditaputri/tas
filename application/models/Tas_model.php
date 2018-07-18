<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tas_model extends CI_Model {

    public function list($limit, $start, $search)
    { 
        $query = $this->db->get('barang', $limit, $start);
        if($search != 'NIL')
        {
            $this->db->like('nama',$search);
        }
        $query = $this->db->get('barang', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function search($word)
    {
        $this->db->select('barang.*,kategori.nama_kategori');
        $this->db->join('kategori','barang.kategori=kategori.id');
        $this->db->like('barang.nama',$word);
        $this->db->or_like('kategori.nama_kategori',$word);
        return $this->db->get('barang')->result();
    }

    public function product($id)
    {
        $this->db->select('barang.*,kategori.nama_kategori');
        $this->db->join('kategori','barang.kategori=kategori.id');
        $this->db->where('id_barang',$id);
        return $this->db->get('barang')->result()[0];
    }
    public function insert($data = [])
    {
        $result = $this->db->insert('barang', $data);
        return $result;
    }

    public function getTotal($search)
    {
        $query = $this->db->get('barang');
        if($search != 'NIL')
        {
            $this->db->like('nama', $search);
        }
        return $this->db->count_all('barang');
    }

    public function show($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('barang');
        return $query->row();
    }

    public function update($id_barang, $data = [])
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data

        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        return result;
    }
    
    public function delete($id_barang)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_barang', $id_barang);

        $this->db->delete('barang');
    }
}

/* End of file ModelName.php */