<?php
/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/25/2017
 * Time: 9:29 AM
 */


if (isset($_SESSION['userID'])){
print_r($_SESSION['userID']);
    $this->session->sess_destroy();
}else {
redirect(base_url("sys/logview"));

}