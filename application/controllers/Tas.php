<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');

        // Konfigurasi Upload
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 1636;
        $config['max_height']           = 1000;

        $this->load->library('upload', $config);
        if($this->session->userdata('logged_in') == null){
            redirect('Login/logout');
        }
    }

    public function index()
    {
        //searching
        $search = ($this->input->post("nama_tas"))? $this->input->post("nama_tas") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        $data = [];
        $total = $this->Tas_model->getTotal($search);
        if ($total > 0) {
            $limit = 2;
            $start = $this->uri->segment(4, 0);
            $config = [
                'base_url' => site_url() . '/tas/index/' . $search,
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 4,
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
                'tas' => $this->Tas_model->list($limit, $start, $search),
                'links' => $this->pagination->create_links(),
            ];
        }

       
        $this->load->view('admin/tas/index', $data);
    }

    public function create($error='')
    {
        $data = [
            'error' => $error,
            'kategori' => $this->db->get('kategori')->result()
        ];
        $this->load->view('admin/tas/create', $data);
    }

    public function show($id_barang)
    {
        $tas = $this->Tas_model->show($id_barang);
        $data = [
            'data' => $tas
        ];
        $this->load->view('admin/tas/show', $data);
    }
    
    public function store()
    {
        // Ambil value 
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $keterangan = $this->input->post('keterangan');
        // Validasi Nama dan Jabatan
        $dataval = $nama;
        $errorval = $this->validate($dataval);

        // Pesan Error atau Upload
        if ($errorval==false)
        {
            // Percobaan Upload
            if ( ! $this->upload->do_upload('foto'))
            {
                $error = $this->upload->display_errors();
                $this->create($error);
            }
            else
            {
                // Insert data
                $data = [
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'stok' => $stok,
                    'harga' => $harga,
                    'keterangan' => $keterangan,
                    'foto' => $this->upload->data('file_name')
                    ];
                $result = $this->Tas_model->insert($data);
                
                if ($result)
                {
                    redirect(tas);
                }
                else
                {
                    $error = array('error' => 'Gagal');
                    $error['kategori'] = $this->db->get('kategori')->result();
                    $this->load->view('admin/tas/create', $error);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->create($error);
        }
    }

    public function edit($id_barang,$error='')
    {
      // TODO: tampilkan view edit data
        $tas = $this->Tas_model->show($id_barang);
        //$jabatan = $this->Jabatan_model->list();
        $data = [
            'data' => $tas,
            'kategori' => $this->db->get('kategori')->result(),
            'error' => $error
        ];
        $this->load->view('admin/tas/edit', $data);
      
    }

    public function update($id_barang)
    {
        //Ambil Value
        $id_barang=$this->input->post('id_barang');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');

        // Validasi Nama dan Jabatan
        $dataval = [
            'nama' => $nama
            //'jabatan' => $jabatan
            ];
        $errorval = $this->validate($dataval);

        if ($errorval==false)
        {
            if ( ! $this->upload->do_upload('foto'))
            {
                $data = [
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'stok' => $stok,
                    'harga' => $harga,
                    'keterangan' => $keterangan,
                    ];
                $result = $this->Tas_model->update($id_barang,$data);

                if ($result)
                {
                    redirect('tas');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $data['kategori'] = $this->db->get('kategori')->result();
                    $this->load->view('admin/tas/edit', $data);
                }
            }
            else
            {
                $data = [
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'stok' => $stok,
                    'harga' => $harga,
                    'keterangan' => $keterangan,
                    'foto' => $this->upload->data('file_name')
                    ];
                $result = $this->Tas_model->update($id_barang,$data);
                
                if ($result)
                {
                    redirect('tas');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $data['kategori'] = $this->db->get('kategori')->result();
                    $this->load->view('admin/tas/edit', $data);
                }
            }
        }
        else
        {
            $error = validation_errors();
            $this->edit($id_barang,$error);
        }

        
    }

    public function destroy($id_barang)
    {
        $tas = $this->Tas_model->show($id_barang);

        unlink('./assets/uploads/'.$tas->foto);
        
        $this->Tas_model->delete($id_barang);

        redirect('tas');
    }

    public function validate($dataval)
    {
        // Validasi Nama dan Jabatan
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'trim|required'
            ],
          ];

        $this->form_validation->set_rules($rules);

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 
}

/* End of file Controllername.php */
