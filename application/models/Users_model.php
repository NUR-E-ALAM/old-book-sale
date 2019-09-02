<?php if ( ! defined('BASEPATH')) exit('No direct script
 access allowed');
class books_model extends CI_Model {
 function __construct() {
 parent::__construct();
 }
 public function get_all_books() {
 return $this->db->get('books');
 }
 public function process_create_user($data) {
 if ($this->db->insert('books', $data)) {
 return true;
 } else {
 return false;
 }
 }
 public function process_update_user($id, $data) {
 $this->db->where('id', $id);
 if ($this->db->update('books', $data)) {
 return true;
 } else {
 return false;
 }
 }
 public function get_user_details($id) {
 $this->db->where('id', $id);
 return $this->db->get('books');
 }
 public function delete_user($id) {
 $this->db->where('id', $id);
 if ($this->db->delete('books')) {
 return true;
 } else {
 return false;
 }
 }
 public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("users");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("users");
    }
}
