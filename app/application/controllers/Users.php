<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        check_permission([1]);
    }
    
    public function Index()
    {
        $this->load->view('layout/head');
        $this->load->view('content/users/index');
        $data['tbody'] = $this->user_model->index();
        $data['set_data'] = ['username', 'level_name', 'is_active'];
        $data['title'] = ['Username', 'Level', 'Active Status'];
        $data['url'] = [];
        $data['controller'] = 'Users';
        $this->load->view('component/table', $data);
        $show = [];
        render_file($show);
    }

    public function Create()
    {
        $data['pilihan'] = $this->user_model->LevelList();
        $data['data'] = [];
        $this->load->view('layout/head');
        $this->load->view('content/users/form', $data);
        $show = [];
        render_file($show);
    }

    public function Store()
    {
        if($this->input->post('name') == null)
        {
            redirect('/Users/Create');
        }
        else
        {
            $input['level_id'] = $this->input->post('level_id');
            $input['name'] = $this->input->post('name');
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['is_active'] = True;
            $input['is_deleted'] = False;
            $getname = str_split(" ", $input['name']);
            $input['username'] = $getname.rand(1000,9999);
            $input['password'] = md5($input['username']);
            $this->db->trans_start();
            $this->user_model->store($input);
            $data['id'] = $this->session->userdata('id');
            $data['type_of_activities'] = 'Tambah User Baru';
            $this->account_model->setHistory($data);
            $this->db->trans_complete();
            redirect('/Users/index');
        }
    }
}