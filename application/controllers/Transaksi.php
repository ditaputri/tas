<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class Transaksi extends CI_Controller {


    public function index()
    {
    	$this->load->model('Transaksi_model');
    	$data['transaksi'] = $this->Transaksi_model->get_all();
        $this->load->view('admin/transaksi/index',$data);
    }
    public function print()
    {
    	$this->load->library('dompdf_gen');
    	$this->load->model('Transaksi_model');
    	$data['transaksi'] = $this->Transaksi_model->get_all();
        $this->load->view('admin/transaksi/print',$data);
        $html = $this->output->get_output();

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('laporan.pdf');
        unset($html);
        unset($dompdf);
    }
}
