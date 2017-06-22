<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/28/2017
 * Time: 10:07 PM
 */
class Customer extends CI_Model
{
 public function saveCustomer($firstname, $lastname, $phonenumber, $email, $address){
     $this->load->database();
     $query = $this->db->query("INSERT INTO customer (firstname, lastname, customercol, phonenumber, email, address )
VALUES ('".$firstname."', '".$lastname."', '-', '".$phonenumber."', '".$email."', '".$address."' )");

     if ($this->db->affected_rows() > 0)
         return TRUE;
     else
         return FALSE;


 }


 public function saveIssueTypeFun($issue){
     $this->load->database();
     $query = $this->db->query("INSERT INTO issue_type (issue ) VALUES ('".$issue."' );");
     if ($this->db->affected_rows() > 0)
         return TRUE;
     else
         return FALSE;

 }





}