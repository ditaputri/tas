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
        $this->load->view('user/checkout');
    }
}
