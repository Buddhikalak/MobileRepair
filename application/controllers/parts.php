<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 6/2/2017
 * Time: 9:48 AM
 */
class parts extends CI_Controller

{

    public function index(){

        $this->load->view('parts');
    }

    public function savepart(){
        $data = json_decode($_GET['data']);
        $brand=$data->brand;
        $bmodel=$data->bmodel;
        $pname=$data->pname;
        $pcode=$data->pcode;
        $pcost=$data->pcost;

        $this->load->model('partmodel');
        $res=$this->partmodel->insertItem($brand,$bmodel,$pname,$pcode,$pcost);

        if($res){
            $data = array(
                'status' => "SUCESS",
                'message' => "SAVED_JOB"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "NOT_SAVED_JOB"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }

    }

}