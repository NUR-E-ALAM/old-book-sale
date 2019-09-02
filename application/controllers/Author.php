<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load necessary files
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(['Author_model']);
        
        $this->load->database();
    }
	public function index()
	{
         $data['title'] = "Author";
    $data['query'] = $this->Author_model->get_all_author();
    $this->load->view('Admin/showauthor', $data);
    }
    function add_author(){
        $this->form_validation->set_error_delimiters(
            '', '<br />');

        // Set validation rules
        $this->form_validation->set_rules('name',
            'Product Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('description',
            'description', 'required|min_length[10]|max_length[200]');
               $this->form_validation->set_rules('books', 'Book name',
            'required|min_length[1]|max_length[255]');
        // Begin validation
        if ($this->form_validation->run() == false) {
            // First load, or problem with form
            $data['title'] = 'Add New Books Form';
            $this->load->view('Admin/author', $data);
        } else {
            
            //$this->session->userdata('user_id')
            //upload image
            $data = array(
            'user_id' => 1, 
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
           'books' => $this->input->post('books'),
            
        );
            if ($this->Author_model->add_author($data)) {
                redirect('Author');
            } else {
                //redirect('product');
            }
        }
    }

    
        }
