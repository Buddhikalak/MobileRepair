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
        $query = $this->db->query(" INSERT INTO ticket (short_description, description, comments, issue_type_idissue_type, customer_idcustomer, stats, date_created, date_toissue, tittle ) VALUES ('".$short_description."', '".$description."', '".$comments."', '".$issue_type_idissue_type."', '".$customer_idcustomer."', '".$stats."', '".$date_created."', '".$date_toissue."', '".$tittle."' );");
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function uupdate($short_description,$description,$comments,$issue_type_idissue_type,$customer_idcustomer,$stats,$date_toissue,$tittle,$TTID){
        $this->load->database();
        $query = $this->db->query("UPDATE ticket SET short_description = '".$short_description."' , description = '".$description."' , comments = '".$comments."' , issue_type_idissue_type = '".$issue_type_idissue_type."' , customer_idcustomer = '".$customer_idcustomer."' , stats = '".$stats."' , date_toissue = '".$date_toissue."' , tittle = '".$tittle."' WHERE idticket = '".$TTID."' ;");

        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
}

public function insertPartToJob($partpicker,$pqty,$jobid){
    $this->load->database();
    $query = $this->db->query("INSERT INTO ticket_has_parts ( ticket_idticket, parts_idparts, qty ) VALUES ( '".$jobid."', '".$partpicker."', '".$pqty."' );");
    if ($this->db->affected_rows() > 0)
        return TRUE;
    else
        return FALSE;
}



}