<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load necessary files
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(['Category_model']);
        
       
    }
public function index(){
    
    if($this->session->userdata('role')==1){
        $data['title'] = "Show Category";
        $data['query'] = $this->db->get('category');
        $this->load->view('Admin/showcategory', $data);
        
    }
    else{
      
    }

}

public function addcategory()
{
    //show product entry form
    //$this->load->view('shop/add_product');
    $this->form_validation->set_error_delimiters(
        '', '<br />');

    // Set validation rules
    $this->form_validation->set_rules('name',
        'Books Name', 'required|min_length[1]|max_length[125]');
           
    // Begin validation
    if ($this->form_validation->run() == false) {
        // First load, or problem with form
        $data['title'] = 'Add category';
        $data['page_title'] = 'Add New Category';
        $this->load->view('Admin/category', $data);
    } else {

        $data = array(
        'name' => $this->input->post('name'),
        'user_id'=>$this->session->userdata('user_id'), 
        
    );
    if ($this->Category_model->add_category($data)) {
    
        redirect('Category');
        } else {
        redirect('Category/adcategory');
        }
           
}
     
}     
    
    


public function edit_booksfr(){
    $this->form_validation->set_error_delimiters(
        '', '<br />');

    // Set validation rules
    $this->form_validation->set_rules('name',
    'name', 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('img_name',
    'image name', 'required|min_length[1]|max_length[125]');
           $this->form_validation->set_rules('price',
        'price', 'required|min_length[1]|max_length[5]');
        $this->form_validation->set_rules('author_name',
        'Book Writer name', 'required|min_length[10]|max_length[200]');
        $this->form_validation->set_rules('category', 'category',
        'required|min_length[1]|max_length[50]');
    $this->form_validation->set_rules('publication', 'publication name',
        'required|min_length[10]|max_length[200]');
        $this->form_validation->set_rules('description', 'description name',
        'required|min_length[60]|max_length[200]');

if ($this->input->post()) {
    $id = $this->input->post('id');
    } else {
    $id = $this->uri->segment(3);
    }
    if ($this->form_validation->run() == FALSE) {
        // First load, or problem with form
        $query = $this->Books_model->get_book_id($id);
        foreach ($query->result() as $row) {
            $name = $row->name;
            $price = $row->price;
            $author_name = $row->author_name;
           // $category = $row->category_name;
            $description = $row->description;
            $image = $row->image;
            $publication = $row->publication;
            
            }
            
            $data['name'] =(array('name' => 'name', 'id' => 'name',
'value' => set_value('name', $name),  'class' => 'form-control', )); 
$data['price'] =(array('name' => 'price', 'id' => 'price',
'value' => set_value('price',  $price),  'class' => 'form-control', )); 
$data['author_name'] =(array('name' => 'author_name', 'id' => 'author_name',
'value' => set_value('author_name', $author_name),  'class' => 'form-control', )); 
// $data['category_name'] =(array('name' => 'category', 'id' => 'category_name',
// 'value' => set_value('category', $category),  'class' => 'form-control', )); 
$data['image'] =(array('name' => 'img_name', 'id' => 'customFile','type'=>'file','value' => set_value('image', $image),  'class' => 'custom-file-input form-control', )); 
$data['publication'] =(array('name' => 'publication', 'id' => 'publication',
'value' => set_value('publication', $publication),  'class' => 'form-control', )); 
$data['description'] =(array('name' => 'description', 'type'=>'text-area','id' => 'description',
'value' => set_value('description', $description),  'class' => 'form-control', )); 

$data['title']="Edit Book";
$data['page_title']="Edit Your Books information";
$this->load->view('Admin/bookedit', $data);
            }
    }
public function delete($id){
    $this->db->where("id",$id);
    if($this->db->delete("books")){
        redirect("Books");
    }
}
    }
