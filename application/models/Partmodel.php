<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 6/2/2017
 * Time: 10:32 AM
 */
class Partmodel extends CI_Model
{

    public function insertItem($brand,$bmodel,$pname,$pcode,$pcost){
        $this->load->database();
        $query = $this->db->query("INSERT INTO parts (name, code, cost, model_id, brand_idbrand ) VALUES ('".$pname."', '".$pcode."', '".$pcost."', '".$bmodel."', '".$brand."' );");
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;

    }

public function insertBrand($brand){
    $this->load->database();
    $query = $this->db->query("INSERT INTO brand(name)VALUES('".$brand."');");
    if ($this->db->affected_rows() > 0)
        return TRUE;
    else
        return FALSE;
}

    public function insertmodels($model,$code){
        $this->load->database();
        $query = $this->db->query("INSERT INTO model (model,code ) VALUES ('".$model."', '".$code."' );");
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

}