<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation', 'session');
        $this->load->model('Model_user');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

        if($this->form_validation->run() == false){
            redirect('Main', 'refresh');
        }else{
            redirect('Main/dashboard', 'refresh');
        }
    }

    public function check_database($password)
    {
        $username = $this->input->post('username');
        $res = $this->Model_user->login($username, $password);
        
        if($res){
            $sess_array = 
            ["admin_id"                    =>  $res['admin_id'],
             "email_admin"                 =>  $res['email_admin'],
             "username"                    =>  $res['username']
            ];
            $this->session->set_userdata('logged_in', $sess_array);
            
            return true;
        }else{
            $this->form_validation->set_message('check_database', '');
            return false;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Main', 'refresh');
    }
	
}