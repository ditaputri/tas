<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
    {
        $this->load->model('Tas_model');
        $data['barang'] = $this->db->get('barang')->result();
        $search = $this->input->post('search');
        if($search != null){
            $data['barang'] = $this->Tas_model->search($search);
        }
        $this->load->view('user/home',$data);
    }
    public function product($id)
    {
    	$this->load->model('Tas_model');
    	$data['barang'] = $this->Tas_model->product($id);
        $this->load->view('user/product',$data);
    }
}
