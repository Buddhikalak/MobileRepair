<?php

/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/28/2017
 * Time: 10:20 PM
 */
class Customer_controller extends CI_Controller
{
    public function createCus(){
        $data = json_decode($_GET['data']);
        $fname = $data->fname;
        $lname = $data->lname;
        $phone = $data->phone_number;
        $email = $data->email;
        $address = $data->address;
        $this->load->model('customer');
        $res=$this->customer->saveCustomer($fname,$lname,$phone,$email,$address);

        if($res){
            $data = array(
                'status' => "SUCESS",
                'message' => "SAVED_CUSTOMER"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "NOT_SAVED_CUSTOMER"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }


    }

    public function save_con_iss_types(){
        $data = json_decode($_GET['data']);
        $txt_issuetype = $data->txt_issuetype;
        $this->load->model('customer');
        $res=$this->customer->saveIssueTypeFun($txt_issuetype);
        if($res){
            $data = array(
                'status' => "SUCESS",
                'message' => "SAVED_ISSUE"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "NOT_SAVED_ISSUE"

            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }
    }

}