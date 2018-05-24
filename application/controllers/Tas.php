<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tas_model');

        // Konfigurasi Upload
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1500;
        $config['max_width']            = 1536;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
    }

    public function index()
    {
        $tas = $this->Tas_model->list();

        $data = [
                    'title' => 'Olshop Export Bag :: Data Tas',
                    'tas' => $tas,
                ];
        $this->load->view('tas/index', $data);
    }

    public function create($error='')
    {
        $this->load->view('tas/create', $data);
    }

    public function show($id_barang)
    {
        $tas = $this->Tas_model->show($id_barang);
        $data = [
            'data' => $tas
        ];
        $this->load->view('tas/show', $data);
    }
    
    public function store()
    {
        // Ambil value 
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
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
                    $this->load->view('tas/create', $error);
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
        $tas = $this->Pegawai_model->show($id_barang);
        //$jabatan = $this->Jabatan_model->list();
        $data = [
            'data' => $tas,
            'error' => $error
        ];
        $this->load->view('tas/edit', $data);
      
    }

    public function update($id_barang)
    {
        //Ambil Value
        $id_barang=$this->input->post('id_barang');
        $nama = $this->input->post('nama');
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
                    'nama' => $nama
                    //'kode' => $jabatan
                    ];
                $result = $this->Tas_model->update($id_barang,$data);

                if ($result)
                {
                    redirect('tas');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $this->load->view('tas/edit', $data);
                }
            }
            else
            {
                $data = [
                    'nama' => $nama,
                    //'kode' => $jabatan,
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
                    $this->load->view('tas/edit', $data);
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
                'rules' => 'trim|required|callback_alpha_space'
            ]
          ];

        $this->form_validation->set_rules($rules);

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 

    public function alpha_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }
}

/* End of file Controllername.php */
