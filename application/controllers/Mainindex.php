<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainindex extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load necessary files
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model(['Books_model','Mainindex_model']);
        $this->load->library('pagination');
        $this->load->library('table');
        $this->load->database();
 //$this->output->enable_profiler(TRUE);
    }
	public function index()
	{
        $data['title']='Home';
        $data['cat_options'] = $this->Books_model->get_categories();
		$data['queryall'] = $this->Mainindex_model->get_all_books();
		$data['query'] = $this->Mainindex_model->get_5_books();
        //$this->load->view('mainindex',$data);
           
        
    $config["base_url"] = base_url("Mainindex/index");
    $config["total_rows"] = $this->Mainindex_model->get_all_books()->num_rows();
    $config["per_page"] = 12;
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
    $data['queryall'] = $this->Mainindex_model->pag_data($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();
   // var_dump($data);exit;
    $this->load->view('mainindex', $data);

        
    }
    
	public function showall(){
		$id = $this->uri->segment(3);
    $data['title']="Single view";
    $data['query']=$this->Mainindex_model->show_single_book($id);
    $data['query1']=$this->Mainindex_model->show_single_book_category($id);
   // var_dump($data1);exit;

     $data['comments']=$this->Mainindex_model->getallcomment($id);
     $data['havecomments']=$this->Mainindex_model->getcommentsnumwhere($id);
	$this->load->view('single',$data);

}

public function showuserdetails($id){
    $data['query']=$this->Mainindex_model->show_single_writer_details($id);
    $data['title']="User Details";
    $this->load->view('user_details',$data);
    
}


  
public function add_comment($id){
    $this->form_validation->set_error_delimiters(
        '', '<br />');
        // Set validation rules
        $this->form_validation->set_rules('name',
        'Your Name', 'required|min_length[1]|max_length[125]');
            $this->form_validation->set_rules('commentdetails',
        'Your Message', 'required|min_length[10]|max_length[240]');
    
      if ($this->form_validation->run() == false) {
        $data['query']=$this->Mainindex_model->show_single_book($id);
        $data['query1']=$this->Mainindex_model->show_single_book_category($id);
       // var_dump($data1);exit;
    
         $data['comments']=$this->Mainindex_model->getallcomment($id);
         $data['havecomments']=$this->Mainindex_model->getcommentsnumwhere($id);
        $data['title']="Single view";
        $this->load->view('single',$data);
      }
      else{
  //var_dump($row); exit;
   $data= array(
   'comment_book_id' =>$id,
   'com_name'=>$this->input->post('name'),
   'comment_details'=>$this->input->post('commentdetails')
   );
}
  
 if ($this->Mainindex_model->addcomment($data)) {
 redirect('Mainindex/showall/'.$id);
} else {
   echo "Comment Something wrong";
}
}
  
}
