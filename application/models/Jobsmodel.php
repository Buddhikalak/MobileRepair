<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/30/2017
 * Time: 10:35 PM
 */
class Jobsmodel extends CI_Model
{

    public function savingjobs
    ($short_description,$description,$comments,$issue_type_idissue_type,$customer_idcustomer,$stats,$date_created,$date_toissue,$tittle){
        $this->load->database();
        $query = $this->db->query(" INSERT INTO mobileshop.ticket (short_description, description, comments, issue_type_idissue_type, customer_idcustomer, stats, date_created, date_toissue, tittle ) VALUES ('".$short_description."', '".$description."', '".$comments."', '".$issue_type_idissue_type."', '".$customer_idcustomer."', '".$stats."', '".$date_created."', '".$date_toissue."', '".$tittle."' );");
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }



}