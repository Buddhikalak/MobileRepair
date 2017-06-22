<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 6/22/2017
 * Time: 12:51 PM
 */
class Tickets extends CI_Model
{

    public function GetAlltickets(){
        $this->load->database();
        $query = $this->db->query("SELECT customer.firstname , customer.lastname , issue_type.issue , ticket.tittle , ticket.short_description , ticket.date_created , ticket.date_toissue , ticket.stats FROM issue_type INNER JOIN ticket ON (issue_type.idissue_type = ticket.issue_type_idissue_type) INNER JOIN mobileshop.customer ON (idcustomer = ticket.customer_idcustomer);");
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }

}
}