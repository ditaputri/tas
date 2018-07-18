<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {


    public function add()
    {
        $id = $this->input->post('id');
    	$this->load->model('Tas_model');
    	$barang = $this->Tas_model->product($id);
        $data = array(
            'id'      => $barang->id_barang,
            'qty'     => $this->input->post('jumlah'),
            'price'   => $barang->harga,
            'name'    => $barang->nama,
            'foto' => $barang->foto
        );
        $this->cart->insert($data);
        redirect("Home");
    }
    public function remove($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Home');
    }
    public function checkout()
    {
        if((count($this->cart->contents()) == 0) || $this->session->userdata('logged_in') == null){
            redirect('Home');
        }
        $data['user'] = $this->db->where('id_user',$this->session->userdata('logged_in')['id_user'])->get('user')->result()[0];
        $this->load->view('user/checkout',$data);
    }
    public function bayar($value='')
    {
        $set = array(
            'tanggal' => date("Y-m-d"),
            'pembayaran' => $this->input->post('payment'),
            'id_user' => $this->session->userdata('logged_in')['id_user'],
            'status' => 1 
        );
        $this->db->insert('transaksi',$set);
        $id_transaksi = $this->db->insert_id();
        foreach ($this->cart->contents() as $key => $value) {
            $set_detail = array(
                'id_transaksi' => $id_transaksi,
                'id_barang' => $value['id'],
                'jumlah' => $value['qty']
            );
            $this->db->insert('transaksi_detail',$set_detail);
        }
        $this->cart->destroy();
        redirect("Home/complete/".$id_transaksi);
    }
}
