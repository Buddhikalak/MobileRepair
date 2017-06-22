<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_login extends CI_Model
{    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function CheckUserName($username){
        $query=$this->db->query("SELECT * FROM user WHERE user_name ='" . $username . "'");
        if ($query->num_rows()>0 ){
            return $query->row();
        }else{
            return false;
        }
    }
    public function oauth($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE user_name ='" . $username . "' AND password='".$password."'");
        if ($query->num_rows()>0 ){
            return $query->row();
        }else{
            return false;
        }
    }




}