<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/24/2017
 * Time: 9:22 AM
 */
class sys extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_login');
        $this->load->library('session');
    }

    public function index(){

    }

    function log(){
        $data = json_decode($_GET['data']);
        // get Data
        $username = $data->username;
        $password = $data->password;
        //$password = base64_encode($password);


        $usernames = $this->User_login->CheckUserName($username);
        if ($usernames != false) {
            if($usernames->password == $password){
                      $data = array(
                    'status' => "SUCESS",
                    'message' => "CORRECT_USERNAME_AND_PASSWORD",
                    'userid' => $usernames->iduser,
                          'user_email' => $usernames->email,
                          'user_name' => $usernames->name

                );
                $returnVal = json_encode($data);
                echo $returnVal;

            }else{

                $data = array(
                    'status' => "ERROR",
                    'message' => "PASSWORD_ERROR"
                );

                $returnVal = json_encode($data);
                echo $returnVal;

            }

        }else{
            $data = array(
                'status' => "ERROR",
                'message' => "USERNAME_ERROR"
            );
            $returnVal = json_encode($data);
            echo $returnVal;
        }

    }

    function save_login()
    {
        if (isset($_GET['data'])) {
            $data = $_GET['data'];
            $d = json_decode($data);

            echo $d->userid;

            $_SESSION['userID'] = $d->userid;
            $_SESSION['user_email'] = $d->user_email;
            $_SESSION['user_name'] = $d->user_name;
        }

    }

    function logview(){

        $this->load->view('index');
    }

    function logout(){
        $this->session->sess_destroy();
        $this->load->view('index');
    }

}