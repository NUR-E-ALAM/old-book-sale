<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
function __construct() {
    parent::__construct();
}
public function get_all_users() {
    return $this->db->select('*')->from('profile')->join('users', 'users.user_id = profile.user_id')->get();
 
    }
    public function get_single_user($id) {
          $this->db->where('user_id', $id);
          return $this->db->get('users');
        //  return $this->db->select('*')->from('users')->join('profile', 'profile.user_id = users.user_id')->where('user_id', $id)->get();
        
        
        }
public function does_user_exist($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    return $query;
}
public function process_update_user($id, $data)
    {
        $this->db->where('role', $id);
        if ($this->db->update('role', $data)) {
            return true;
        } else {
            return false;
        }
    }

}