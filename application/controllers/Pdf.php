<?php
use dompdf\dopdf;

class Pdf extends Dompdf
{
    public function __construct()
    {
        parent::__construc();
        if($this->session->userdata('logged_in')['level'] != "admin"){
            redirect("Login");
        }
    }

    protected function ci()
    {
        return get_instance();

     }          
    public function load_view($view, $data=[], $filename ='laporan.pdf')
    {
    $html =$this->ci()->load->view($view, $data, true);
    $this->load_html($html);
    $this->render();
    $this->stream($filename,['Attchement' => 0]);
    }
}
?>