<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load necessary files
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(['Books_model']);
        $this->load->library('image_manip');
        $this->load->library('pagination');
        $this->load->helper('text');
    }
public function index(){
    
    if($this->session->userdata('role')==1){
        $data['title'] = "Show Books";
        $data['query'] = $this->Books_model->get_all_books();
        $config["base_url"] = base_url("Books/index");
        $config["total_rows"] = $this->Books_model->get_all_books()->num_rows();
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
        $link = $config["total_rows"]/$config["per_page"];
     
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
                $config['first_link'] = 'First Page';
                $config['first_tag_open'] = '<span class="firstlink">';
                $config['first_tag_close'] = '</span>';
                 
                $config['last_link'] = 'Last Page';
                $config['last_tag_open'] = '<span class="lastlink">';
                $config['last_tag_close'] = '</span>';
                 
                $config['next_link'] = 'Next Page';
                $config['next_tag_open'] = '<span class="nextlink">';
                $config['next_tag_close'] = '</span>';
        
                $config['prev_link'] = 'Prev Page';
                $config['prev_tag_open'] = '<span class="prevlink">';
                $config['prev_tag_close'] = '</span>';
        
                 
        
        $config["num_links"] = round($link);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['query'] = $this->Books_model->pag_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('Admin/showbooks', $data);
        
    }
    else{
        $data['title'] = "Show Books";
        $id=$this->session->userdata('user_id');
        $data['query'] = $this->Books_model->get_all_creart_user_books($id);
        $data["links"] = $this->session->userdata('name');
        $this->load->view('Admin/showbooks', $data);
        
    }

}
public function index_creart_user(){
    $data['title'] = "Show Books";
    $data["links"] = $this->session->userdata('name');
   
    $id=$this->session->userdata('user_id');

    $data['query'] = $this->Books_model->get_all_creart_user_books($id);
    
    $this->load->view('Admin/showbooks', $data);
}
public function addbooks()
{

    $this->form_validation->set_error_delimiters(
        '', '<br />');

    // Set validation rules
    $this->form_validation->set_rules('name',
        'Books Name', 'required|min_length[1]|max_length[125]');
           $this->form_validation->set_rules('price',
        'price', 'required|min_length[1]|max_length[5]');
        $this->form_validation->set_rules('author_name',
        'Book Writer name', 'required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('category[]', 'category',
        'required|min_length[1]|max_length[50]');
    $this->form_validation->set_rules('publication', 'publication name',
        'required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('description', 'description name',
        'required|min_length[10]|max_length[600]');
                   

    // Begin validation
    if ($this->form_validation->run() == false) {
        // First load, or problem with form
        $data['title'] = 'Add  Books';
        $data['page_title'] = 'Add New Books';
        $data['cat_options'] = $this->Books_model->get_categories();
        //var_dump($data); exit;
        $this->load->view('Admin/books', $data);
    } else {
        $this->load->library('image_lib');
       // var_dump($this->input->post());exit;
        $this->db->trans_begin();
        //print_r($_FILES['img_name']);
        //upload image
        //$config['images'] = FCPATH."/assets/booksimages/";
        $config['file_name'] = time()."_".rand(1000,5000).'.jpg';
        $config['upload_path'] = FCPATH."/assets/images/upload";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_ext_tolower'] = TRUE;
        //$config['max_size'] = '1000';
        //$config['max_width'] = '1024';
       // $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_name')){
            $error = array(
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Admin/uploadimage', $error);
        } 
        
        else{
            
            $data = $this->upload->data();
           $origional_image = $data['full_path'];
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';            
            //
            $data = array(
                'image_library' => 'gd2',
                'source_image' => $origional_image,
                //'create_thumb' => TRUE,
                'maintain_ratio' => TRUE,
                'width' => '800',
                'height' => '600'
                );
                if ($this->image_manip->resize_image($data)) {
                echo 'Image successfully resized<hr>';
                foreach ($data as $key => $value) {
                    echo "<li><strong>$key</strong>: $value</li>";
                 }
                } else {
                echo 'There was an error with the image processing.';
                }
                
                $config1['wm_type'] = 'overlay';
                $config1['quality'] = '80%';
                $config1['source_image'] = $origional_image;
        $config1['wm_overlay_path'] = FCPATH."assets/upload/logo.png";
        $config1['wm_vrt_alignment'] = 'middle';
        $config1['wm_hor_alignment'] = 'center';
        $config1['wm_opacity'] = '50';
        $this->image_lib->initialize($config1);
        //$this->load->library('image_lib', $config1);
        //$this->image_lib->initialize($config);
        
        if($this->image_lib->watermark()){
            echo 'Image watermarked <hr>';
            $f_name = $config['file_name'];
        }
        
        }

        //upload image
        $book = array(
        'bookname' => $this->input->post('name'),
        //'category_id' => $this->input->post('category'),
        'user_id'=>$this->session->userdata('user_id'),
        'price' => $this->input->post('price'),
        'author_name' => $this->input->post('author_name'),
        'description' => $this->input->post('description'),
        'image' => $f_name,
        'status'=>1,
        
         'publication' => $this->input->post('publication'),
        
    );
    $insert_id=$this->Books_model->add_books($book);
    
    
        if ($insert_id) {
           
             $category=$this->input->post('category');
            
             //var_dump($category);exit;
             $catCount=count($category);
             for ($i=0; $i<$catCount; $i++){ 
                 $bookCat=array();
                 $bookCat['category_id']=$category[$i];
                 $bookCat['books_id']= $insert_id;  
                 $this->db->insert('books_category', $bookCat);

             }
             if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
                else
{
        $this->db->trans_commit();
}

         redirect('Books');
        } else {
            redirect('addbooks');
        }
    }
        

}


