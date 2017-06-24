<?php
/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/25/2017
 * Time: 9:29 AM
 */

if(isset($_SESSION['userID'])) {

    require("header.php");

    ?>

    <body class="theme-red">
    <?php
    require("navigation.php");
    require("slider.php");
    $A="";
    $B="";
    $C="";
    $this->load->database();
    $query = $this->db->query("SELECT COUNT(*) AS A FROM ticket WHERE stats='0'");
    foreach ($query->result() as $row) {
$A=$row->A;
    }
    $query1 = $this->db->query("SELECT COUNT(*) AS B FROM ticket WHERE stats='1'");
    foreach ($query1->result() as $row) {
        $B=$row->B;
    }
    $query3 = $this->db->query("SELECT COUNT(*) AS C FROM customer");
    foreach ($query3->result() as $row) {
        $C=$row->C;
    }


    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Pending Jobs</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $A ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">

                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Finished Jobs</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $B ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW Customers</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $C ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->

            <!-- #END# CPU Usage -->


            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="max-height: 463px !important;
    overflow: auto;">
                    <div class="card">
                        <div class="header">
                            <h2>Tickets Remaining</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                    <tr>
                                        <th>Ticket Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Issue</th>
                                        <th>Tittle</th>
                                        <th>Short Description</th>
                                        <th>Created Date</th>
                                        <th>Issue Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $this->load->database();
                                    $query = $this->db->query("SELECT customer.firstname , customer.lastname , issue_type.issue , ticket.tittle , ticket.short_description , ticket.date_created , ticket.date_toissue , ticket.stats , ticket.idticket FROM issue_type INNER JOIN ticket ON (issue_type.idissue_type = ticket.issue_type_idissue_type) INNER JOIN customer ON (customer.idcustomer = ticket.customer_idcustomer) WHERE ticket.stats='0';");
                                    foreach ($query->result() as $row) {
                                        $data = array('idticket'=>$row->idticket);
                                        $v = json_encode($data);
                                    ?>
                                    <tr>






                                        <td> <a href="<?php echo base_url('index.php/Jobs/viewEditJobPage/'.$row->idticket) ?>"><?php  echo $row->idticket ?></a>  </td>
                                        <td><?php echo $row->firstname?></td>
                                        <td><?php echo $row->lastname?></td>
                                        <td><?php echo $row->issue?></td>
                                        <td><?php echo $row->tittle?></td>
                                        <td><?php echo $row->short_description?></td>
                                        <td><?php echo $row->date_created?></td>
                                        <td><?php echo $row->date_toissue?></td>
                                        <td>

                                        <?php

                                        if ($row->stats=='0')
                                            echo 'Inprogress';

                                            ?>

                                            </td>

                                    </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->

                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>


    <?php
require ("footer.php");

}else{

    redirect(base_url());
}
?>