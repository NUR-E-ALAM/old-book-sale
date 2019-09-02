<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
   
    public function add_category($data)
    {
        return   $this->db->insert('category', $data);
       
    }
    public function get_all_books()
    {
        //select * from users
        $this->db->order_by('id','dese');
        return $this->db->get('books');
    }
    public function  get_all_creart_user_books($id) {
            $this->db->where('user_id', $id);
           return $this->db->get('books');
            
    }
    
    public function get_book_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('books');
    }
    public function user_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    


}
