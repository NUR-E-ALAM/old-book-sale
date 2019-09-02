<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Profile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
       $this->load->helper(['form','url']);
        $this->load->library(["form_validation","session"]);
    }

    
public function add_profile($data) {
    //var_dump($data);exit;
    $id=$data['user_id'];
    $this->db->where('user_id', $id);
   $user= $this->db->get('profile');
    
   if($user->num_rows() > 0){
    $this->db->where('user_id', $id);
  return  $this->db->update('profile', $data);
   }
   else{
       $id=$data['user_id'];
     return $this->db->insert('profile',$data);
   }
    
    }

 public function get_division()
    {
        $divisions = $this->db->get("divisions");
        $div_options = [];
        $div_options[0] = "Select";
foreach ($divisions->result() as $row) {
    $div_options[$row->name] = $row->bn_name;
}
return $div_options;
    }
    
    public function get_district()
    {
        $disctrict = $this->db->get("districts");
        $dist_options = [];
        $dist_options[0] = "Select";
foreach ($disctrict->result() as $row) {
    $dist_options[$row->name] = $row->bn_name;
}
return $dist_options;
    }
    public function get_upazila()
    {
        $upazila = $this->db->get("upazilas");
        $upa_options = [];
        $upa_options[0] = "Select";
foreach ($upazila->result() as $row) {
    $upa_options[$row->name] = $row->bn_name;
}
return $upa_options;
    }
    public function get_union()
    {
        $union = $this->db->get("unions");
        
        $uni_options = [];
        $uni_options[0] = "Select";
foreach ($union->result() as $row) {
    $uni_options[$row->bn_name] = $row->bn_name;
}
return $uni_options;
    }


    public function get_profiler_id($id){
         $this->db->where('user_id', $id);
        return $this->db->get('profile');
    }
}
