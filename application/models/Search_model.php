<?php 
Class Search_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function searchvalueresult($category,$searchvalue) {
return $this->db->select('*')
->from('books')
->join('books_category', 'books.id = books_category.books_id')
->where('category_id', $category)
->where('bookname',$searchvalue)
->get(); 
} 

Public function search($search){ 
        $this->db->like('books.bookname', $search);
        $this->db->or_like('books.description ', $search); 
        $this->db->or_like('books.author_name', $search); 
        $this->db->or_like('books.user_id ', $search); 
        $this->db->or_like('books.publication ', $search); 
       // $this->db->or_like('books.phone ', $search); 
        $this->db->or_like('books.price', $search); 
        return  $this->db->get("books");
        
        }

        public function cateogry_search($keyword){
            return $this->db->select('*')->from('books_category')->join('books', 'books.id = books_category.books_id')->where('category_id', $keyword)->get();
 }
} 
