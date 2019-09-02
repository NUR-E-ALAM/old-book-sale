<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){

        parent::__construct();
        $this->load->helper(['form','url']);
        $this->load->library(["form_validation","session"]);
        $this->load->model('Profile_model');
       
      
    }
      
	public function index()	{
       
      $this->load->view('Admin/index');
      
    }
public function addprofile(){
        $this->form_validation->set_error_delimiters(
            '', '<br />');
    
 $this->form_validation->set_rules('country','country', 'required');
 $this->form_validation->set_rules('division', 'division','required');
 $this->form_validation->set_rules('district','district', 'required');
 $this->form_validation->set_rules('upazila','upazila', 'required');
 $this->form_validation->set_rules('bod','bod', 'required');
 $this->form_validation->set_rules('gender','gender', 'required');
 
 

  if ($this->form_validation->run() == false) {
     $data['title'] = 'Add Proflile';
     $data['div_options'] = $this->Profile_model->get_division();
     $data['dist_options'] = $this->Profile_model->get_district();
     $data['upa_options'] = $this->Profile_model->get_upazila();
         $this->load->view('Admin/profile',$data);
			}
    else{
     $data=array(  
         'user_id'=>$this->session->userdata('user_id'),     
        'bod'=>$this->input->post('bod'),
        'gender'=>$this->input->post('gender'),
        'country'=>'Banglaseh',
        // 'country'=>$this->input->post('country'),
        'divisions'=>$this->input->post('division'),
        'districs'=>$this->input->post('district'),
        'upazilas'=>$this->input->post('upazila'),
        
     );
   
      
       if ($this->Profile_model->add_profile($data)) {
        $this->load->view('Admin/updatesuccessmessage',$data);
          
          }
           else{
            
                 redirect('Admin');
           }
     
        }
      
	  }


public function updateprofile(){
    $this->form_validation->set_error_delimiters(
        '', '<br />');

    // Set validation rules
   $this->form_validation->set_rules('country','country', 'required');
 $this->form_validation->set_rules('division', 'division','required');
 $this->form_validation->set_rules('district','district', 'required');
 $this->form_validation->set_rules('upazila','upazila', 'required');
 $this->form_validation->set_rules('bod','bod', 'required');
 $this->form_validation->set_rules('gender','gender', 'required');
 
 

if ($this->input->post()) {
    $id = $this->input->post('id');
    } else {
    $id = $this->uri->segment(3);
    }
    if ($this->form_validation->run() == FALSE) {
        // First load, or problem with form
        $query = $this->Profile_model->get_profiler_id($id);
        //var_dump($id); exit;
        foreach ($query->result() as $row) {
            $bod = $row->bod;
            $gender = $row->gender;
            $country = $row->country;
            $division = $row->divisions;
            $district = $row->districs;
            $upazila = $row->upazilas;
            
            }
            
            $data['bod'] =(array('name' => 'bod', 'id' => 'bod',
'value' => set_value('bod', $bod), 'type'=>'date', 'class' => 'form-control', )); 

$data['gender'] =(array('name' => 'gender', 'id' => 'gender',
'value' => set_value('gender',  $gender), 'type'=>'text', 'class' => 'form-control', )); 

$data['country'] =(array('name' => 'country', 'id' => 'author_name',
'value' => set_value('country', $country),  'type'=>'text', 'class' => 'form-control', )); 

 $data['division'] =(array('name' => 'division', 'id' => 'divisions',
 'value' => set_value('division', $division),  'class' => 'form-control', )); 
$data['district'] =(array('name' => 'district', 'id' => 'districs',
'value' => set_value('district', $district),  'class' => 'form-control', )); 

$data['upazila'] =(array('name' => 'upazila', 'id' => 'upazilas','value' => set_value('upazila', $upazila),  'class' => 'form-control', )); 

$data['title']="Update Profile";
$data['page_title']="Update Personal Information";
$this->load->view('Admin/update_profile', $data);
            }
    }





}


	

