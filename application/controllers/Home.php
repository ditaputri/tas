<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tas_model');
        $this->load->helper('url');
        $this->load->library('pagination');
    }

	public function index()
    {
         $this->load->model('Tas_model');
        $search = $this->input->post('search');
        $total = $this->Tas_model->getTotal1();
        if ($total > 0) {
            $limit = 9;
            $start = $this->uri->segment(3, 0);
            $config = [
                'base_url' => base_url() . 'index.php/home/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,
                // Bootstrap 3 Pagination
                'first_link' => '&laquo;',
                'last_link' => '&raquo;',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];

            $this->pagination->initialize($config);
            $data = [
                'title' => 'Olshop Export Bag :: Data Tas',
                'barang' => $this->Tas_model->list1($limit, $start,$search),
                'links' => $this->pagination->create_links(),
            ];
       }
        $this->load->view('user/home',$data);
    }
    public function product($id)
    {
    	$this->load->model('Tas_model');
    	$data['barang'] = $this->Tas_model->product($id);
        $this->load->view('user/product',$data);
    }
    public function kategori($nama)
    {
        $this->load->model('Tas_model');
        $id_kategori = $this->db->where('nama_kategori',$nama)->get('kategori')->row(0)->id;
        $data['barang'] = $this->db->where('kategori',$id_kategori)->get('barang')->result();
        $this->load->view('user/home',$data);
    }
}
