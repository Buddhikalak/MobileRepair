<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/24/2017
 * Time: 9:22 AM
 */
class sys extends CI_Controller
{

    function log(){
        $data = json_decode($_GET['data']);
        // get Data
        $username = $data->username;
        $password = $data->password;
        $password = base64_encode($password);

        $data = array(
            'status' => "ERROR",
            'message' => "NOT_PAID"
        );

        $returnVal = json_encode($data);
        echo $returnVal;
    }

}