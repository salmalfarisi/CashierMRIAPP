<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menus extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        check_permission([1,2]);
    }
    
    public function Index()
    {
        $this->load->view('layout/head');
        $this->load->view('content/menus/index');
        $data['tbody'] = $this->menu_model->index();
        $data['set_data'] = ['name', 'qty_ready', 'type_food', 'price',];
        $data['title'] = ['Nama', 'Qty', 'Jenis Makanan', 'Harga'];
        if($this->session->userdata('level_id') == 1)
        {
            $data['url'] = ['edit', 'destroy'];
        }
        else
        {
            $data['url'] = ['edit'];
        }
        $data['controller'] = 'Menus';
        $this->load->view('component/table', $data);
        $show = [];
        render_file($show);
    }

    public function Create()
    {  
        $this->load->view('layout/head');
        $data['data'] = [];
        $this->load->view('content/menus/form', $data);
        $show = [];
        render_file($show);
    }

    public function Store()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('qty_ready', 'Total saat ini', 'required|greater_than[0]');
        $this->form_validation->set_rules('price', 'Harga', 'required|greater_than[9999]');
        if ($this->form_validation->run() == FALSE)
        {
            redirect('/Menus/Create');
        }
        else
        {
            $input['name'] = $this->input->post('name');
            $input['price'] = $this->input->post('price');
            $input['qty_ready'] = $this->input->post('qty_ready');
            $input['is_food'] = ($this->input->post('is_food') == 0 ? False : True );
            $input['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_begin();
            $this->menu_model->store($input);
            $data['id'] = $this->session->userdata('id');
            $data['type_of_activities'] = 'Tambah Menu Baru';
            $this->account_model->setHistory($data);
            $this->db->trans_complete();
            redirect('/Menus/Index');
        }
    }

    public function Edit($id)
    {  
        $this->load->view('layout/head');
        $data['data'] = $this->menu_model->show($id);
        $this->load->view('content/menus/form', $data);
        $show = [];
        render_file($show);
    }

    public function Update($id)
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('qty_ready', 'Total saat ini', 'required|greater_than[0]');
        $this->form_validation->set_rules('price', 'Harga', 'required|greater_than[9999]');
        if ($this->form_validation->run() == FALSE)
        {
            redirect('/Menus/Edit/'.$id);
        }
        else
        {
            $input['name'] = $this->input->post('name');
            $input['price'] = $this->input->post('price');
            $input['qty_ready'] = $this->input->post('qty_ready');
            $input['is_food'] = ($this->input->post('is_food') == 0 ? False : True );
            $input['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_begin();
            $this->menu_model->update($id, $input);
            $data['id'] = $this->session->userdata('id');
            $data['type_of_activities'] = 'Ubah Data Menu';
            $this->account_model->setHistory($data);
            $this->db->trans_complete();
            redirect('/Menus/Index');
        }
    }

    public function Destroy($id)
    {
        $this->db->trans_begin();
        $input['deleted_at'] = date('Y-m-d H:i:s');
        $input['is_deleted'] = true;   
        $this->menu_model->update($id, $input);
        $data['id'] = $this->session->userdata('id');
        $data['type_of_activities'] = 'Hapus Menu';
        $this->account_model->setHistory($data);
        $this->db->trans_complete();
        redirect('/Menus/Index');
    }
}