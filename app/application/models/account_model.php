<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function showByLogin($data)
    {
        $sql = "SELECT * FROM users WHERE username = '".$data['username']."' AND password = '".$data['password']."' AND is_active = TRUE AND is_deleted = FALSE LIMIT 1";
        $result = $this->db->query($sql);
        $detail = $result->row();
        if(is_null($detail))
        {
            return false;
        }
        else
        {
            $input['id'] = $detail->id;
            $input['type_of_activities'] = 'Login';
            $this->setHistory($input);
            $this->session->set_userdata('username', $detail->username);
            $this->session->set_userdata('name', $detail->name);
            $this->session->set_userdata('level_id', $detail->level_id);
            $this->session->set_userdata('id', $detail->id);
            if ($this->agent->is_mobile())
            {
                $this->session->set_userdata('device', 'mobile');
            }
            else
            {
                $this->session->set_userdata('device', 'desktop');
            }
            return true;
        }
    }

    public function setHistory($data)
    {
        $input['user_id'] = $data['id'];
        $input['type_of_activities'] = $data['type_of_activities'];
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['is_deleted'] = false;
        $this->db->insert('histories', $input);
    }
}