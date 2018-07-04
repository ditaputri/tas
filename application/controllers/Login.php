<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username',"Username","required|callback_cekDB");
        $this->form_validation->set_rules('password','Password','required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            redirect("Tas");
        }
    }
    
    public function cekDB($username)
    {
        $password = md5($this->input->post('password'));
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $aut = $this->db->get('user');
        if($aut->num_rows() == 1){
            $data = $aut->result()[0];
            $session_data = array(
                'id_user' => $data->id_user,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'no_hp' => $data->no_hp,
                'username' => $data->username,
                'level' => $data->level,
            );
            $this->session->set_userdata('logged_in',$session_data);
            return true;
        }else{
            $this->form_validation->set_message('cekDB',"Username dan Password salah");
            return false;
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('Login','refresh');
    }
}
