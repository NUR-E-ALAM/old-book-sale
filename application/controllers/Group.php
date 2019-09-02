<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load necessary files
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(['Group_model']);
        
        $this->load->database();
    }
	public function index()
	{
        $data['title'] = "Group";
        $data['query'] = $this->Group_model->get_all_group();
        $this->load->view('Admin/showgroup', $data);
    }
    function add_group(){
        $this->form_validation->set_error_delimiters(
            '', '<br />');

        // Set validation rules
        $this->form_validation->set_rules('name',
            'group name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('description',
            'group_id', 'required|min_length[10]|max_length[200]');
               $this->form_validation->set_rules('books', 'Book name',
            'required|min_length[1]|max_length[255]');
        // Begin validation
        if ($this->form_validation->run() == false) {
            // First load, or problem with form
            $data['title'] = 'Add New Group';
            $this->load->view('Admin/group', $data);
        } else {
            
            //$this->session->userdata('user_id')
            //upload image
            $data = array(
            'user_id' =>$this->session->userdata('user_id'), 
            'group_name' => $this->input->post('name'),
            'group_description' => $this->input->post('description'),
           //'books' => $this->input->post('books'),
            
        );
            if ($this->Group_model->add_group($data)) {
                redirect('Group');
            } else {
                //redirect('product');
            }
        }
    }

    
        }
