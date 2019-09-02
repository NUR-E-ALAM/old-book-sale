<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Lib_to_call {
public function get_users() {
$CI =&get_instance();
$CI->load->model('Lib_model');
return $CI->Lib_model->get();
}
}