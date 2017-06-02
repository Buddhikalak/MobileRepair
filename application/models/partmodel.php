<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 6/2/2017
 * Time: 10:32 AM
 */
class partmodel extends CI_Model
{

    public function insertItem($brand,$bmodel,$pname,$pcode,$pcost){
        $this->load->database();
        $query = $this->db->query("INSERT INTO parts (name, code, cost, model_id, brand_idbrand ) VALUES ('".$pname."', '".$pcode."', '".$pcost."', '".$bmodel."', '".$brand."' );");
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;

    }

}