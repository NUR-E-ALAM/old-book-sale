<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Books_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_categories()
    {
        $categories = $this->db->get("category");
        $options = [];
        
foreach ($categories->result() as $row) {
    $options[$row->id] = $row->name;
}
return $options;
    }
    
    public function add_books($book)
    {
         $this->db->insert('books', $book );
        return $this->db->insert_id();
        
    }
    public function get_all_books()
    {
        //select * from users
        $this->db->order_by('id','desc');
        return $this->db->get('books');
    }
    public function  get_all_creart_user_books($id) {
            $this->db->where('user_id', $id);
           return $this->db->get('books');
            
    }
    
    public function get_edit_book($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('books');
    }
     public function category_id($id)
   {
         $this->db->where('books_id', $id);
         return $this->db->get('books_category',$id);
    }
    public function category_id1()
    {
        return $this->db->get('category');
    }
    public function user_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function books_upaded($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('books', $data)) {
            return true;
        } else {
            return false;
        }
    }
// for pagination
 
public function pag_data($limit,$p){
    $this->db->limit($limit,$p);
    return $this->db->get("books");
}

 
public function pag_data1($limit,$p){
    
    $this->db->limit($limit,$p);
    return $this->db->get('books');
}

}
