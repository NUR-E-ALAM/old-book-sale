<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model');
        //$this->output->enable_profiler(TRUE);
    }

    public function index(){
      

if($this->input->post('category')>1){
  $keyword  =  $this->input->post('category');
    $data['title']= 'searchReslut';
    $data['results']= $this->Search_model->cateogry_search($keyword);
    $this->load->view('searchresult',$data);
}
else{
   
        $keyword  =  $this->input->post('searchvalue');
        $data['title']= 'searchReslut';
        $data['results']= $this->Search_model->search($keyword);
        $this->load->view('searchresult',$data);
}

   
   
}

}