<?php
/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/29/2017
 * Time: 9:46 AM
 *
 *
 */
if(isset($_SESSION['userID'])) {

require("header.php");

?>

<body class="theme-red">
<?php
require("navigation.php");
require("slider.php");
?>
<section class="content">
    <div class="container-fluid">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Job
                </h2>

            </div>
            <div class="body">
                <form class="form-horizontal">

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Tittle</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tittle" class="form-control" placeholder="Tittle">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Short Description</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="sdes" class="form-control" placeholder="Short description">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Long Description</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" id="longdes" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Customer</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                    <div class="row-fluid" style="width: 100%">
                                        <select id="customerd" class="selectpicker" style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                            <?php

                                            try {
                                                $query = $this->db->get('customer');
                                            foreach ($query->result() as $row){ ?>
                                                <option value="<?php echo $row->idcustomer ?>"><?php echo $row->firstname." ".$row->lastname ?></option>

                                            <?php   }




                                            } catch (Exception $e) {
                                                echo 'Caught exception: ',  $e->getMessage(), "\n";
                                            }



                                            ?>









                                        </select>
                                        <button type="button" data-toggle="modal" data-target="#customerModal" class="btn bg-purple waves-effect">
                                            <i  style="position: static" class="material-icons">add</i>
                                        </button>
                                   </div>


                        </div>
                    </div>


                        </div>


                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Issue Type</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="row-fluid" style="width: 100%">
                                    <select id="issuetype" class="selectpicker" style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                        <?php

                                        try {
                                            $query = $this->db->get('issue_type');
                                            foreach ($query->result() as $row){ ?>
                                                <option value="<?php echo $row->idissue_type ?>"><?php echo $row->issue ?></option>

                                            <?php   }
                                        } catch (Exception $e) {
                                            echo 'Caught exception: ',  $e->getMessage(), "\n";
                                        }



                                        ?>

                                    </select>
                                    <button type="button" data-toggle="modal" data-target="#issuetypemodel"  class="btn bg-purple waves-effect">
                                        <i  style="position: static" class="material-icons">add</i>
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Issue Date</label>
                        </div>

                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="issueDate" type="date" class="datepicker form-control">
                                </div>
                            </div>
                            </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Status</label>

                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                        <div class="switch" style="margin-top: 10px">
                            <label><input type="checkbox" value="Pending"  id="status"><span class="lever switch-col-green"></span></label>
                        </div>
</div></div>


                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Comments</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" id="commentss" placeholder="Comments"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="button" onclick="savejob()" class="btn btn-primary m-t-15 waves-effect">Create</button>
                        </div>
                    </div>

                </form>

                <script>
                    var svr_url = "<?php echo base_url()?>";


                    function savejob() {

                        var DOMTYU;
                        if(document.getElementById('status').checked) {
                            DOMTYU="1";
                        } else {
                            DOMTYU="0";
                        }

                        var data = {
                            tittle: $('#tittle').val(),
                            sdes: $('#sdes').val(),
                            longdes: $('#longdes').val(),
                            customerd: $('#customerd').val(),
                            issuetype: $('#issuetype').val(),
                            issueDate: $('#issueDate').val(),
                            status: DOMTYU,
                            commentss: $('#commentss').val()
                        };
                        console.log(data);
                        $.ajax({
                            url: svr_url + "index.php/Jobs/savejob?data=" + JSON.stringify(data),
                            success: function (result) {

                                var json = JSON.parse(result);
                                console.log(result);

                                var status = json.status;
                                if (status == "SUCESS") {
                                    swal("Saved!", "Saved Job !", "success")
                                } else {
                                    swal("Error!", "Please Check Again!", "error")
                                }


                            }
                        });

                    }



                </script>


            </div>
        </div>
    </div>
</div>

</div></section>



<?php
require ("footer.php");

}else{

    redirect(base_url());
}
?>


