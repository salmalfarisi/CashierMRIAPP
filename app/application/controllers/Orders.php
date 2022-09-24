<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Orders extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('menu_model');
        check_permission([1,3,4]);
    }

    public function Index()
    {
        $this->load->view('layout/head');
        $this->load->view('content/orders/index');
        $data['tbody'] = $this->order_model->index();
        $data['set_data'] = ['name', 'number_of_table', 'status_pemesanan', 'harga'];
        $data['title'] = ['Nomor Transaksi', 'Nomor Meja', 'Status Pemesanan', 'Total Harga'];
        if($this->session->userdata('level_id') == 1)
        {
            $data['url'] = ['show'];
        }
        else
        {
            $data['url'] = ['show', 'edit'];
        }
        $data['controller'] = 'Orders';
        $this->load->view('component/table', $data);
        $show = [];
        render_file($show);
    }
    
    public function Create()
    {
        $this->load->view('layout/head');
        $data['order_list'] = [];
        $data['order'] = [];
        $data['status_order'] = true;
        $data['pilihan'] = $this->menu_model->indexbasedproduk();
        $this->load->view('content/orders/form', $data);
        $show = ['content/orders/js'];
        render_file($show);
    }

    public function Store()
    {
        if($this->input->post('number_of_table') == null or count($this->input->post('menu_id')) == 0)
        {
            redirect('Orders/Create');
        }
        
        $parent['number_of_table'] = $this->input->post('number_of_table');
        $parent['user_id'] = $this->session->userdata('id');
        $parent['is_finish'] = false;
        $parent['name'] = 'ABC'.date('d').date('m').date('Y').'-'.$parent['number_of_table'];
        $parent['created_at'] = date('Y-m-d H:i:s');
        $parent['is_deleted'] = false;
        
        $this->db->trans_begin();
        $id = $this->order_model->insert_parent($parent);
        $this->order_model->insert_child($id);
        $data['id'] = $this->session->userdata('id');
        $data['type_of_activities'] = 'Tambah Pesanan Baru';
        $this->account_model->setHistory($data);
        $this->db->trans_complete();

        redirect('/Orders/Index');
    }

    public function Show($id)
    {
        $this->load->view('layout/head');
        $data['order'] = $this->order_model->showParent($id);
        $data['order_list'] = $this->order_model->showChild($id);
        $data['status_order'] = false;
        $this->load->view('content/orders/form', $data);
        $show = ['content/orders/js'];
        render_file($show);
    }

    public function Edit($id)
    {
        $this->load->view('layout/head');
        $data['pilihan'] = $this->menu_model->indexbasedproduk();
        $data['order'] = $this->order_model->showParent($id);
        $data['order_list'] = $this->order_model->showChild($id);
        $data['status_order'] = true;
        $this->load->view('content/orders/form', $data);
        $show = ['content/orders/js'];
        render_file($show);
    }

    public function Update($id)
    {
        $this->db->trans_begin();
        $this->order_model->updateChild($id);
        $data['id'] = $this->session->userdata('id');
        $data['type_of_activities'] = 'Ubah Pesanan';
        $this->account_model->setHistory($data);
        $this->db->trans_complete();
    }

    public function Destroy($id)
    {

    }

    public function Approval($id)
    {
        $this->db->trans_begin();
        $input['is_finish'] = true;
        $input['updated_at'] = date('Y-m-d H:i:s');
        $id = $this->order_model->approval($id, $input);
        $data['id'] = $this->session->userdata('id');
        $data['type_of_activities'] = 'Melakukan Penyimpan data Pemesanan';
        $this->account_model->setHistory($data);
        $this->db->trans_complete();
        redirect('/Orders/Index');
    }
}