<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/24/2017
 * Time: 10:53 PM
 */
class user extends CI_Model
{

    public function CheckUserName($username){
        $this->load->database();
        $query=$this->db->query("SELECT * FROM user WHERE user_name ='" . $username . "'");
        if ($query->num_rows()>0 ){
            return $query->row();
        }else{
            return false;
        }
    }
    public function oauth($username,$password){
        $this->load->database();
        $query=$this->db->query("SELECT * FROM user WHERE user_name ='" . $username . "' AND password='".$password."'");
        if ($query->num_rows()>0 ){
            return $query->row();
        }else{
            return false;
        }
    }




}