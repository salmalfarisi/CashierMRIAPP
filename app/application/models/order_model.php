<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $level = $this->session->userdata('level_id');
        if($level == 1)
        {
            $sql = "SELECT * FROM orders WHERE is_deleted = FALSE";
        }
        else
        {
            $sql = "SELECT * FROM orders WHERE is_finish = FALSE AND is_deleted = FALSE";
        }
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $array = [];
        if(count($result) != 0)
        {
            foreach($result as $data)
            {
                $total = 0;
                $sql2 = "SELECT * FROM orders_lists WHERE order_id = ".$data['id']." AND is_deleted = false";
                $query = $this->db->query($sql2);
                $result2 = $query->result_array();
                foreach($result2 as $datas2)
                {
                    $total = $total + ($datas2['price'] * $datas2['total']);
                }
                $data['harga'] = $total;
                $data['status_pemesanan'] = ($data['is_finish'] == true ? 'Selesai' : 'Proses');
                
                array_push($array, $data);
            }
        }

        return $array;
    }

    public function insert_parent($data)
    {
        $this->db->insert('orders', $data);
        $sql = "SELECT * FROM orders WHERE created_at = '".$data['created_at']."' LIMIT 1";
        
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0]->id;
    }

    public function insert_child($id)
    {
        foreach($this->input->post('menu_id') as $i => $vali)
        {
            foreach($this->input->post('total') as $j => $valj)
            {
                foreach($this->input->post('harga') as $k => $valk)
                {
                    if($i == $j and $j == $k)
                    {
                        $input['order_id'] = $id;
                        $input['menu_id'] = $vali;
                        $input['total'] = $valj;
                        $input['price'] = $valk;
                        $input['created_at'] = date('Y-m-d H:i:s');
                        $input['is_deleted'] = false;
                        $this->db->insert('orders_lists', $input);

                        $sql = "SELECT * FROM menus WHERE id = ".$vali." AND is_deleted = FALSE";
                        $query = $this->db->query($sql);
                        $result = $query->result();

                        $setchange['qty_ready'] = $result[0]->qty_ready - $input['total'];
                        $setchange['updated_at'] = date('Y-m-d H:i:s');
                        $this->db->where('id', $result[0]->id);
                        $this->db->update('menus', $setchange);
                    }
                }
            }
        }
    }

    public function showParent($id)
    {
        $sql = "SELECT * FROM orders WHERE id = '".$id."' LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        $total = 0;
        $sql2 = "SELECT * FROM orders_lists WHERE order_id = '".$result[0]->id."' AND is_deleted = false";
        $query = $this->db->query($sql2);
        $result2 = $query->result_array();
        foreach($result2 as $datas2)
        {
            $total = $total + ($datas2['price'] * $datas2['total']);
        }
        $result[0]->harga = $total;

        return $result[0];
    }

    public function showChild($id)
    {
        $total = 0;
        $sql2 = "SELECT * FROM orders_lists WHERE order_id = '".$id."' AND is_deleted = false";
        $query = $this->db->query($sql2);
        $result = $query->result_array();
        $array = [];
        
        foreach($result as $data)
        {
            $tempsql = "SELECT * FROM menus WHERE id = '".$data['menu_id']."' AND is_deleted = false LIMIT 1";
            $tempquery = $this->db->query($tempsql);
            $tempresult = $tempquery->result();
            $data['menu_name'] = $tempresult[0]->name;
            $data['finalharga'] = $data['total'] * $data['price']; 
            array_push($array, $data);
        }

        return $array;
    }

    public function updateChild($id)
    {
        $sql2 = "SELECT * FROM orders_lists WHERE order_id = '".$id."' AND is_deleted = false";
        $query = $this->db->query($sql2);
        $result = $query->result_array();
        
        foreach($result as $data)
        {
            $input['is_deleted'] = true;
            $this->db->where('id', $data['id']);
            $this->db->update('order_lists', $input);
        } 

        foreach($this->input->post('menu_id') as $i => $vali)
        {
            foreach($this->input->post('total') as $j => $valj)
            {
                foreach($this->input->post('harga') as $k => $valk)
                {
                    if($i == $j and $j == $k)
                    {
                        $input['order_id'] = $id;
                        $input['menu_id'] = $vali;
                        $input['total'] = $valj;
                        $input['price'] = $valk;
                        $input['created_at'] = date('Y-m-d H:i:s');
                        $input['is_deleted'] = false;
                        $this->db->insert('orders_lists', $input);

                        $sql = "SELECT * FROM menus WHERE id = ".$vali." AND is_deleted = FALSE";
                        $query = $this->db->query($sql);
                        $result = $query->result();

                        $setchange['qty_ready'] = $result[0]->qty_ready - $input['total'];
                        $setchange['updated_at'] = date('Y-m-d H:i:s');
                        $this->db->where('id', $result[0]->id);
                        $this->db->update('menus', $setchange);
                    }
                }
            }
        }
    }

    public function approval($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('orders', $data);
    }
}