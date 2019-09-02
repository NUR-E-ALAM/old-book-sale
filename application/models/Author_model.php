<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Author_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_author($data)
    {
        return $this->db->insert('authors', $data);
    }
    public function get_all_author()
    {
        //select * from users
        return $this->db->get('authors');
    }
}
