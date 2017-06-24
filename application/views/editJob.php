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

$this->load->database();
$query = $this->db->query("SELECT * FROM ticket WHERE idticket='".$txtiddd."'");
foreach ($query->result() as $row) {

    $cusID=$row->customer_idcustomer;
    $issueID=$row->issue_type_idissue_type;

?>


<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Job
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
                                            <input type="text" id="tittle" value="<?php echo $row->tittle ?>" class="form-control" placeholder="Tittle">
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
                                            <input type="text" value="<?php echo $row->short_description ?>" id="sdes" class="form-control" placeholder="Short description">
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
                                            <textarea rows="4" value="" class="form-control  no-resize" id="longdes" placeholder="Description">
                                                <?php echo $row->description ?>
                                            </textarea>
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
                                            <select id="customerd"  class="selectpicker" style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                                <?php

                                                try {
                                                    $query = $this->db->get('customer');
                                                    foreach ($query->result() as $row1){
                                                        if($row1->idcustomer==$cusID){
                                                            ?>
                                                            <option selected value="<?php echo $row1->idcustomer ?>"><?php echo $row1->firstname." ".$row1->lastname ?></option>
                                                      ><?  }else{
                                                        ?>


                                                        <option value="<?php echo $row1->idcustomer ?>"><?php echo $row1->firstname." ".$row1->lastname ?></option>

                                                    <?php  } }




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
                                                    foreach ($query->result() as $row2){
                                                        if ($row2->idissue_type==$issueID){ ?>

                                                            <option selected value="<?php echo $row2->idissue_type ?>"><?php echo $row2->issue ?></option>
                                                     <?php   }else{

                                                        ?>

                                                        <option value="<?php echo $row2->idissue_type ?>"><?php echo $row2->issue ?></option>

                                                    <?php }  }
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
                                            <input id="issueDate" value="<?php echo $row->date_toissue ?>" type="date" class="datepicker form-control">
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

                                            <?php

                                            $s= $row->stats;
                                            if($s==1){ ?>
                                                <label><input type="checkbox" checked value="Pending"  id="status"><span class="lever switch-col-green"></span></label>

                                                <?php

                                            }else{ ?>
                                                <label><input type="checkbox" value="Pending"  id="status"><span class="lever switch-col-green"></span></label>

                                                <?php

                                            }

                                            ?>

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
                                            <textarea rows="4" class="form-control no-resize" id="commentss" placeholder="Comments">
                                                <?php  echo $row->comments;   ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="button" onclick="updatejob()" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                    <a data-toggle="modal" data-target="#addpartmodel" class="btn btn-danger m-t-15 waves-effect">Add Parts</a>
                                    <a data-toggle="modal" data-target="#viewAddedparts" class="btn btn-warning m-t-15 waves-effect">View Added Parts</a>
                                </div>
                            </div>

                        </form>

                        <script>
                            var svr_url = "<?php echo base_url()?>";
                            var TTIDd = "<?php echo $txtiddd ?>";

                            function updatejob() {

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
                                    commentss: $('#commentss').val(),
                                    TTID: TTIDd
                                };
                                console.log(data);
                                $.ajax({
                                    url: svr_url + "index.php/Jobs/UpdateJob?data=" + JSON.stringify(data),
                                    success: function (result) {

                                        var json = JSON.parse(result);
                                        console.log(result);

                                        var status = json.status;
                                        if (status == "SUCESS") {
                                            swal("Saved!", "Updated!", "success")
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

    <?php } ?>


<div class="modal fade" id="viewAddedparts" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="SaveModels">View Parts</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Model</th>
                                <th>Part Name</th>
                                <th>Code</th>
                                <th>Cost</th>
                                <th>Qty</th>

                            </tr>
                            </thead>
                            <tbody>
<?php

$this->load->database();
$query = $this->db->query("SELECT ticket_has_parts.tptid, brand.name , model.model , parts.name AS k , parts.code , parts.cost , ticket_has_parts.qty FROM parts INNER JOIN ticket_has_parts ON (parts.idparts = ticket_has_parts.parts_idparts) INNER JOIN model ON (model.idmodel = parts.model_id) INNER JOIN brand ON (brand.idbrand = parts.brand_idbrand) WHERE ticket_has_parts.ticket_idticket ='".$txtiddd."';");


foreach ($query->result() as $row) {
?>
<tr>
    <td><?php echo $row->name?></td>
    <td><?php echo $row->model?></td>
    <td><?php echo $row->k ?></td>
    <td><?php echo $row->code ?></td>
    <td><?php echo $row->cost ?></td>
    <td><?php echo $row->qty ?></td>
    <td><a href="<?php echo base_url('index.php/Parts/partRemove/'.$row->tptid) ?>" class="btn btn-danger">Remove</a> </td>



</tr>

<?php } ?>
</tbody>
                        </table>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addpartmodel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="issuetypemodel">Add Parts</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                            <label>Select Model</label>
                            <div class="form-line" style="    border-bottom: 0px solid #ddd;">

                                <select id="modelppicker" onchange="getparts()" class="selectpicker" style="" data-show-subtext="true" data-live-search="true">
                                    <option>Select Part</option>
                                    <?php

                                    try {
                                        $query = $this->db->get('model');
                                        foreach ($query->result() as $row){ ?>

                                            <option  value="<?php echo $row->idmodel ?>"><?php echo $row->model ?></option>

                                        <?php   }
                                    } catch (Exception $e) {
                                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                                    }



                                    ?>

                                </select>


                            </div>
                        </div>


                    <div class="form-group">
                        <label>Select part</label>
                        <div id="hutta" class="form-line" style="    border-bottom: 0px solid #ddd;">

                            <select id="partpicker" class="selectpicker" style="" data-show-subtext="true" data-live-search="true">

                            </select>

                        </div>
                    </div>



<script>
    function getparts() {


        var data = {
            modelid: $('#modelppicker').val()

        };
        console.log(data);
        var svr_url = "<?php echo base_url()?>";

        $.ajax({
            url: svr_url + "index.php/Parts/getpartsUsingmodelid?data=" + JSON.stringify(data),
            success: function (result) {

                var json = JSON.parse(result);
                console.log(result);
                result = jQuery.parseJSON(result);
//result=[
// {"idparts":"1","name":"display","code":"1000","cost":"100","model_id":"1","brand_idbrand":"1"},
// {"idparts":"2","name":"","code":"","cost":"0","model_id":"1","brand_idbrand":"1"}
//
// ]

                var partpicker = document.getElementById("partpicker");
                partpicker.innerHTML="";



                console.log(partpicker);
                for(var i in result){
                    console.log(result[i].name);
                    var opt = document.createElement('option');
                    opt.value = result[i].idparts;
                    opt.innerHTML = result[i].name;
                    partpicker.appendChild(opt);


                }
                $("#partpicker").selectpicker();
                $('#partpicker').selectpicker('refresh');



            }
        });

    }
</script>

                        <div class="form-group">
                            <label>Qty</label>
                            <div class="form-line">
                                <input type="number" id="pqty"  value="1" class="form-control" placeholder="">
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addpartToJOB()" class="btn btn-primary waves-effect">ADD</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>






    <script>
        function addpartToJOB() {
            console.log("t6");
            var svr_url = "<?php echo base_url()?>";
             var jobid="<?php echo $txtiddd ?>";
            var data={
                partpicker:$('#partpicker').val(),
                pqty:$('#pqty').val(),
                jobid:jobid
            }
            console.log(data);

            $.ajax({
                url: svr_url + "index.php/Jobs/addParttoJob?data=" + JSON.stringify(data),
                success: function (result) {

                    var json = JSON.parse(result);
                    console.log(result);

                    var status = json.status;
                    if (status == "SUCESS") {
                        swal("Saved!", "Added !", "success")
                    } else {
                        swal("Error!", "Please Check Again!", "error")
                    }


                }
            });

        }
    </script>


<?php
require ("footer.php");

}else{

    redirect(base_url());
}
?>


