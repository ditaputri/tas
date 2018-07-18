<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function get_all()
    {
        $this->db->select("transaksi.*,(select nama from user where id_user = transaksi.id_user) as nama_user,
            group_concat(barang.nama,'-',transaksi_detail.jumlah,'-',barang.harga) as list_barang,
            sum(transaksi_detail.jumlah*barang.harga) as total");
        $this->db->join('transaksi_detail','transaksi.id_transaksi=transaksi_detail.id_transaksi');
        $this->db->join('barang','transaksi_detail.id_barang=barang.id_barang');
        $this->db->group_by('transaksi.id_transaksi');
       return $this->db->get('transaksi')->result();
    }
    public function get_transaksi($id)
    {
       $this->db->select("transaksi.*,(select nama from user where id_user = transaksi.id_user) as nama_user");
       return $this->db->where('id_transaksi',$id)->get('transaksi')->result()[0];
    }
    public function get_detail($id)
    {
        $this->db->select('transaksi_detail.*,barang.nama as nama_barang,barang.harga as harga_barang');
        $this->db->join('barang','transaksi_detail.id_barang=barang.id_barang');
        $this->db->where('id_transaksi',$id);
        return $this->db->get('transaksi_detail')->result();
    }
}

/* End of file ModelName.php */