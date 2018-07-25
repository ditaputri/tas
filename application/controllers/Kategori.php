<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        if($this->session->userdata('logged_in')['level'] != "admin"){
            redirect("Login");
        }
    }
	public function index()
	{

		$data['kategori'] = $this->Kategori_model->select();
		$this->load->view('admin/kategori/index',$data);
	}

    public function search()
    {
        if($this->input->post('search') != null){
            $this->load->model('Kategori_model');
            $search = $this->Kategori_model->search($this->input->post('search'));
            $data = [
                'kategori' => $search,
            ];
            $this->load->view('admin/kategori/index', $data);
        }else{
            echo"data tidak ditemukan";
        }
    }

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori','Nama',"required");
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/kategori/create');
		}else{
			$this->Kategori_model->insert();
			redirect('kategori');
		}
	}
	public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori','Nama',"required");
		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->Kategori_model->select_id($id);
			$this->load->view('admin/kategori/edit',$data);
		}else{
			$this->Kategori_model->update($id);
			redirect('kategori');
		}
	}

	public function destroy($id)
	{
		$this->Kategori_model->delete($id);
		redirect('kategori');
	}
}
