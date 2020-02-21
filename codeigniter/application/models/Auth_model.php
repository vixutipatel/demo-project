<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model
{
    protected $_table = 'users';

    public function __construct()
    {
        parent::__construct();      
    }
    
    public function login($email, $password)
    {
          $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('password', md5($password));
            $this->db->where('is_admin', 1);

            $query = $this->db->get();
            return $query->row();
    }

    //check user is login or not
    public function logged_in ()
    {
        return (bool) $this->session->userdata('firstname');
    }  
    //check email is exist or not

    public function check_email($email)
    {
          $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $query = $this->db->get();
            return $query->row();
    }
}
?>
