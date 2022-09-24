<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Account extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
    }

    public function Index()
    {
        if($this->session->userdata('username') == null){
            $this->load->view('layout/head');
            $this->load->view('content/account/signin');
        }
        else{
            $level = $this->session->userdata('level_id');
            if($level == 1)
            {
                redirect('/Users/Index');
            }
            elseif($level == 2)
            {
                redirect('/Menus/Index');
            }
            elseif($level == 3 or $level == 4)
            {
                redirect('/Orders/Index');
            }
            else
            {
                redirect('/Account/Logout');
            }
        }
    }

    public function Login()
    {
        $input['username'] = $this->input->post('username');
        $input['password'] = md5($this->input->post('password'));

        $this->db->trans_start();
        $checkdata = $this->account_model->showByLogin($input);
        $this->db->trans_complete();

        if($checkdata == true)
        {
            $level = $this->session->userdata('level_id');
            if($level == 1)
            {
                redirect('/Users/Index');
            }
            elseif($level == 2)
            {
                redirect('/Menus/Index');
            }
            elseif($level == 3 or $level == 4)
            {
                redirect('/Orders/Index');
            }
            else
            {
                redirect('/Account/Logout');
            }
        }
        else
        {
            redirect('/Account/Index');
        }
    }
    
    public function Logout()
    {
        $input['id'] = $this->session->userdata('id');
        $input['type_of_activities'] = 'Logout';
        $this->db->trans_start();
        $this->account_model->setHistory($input);
        $this->db->trans_complete();
        $this->session->sess_destroy();
        redirect('/Account/Index');
    }
}