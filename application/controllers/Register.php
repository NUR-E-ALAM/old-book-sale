<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security');
    $this->load->model('Register_model');
    $this->load->library(["form_validation","session"]);
       
    }

    public function index() {
     if ($this->session->userdata('logged_in') == TRUE){
    redirect('Admin');
     }
     else{
        
   redirect('Register/register_user');
    }
}
    public function register_user() {
    // Load support assets
    
    $this->form_validation->set_error_delimiters(
    '', '<br />');
    // Set validation rules
    $this->form_validation->set_rules('name',
    'Your Name', 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('email_address', 'Email',
    'required|min_length[1]|max_length[255]|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('pass','Password', 'required|min_length[5]|max_length[15]');
    $this->form_validation->set_rules('pass1','Confirmation Password','required|min_length[5]|max_length[15]|matches[pass]');
    $this->form_validation->set_rules('phone','Phone number','required|min_length[10]|max_length[30]|is_unique[users.phone]');
     
    if ($this->form_validation->run() == FALSE) {
    // First load, or problem with form
    $data['title'] = "Register";
    $this->load->view('register',$data);
    }else {

    
        $config['file_name'] = time()."_".rand(1000,5000);
        $config['upload_path'] = FCPATH."/assets/images/profilephoto";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_ext_tolower'] = TRUE;
    
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_name')){
            $error = array(
                'error' => $this->upload->display_errors('img_name')
            );
            $this->load->view('Admin/uploadimage', $error);
        }
        else{
            
            $data = $this->upload->data();
            $f_name = $data['file_name'];
           
        }
        //upload image
    $hash = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
    $data = array(
    'username' => $this->input->post('name'),
    'imagename' => $f_name,
    'email' => $this->input->post('email_address'),
    'mobile' =>  $this->input->post('phone'),
    'pass' => $hash,
    'role' =>2,
    );
    if ($this->Register_model->register_user($data)) {
    
    redirect('Admin');
    } else {
    redirect('register');
    }
    }
    }

public function edit_register(){
    
    $id = $this->uri->segment(3);
    
    // Begin validation
   
    // First load, or problem with form
    $query = $this->Register_model->getuser_id($id);
       
        foreach ($query->result() as $row) {
            
            $username = $row->username ;
            $imagename = $row->imagename ;
            $email = $row->email;
            $mobile = $row->mobile;
           
            
    }
    
    $data['username'] =(array('name' => 'username',
     'id' => 'username',
    'value' => set_value('username', $username),  'class' => 'form-control', )); 
    $data['imagename'] =(array('name' => 'imagename', 'id' => 'customFile','type'=>'file', 'required'=>'required', 'value' => set_value('imagename', $imagename), 'required', 'class' => 'custom-file-input form-control', )); 
    $data['email'] =(array('name' => 'email', 'id' => 'email',
    'value' => set_value('email', $email),  'class' => 'form-control', )); 
    $data['mobile'] =(array('name' => 'mobile', 'id' => 'mobile',
    'value' => set_value('mobile', $mobile),  'class' => 'form-control', )); 
   
        $data['title']="Edit User";
        $data['page_title']="Edit Your information";
        //print_r($data['category_name']);exit;
        $this->load->view('Admin/update_user', $data);
}

public function edit_registerdata() {
    // Load support assets
    //$this->load->library('form_validation');
    $this->form_validation->set_rules('username',
    'Your Name', 'required|min_length[1]|max_length[125]');
    $this->form_validation->set_rules('email', 'Email',
    'required|min_length[1]|max_length[255]|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('mobile','Phone number','required|min_length[10]|max_length[30]');
    
      if ($this->form_validation->run() == FALSE) {
 $data['title']="Edit User";
        $data['page_title']="Edit Your information";
        //print_r($data['category_name']);exit;
        $this->load->view('Admin/update_user', $data);
      }
   
        $config['file_name'] = time()."_".rand(1000,5000);
        $config['upload_path'] = FCPATH."/assets/images/profilephoto";
        $config['allowed_types'] = 'jpg';
        $config['file_ext_tolower'] = TRUE;
        $config['max_size'] = '1000';
       
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('imagename')){
            $error = array(
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Admin/uploadimage', $error);
        }
        else{
            
            $data = $this->upload->data();
            $f_name = $data['file_name'];
           
        }
        //upload image
  
    $data2 = array(
    'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'imagename' => $f_name,
         'mobile' => $this->input->post('mobile'),
    );
   // var_dump($data2);exit;
     $id=$this->session->userdata('user_id');
    if ($this->Register_model->update_user($id, $data2)) {
        redirect('admin');
        }
    else {
    echo "some think wrong";
    }
    }
    }
























