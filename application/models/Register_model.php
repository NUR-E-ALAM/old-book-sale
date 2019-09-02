<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function register_user($data)
    {
        if ($this->db->insert('users', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_user($id, $data2)
    {
        $this->db->where('user_id', $id);
      return  $this->db->update('users', $data2);
    }
    public function getuser_id($id)
    {
          $this->db->where('user_id', $id);
          return $this->db->get('users',$id);
     }

    public function user_upaded($id, $data)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            return false;
        }
    }


}