public function delete($id){
    $this->db->where("id",$id);
    if($this->db->delete("books")){
        redirect("Books");
    }
}



public function edit_books() {
   
    $id = $this->uri->segment(3);
      // Begin validation
    
    // First load, or problem with form
    $query = $this->Books_model->get_edit_book($id);
       
        foreach ($query->result() as $row) {
            
            $bookname = $row->bookname ;
            $price = $row->price;
            $author_name = $row->author_name;
            $description = $row->description;
            $img_name = $row->image;
            $publication = $row->publication;
            $id=$row->id;

           
    }
   
    $data['bookname'] =(array('name' => 'bookname', 'id' => 'bookname',
    'value' => set_value('bookname', $bookname),  'class' => 'form-control', )); 
    $data['price'] =(array('name' => 'price', 'id' => 'price',
    'value' => set_value('price',  $price),  'class' => 'form-control', )); 
    $data['author_name'] =(array('name' => 'author_name', 'id' => 'author_name',
    'value' => set_value('author_name', $author_name),  'class' => 'form-control', )); 
  
    $data['img_name'] =(array('name' => 'img_name', 'id' => 'customFile','type'=>'file','value' => set_value('img_name', $img_name),  'class' => 'custom-file-input form-control','required'=>'required' )); 
    $data['publication'] =(array('name' => 'publication', 'id' => 'publication',
    'value' => set_value('publication', $publication),  'class' => 'form-control', )); 
    $data['description'] =(array('name' => 'description', 'type'=>'text-area','id' => 'description',
    'value' => set_value('description', $description),  'class' => 'form-control', )); 
    $data['id'] =(array('name' => 'id', 'id' => 'id',
    'value' => set_value('id', $id),  'class' => 'form-control d-none', )); 
    $data['title']="Edit Book";
        $data['page_title']="Edit Your Books information";
        //print_r($data['category_name']);exit;
        $this->load->view('Admin/bookedit', $data);
    }



public function update_book_data(){
     // Load support assets
    //$this->load->library('form_validation');
    
    $this->form_validation->set_rules('bookname',
    'Books name', 'required|min_length[1]|max_length[125]');
    
           $this->form_validation->set_rules('price',
        'price', 'required|min_length[1]|max_length[5]');
        $this->form_validation->set_rules('author_name',
        'Book Writer name', 'required|min_length[1]|max_length[200]');
    $this->form_validation->set_rules('publication', 'publication name',
        'required|min_length[1]|max_length[200]');
        $this->form_validation->set_rules('description', 'description name',
        'required|min_length[10]|max_length[600]');
        if ($this->form_validation->run() == FALSE) {
        $data['title']="Edit Book";
        $data['page_title']="Edit Your Books information";
        //print_r($data['category_name']);exit;
        $this->load->view('Admin/bookedit', $data);
    }
       else {
      $this->load->library('image_lib');
        $config['file_name'] = time()."_".rand(1000,5000).'.jpg';
        $config['upload_path'] = FCPATH."/assets/images/upload";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_ext_tolower'] = TRUE;
        //$config['max_size'] = '1000';
        //$config['max_width'] = '1024';
       // $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_name')){
            $error = array(
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Admin/uploadimage', $error);
        } 
        
        else{
            
            $data = $this->upload->data();
           $origional_image = $data['full_path'];
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';            
            //
            }
            $data = array(
                'image_library' => 'gd2',
                'source_image' => $origional_image,
                //'create_thumb' => TRUE,
                'maintain_ratio' => TRUE,
                'width' => '800',
                'height' => '600'
                );
                if ($this->image_manip->resize_image($data)) {
                echo 'Image successfully resized<hr>';
                foreach ($data as $key => $value) {
                    echo "<li><strong>$key</strong>: $value</li>";
                 }
                } else {
                echo 'There was an error with the image processing.';
                }
                
                $config1['wm_type'] = 'overlay';
                $config1['quality'] = '80%';
                $config1['source_image'] = $origional_image;
        $config1['wm_overlay_path'] = FCPATH."assets/upload/logo.png";
        $config1['wm_vrt_alignment'] = 'middle';
        $config1['wm_hor_alignment'] = 'center';
        $config1['wm_opacity'] = '50';
        $this->image_lib->initialize($config1);
        //$this->load->library('image_lib', $config1);
        //$this->image_lib->initialize($config);
        
        if($this->image_lib->watermark()){
            echo 'Image watermarked <hr>';
            $f_name = $config['file_name'];
        }
        
        
         
          // Validation passed, now escape the data
    $data = array(
        'bookname' => $this->input->post('bookname'),
        //'category_id' => $this->input->post('category'),
        'price' => $this->input->post('price'),
        'author_name' => $this->input->post('author_name'),
        'description' => $this->input->post('description'),
        'image' => $f_name,        
         'publication' => $this->input->post('publication'),
    );
   
    $id = $this->input->post('id');

    if ($this->Books_model->books_upaded($id, $data)) {
        redirect('Books');
        }
        else{
            echo "somethink wrong";
        }
        }
        }
        }




    
