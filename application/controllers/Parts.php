<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 6/2/2017
 * Time: 9:48 AM
 */
class Parts extends CI_Controller

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

        $this->load->model('Partmodel');
        $res=$this->Partmodel->insertItem($brand,$bmodel,$pname,$pcode,$pcost);

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

    Public function Save_Brand(){
        $data = json_decode($_GET['data']);
        $brand=$data->brand;
        $this->load->model('Partmodel');
        $res=$this->Partmodel->insertBrand($brand);
        if($res){
            $data = array(
                'status' => "SUCESS",
                'message' => "SAVED_BRAND"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "NOT_SAVED_BRAND"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }
    }

    public function save_models(){


        $data = json_decode($_GET['data']);
        $model=$data->model;
        $code=$data->code;
        $this->load->model('Partmodel');
        $res=$this->Partmodel->insertmodels($model,$code);
        if($res){
            $data = array(
                'status' => "SUCESS",
                'message' => "SAVED_MODEL"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "NOT_SAVED_MODEL"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }

    }


    function getpartsUsingmodelid(){
        $data = json_decode($_GET['data']);
        $modelid=$data->modelid;
        $this->load->model('Partmodel');
        $res=$this->Partmodel->getpartsmodel($modelid);
        $returnVal = json_encode($res);
        echo $returnVal;

    }

    function partRemove($ttpid){
        $this->load->model('Partmodel');
        $res=$this->Partmodel->removeparts($ttpid);
        if($res){

            $data = array(
                'status' => "ERROR",
                'message' => "NOT_DELETE_PART"

            );
            $returnVal = json_encode($data);
            echo $returnVal;

            header( "Location:".base_url("index.php/dashboard"));

        }else{

            $data = array(
                'status' => "SUCESS",
                'message' => "DELETED PART"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }

    }

}