<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Group_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_group($data)
    {
        return $this->db->insert('group_name', $data);
    }
    public function get_all_group() {
        return $this->db->get('group_name');
        }
}
