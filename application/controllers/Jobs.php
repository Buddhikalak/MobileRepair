<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/29/2017
 * Time: 9:44 AM
 */
class Jobs extends CI_Controller

{

    function index(){

        $this->load->view('createJob');
    }

}