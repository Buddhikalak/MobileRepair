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

    public function savejob(){
        $data = json_decode($_GET['data']);
        $tittle=$data->tittle;
        $sdes=$data->sdes;
        $longdes=$data->longdes;
        $customerd=$data->customerd;
        $issuetype=$data->issuetype;
        $issueDate=$data->issueDate;
        $status=$data->status;
        $commentss=$data->commentss;


        date_default_timezone_set("Asia/Calcutta");
        $date_created=date('Y-m-d H:i:s');
        $this->load->model('Jobsmodel');
        $res=$this->Jobsmodel->savingjobs($sdes,$longdes,$commentss,$issuetype,$customerd,$status,$date_created,$issueDate,$tittle);

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