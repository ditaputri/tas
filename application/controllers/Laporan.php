<?php
class Laporan extends CI_Controller{

 public function __construct(){
     parent::__construct();
     $this->load->library('pdf');
 }
 public function pdf()
 {
     $data =[
            "title"=> "Contoh",
            "data"=>[
                ["kolom" =>"Kolom 1","Kolom2"=>"Kolom2"],
                ["kolom" =>"Kolom 1","Kolom2"=>"Kolom2"],
                ["kolom" =>"Kolom 1","Kolom2"=>"Kolom2"],
            ]
            ];
    $this->pdf->setPaper('A4','portrait');
    $this->pdf-> load_view('laporan',$data,'laporan-contoh.pdf');
    
 }
}