<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $sql = "SELECT *, (SELECT name FROM levels where id = level_id) as level_name FROM users WHERE level_id != '2' and is_deleted = FALSE";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $array = [];
        if($result != [])
        {
            foreach($result as $data)
            {
                $data['is_active'] = (($data['is_active'] == True) ? 'Active' : 'Not Active' );
                array_push($array, $data);
            }
        }
        return $array;
    }

    public function store($data)
    {
        $this->db->insert('users', $data);
    }

    public function LevelList()
    {
        $sql = "SELECT id, name as value FROM levels WHERE id != '1' AND is_deleted = FALSE";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}