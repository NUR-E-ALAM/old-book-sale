<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    public function __construct(){

        parent::__construct();
        $this->load->helper(['form','url']);
        $this->load->library(["form_validation","session"]);
        $this->load->model('Admin_model');
        $this->load->library('pagination');
        // $this->output->enable_profiler(TRUE);
    }
    public function index()
	{
        //$this->load->view("signin/signin");
        redirect('Admin/login');
    }
    
    public function login(){
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('Admin/loggedin');
            } else {
            
            // Set validation rules for view filters
            $this->form_validation->set_rules('email', 'Email',
            'required|valid_email');
            $this->form_validation->set_rules('pass',
            'Password ', 'required|min_length[5]|max_length[30]');
            if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Login";
            $this->load->view('signin',$data);
			
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            
            $query = $this->Admin_model->does_user_exist($email);
            if ($query->num_rows() == 1) {
            // One matching row found
            foreach ($query->result() as $row) {
                
            // Generate hash from a their password
            
            // Compare the generated hash with that in the
// database
if (!password_verify($password, $row->pass )) {
    // Didn't match so send back to login
    $data['login_fail'] = true;
    $this->load->view('signin', $data);
    } else {
    $data = array(
    'user_id' => $row->user_id,
    'name' => $row->username,
    'image' => $row->imagename,
    'role' => $row->role,
    'email' => $row->email,
    'logged_in' => TRUE
    );
    // Save data to session
    $this->session->set_userdata($data);
    redirect('Admin/loggedin');
    }
    }
}
else{
    $data['login_fail'] = true;
    $this->load->view('signin', $data);
}
        }
    }
    }

    function loggedin() {




        if ($this->session->userdata('logged_in') == TRUE) {
            $data['title'] = "Admin";
            if($this->session->userdata('role')==1){
                $data['query'] = $this->Admin_model->get_all_users();
                $this->load->view('Admin/index', $data);
            }
            else{
                $id=$this->session->userdata('user_id');
                //var_dump($id);exit;
                $data['query'] = $this->Admin_model->get_single_user($id);
                //var_dump($data);exit;
                $this->load->view('Admin/index', $data);
            }
        
        } else {
        redirect('Admin');
        }
        }
    
     //start forget password

    public function forgot_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');

        if ($this->form_validation->run() == false) {
            $this->load->view('signin/forgot_password');
        } else {
            $email = $this->input->post('email');
            $this->db->where('user_email', $email);
            $this->db->from('register');
            $num_res = $this->db->count_all_results();
            if ($num_res == 1) {
                // Make a small string (code) to assign to the user
                // to indicate they've requested a change of
                // password
                $code = mt_rand('5000', '200000');
                $data = array(
        'forgot_password' => $code,
        );
                $this->db->where('user_email', $email);
                if ($this->db->update('register', $data)) {
                    // Update okay, send email
                    //http://idbbisew.com/r37/ci/ch4/signin/forgot_password
                    $url = 'http://idbbisew.com/r37/ci/ch4/signin/new_password/'.$code;
                    $body = "\nPlease click the following link to
        reset your password:\n\n".$url."\n\n";
                    if (mail($email, 'Password reset', $body,
        'From: no-reply@domain.com')) {
                        $data['submit_success'] = true;
                        $this->load->view('signin/signin', $data);
                    }
                } else {
                    // Some sort of error happened, redirect user
                    // back to form
                    redirect('singin/forgot_password');
                }
            } else {
                // Some sort of error happened, redirect user back
                // to form
                redirect('singin/forgot_password');
            }
        }
    }

    public function new_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Code', 'required|min_length[4]|max_length[7]');

        $this->form_validation->set_rules('email', 'Email',
        'required|valid_email|min_length[5]|max_length[125]');

        $this->form_validation->set_rules('password1',
        'Password', 'required|min_length[5]|max_length[15]');

        $this->form_validation->set_rules('password2',
        'Confirmation Password', 'required|min_length[5]|max_length[15]|matches[password1]');

        // Get Code from URL or POST and clean up
        if ($this->input->post()) {
            $data['code'] = xss_clean($this->input->post('code'));
        } else {
            $data['code'] = xss_clean($this->uri->segment(3));
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('signin/new_password', $data);
        } else {
            // Does code from input match the code against the
            // email
            $this->load->model('Signin_model');
            $email = xss_clean($this->input->post('email'));
            if (!$this->Signin_model->does_code_match($data['code'], $email)) {
                // Code doesn't match
                redirect('signin/forgot_password');
            } else {// Code does match
                $this->load->model('Register_model');
                $hash = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                //password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $data = array('user_hash' => $hash);
                if ($this->Register_model->update_user(
$data, $email)) {
                    redirect('signin');
                }
            }
        }
    }

    //end Forget password

    //for start logout
function logout(){
    $this->session->sess_destroy();
    redirect("Admin/login");
}
function logout_home(){
    $this->session->sess_destroy();
    redirect("Mainindex");
}
public function delete($id){
        $this->db->where("user_id",$id);
    if($this->db->delete("users")){
        redirect("Admin");
    }
}

public function updatestatus()
    {
        
        $managerId = $this->input->post('mid');
        //$data=['action' =>($this->input->post('mstatus') == "true")?"1":"0"];
        $data['role'] = ($this->input->post('mstatus') == "true")?"1":"0";
        if ($this->Admin_model->process_update_user($managerId, $data)) {
            // redirect('addClient/view_clients');
            echo json_encode(['result'=>"success","message"=>"updated"]);
            }
        else{
            echo json_encode(['result'=>"error","message"=>"not updated"]);
        }    
        
        //echo "received: " . $managerId . ", and ". $managerStatus;        

    }



}
