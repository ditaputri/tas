<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tas_model extends CI_Model {

    public function list()
    {
        // $query = $this->db->get('pegawai');
        
        $query = $this->db->get('barang');

        return $query->result();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('barang', $data);
        return $result;
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

        $data=[
            'nama'=>$this->input->post('nama'),
            'harga'=>$this->input->post('harga'),
            'keterangan'=>$this->input->post('keterangan')
          ];

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