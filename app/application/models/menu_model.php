<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sql = 'SELECT * FROM menus WHERE is_deleted = false';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $array = [];

        foreach($result as $data)
        {
            $data['type_food'] = ($data['is_food'] == true ? 'Makanan' : 'Minuman');
            array_push($array, $data); 
        }
        return $array;
    }

    public function indexbasedproduk()
    {
        $sql = 'SELECT id, name as value, qty_ready, price, is_food FROM menus WHERE qty_ready > 0 and is_deleted = false order by is_food DESC';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        
        return $result;
    }

    public function show($id)
    {
        $sql = "SELECT * FROM menus WHERE id = '".$id."' AND is_deleted = false LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result();

        $result[0]->type_of_food = ($result[0]->is_food == true ? 'Makanan' : 'Minuman');
        $data = $result[0];

        return $data;
    }

    public function store($data)
    {
        $this->db->insert('menus', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('menus', $data);
    }
}