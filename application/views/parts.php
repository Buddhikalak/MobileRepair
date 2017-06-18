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
    ?>

    <section class="content">
        <div class="container-fluid">


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Mobile Parts
                            </h2>

                        </div>
                        <div class="body">
                            <form class="form-horizontal">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Brand</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="row-fluid" style="width: 100%">
                                                <select id="brand" class="selectpicker" style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                                    <?php

                                                    try {
                                                        $query = $this->db->get('brand');
                                                        foreach ($query->result() as $row){ ?>
                                                            <option value="<?php echo $row->idbrand ?>"><?php echo $row->name ?></option>

                                                        <?php   }




                                                    } catch (Exception $e) {
                                                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                                                    }



                                                    ?>









                                                </select>
                                                <button type="button" data-toggle="modal" data-target="" class="btn bg-purple waves-effect">
                                                    <i  style="position: static" class="material-icons">add</i>
                                                </button>
                                            </div>


                                        </div>
                                    </div>


                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Model</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="row-fluid" style="width: 100%">
                                                <select id="bmodel" class="selectpicker" style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                                    <?php

                                                    try {
                                                        $query = $this->db->get('model');
                                                        foreach ($query->result() as $row){ ?>
                                                            <option value="<?php echo $row->idmodel ?>"><?php echo $row->model."-".$row->code ?></option>

                                                        <?php   }
                                                    } catch (Exception $e) {
                                                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                                                    }



                                                    ?>

                                                </select>
                                                <button type="button" data-toggle="modal" data-target="#"  class="btn bg-purple waves-effect">
                                                    <i  style="position: static" class="material-icons">add</i>
                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                </div>





                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pname" class="form-control" placeholder="Part Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Code</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="pcode" class="form-control" placeholder="Part Code">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Cost</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="pcost" class="form-control" placeholder="Part Cost">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" onclick="savepart()" class="btn btn-primary m-t-15 waves-effect">Create</button>
                                    </div>
                                </div>

                            </form>




                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets -->

            <script>
                var svr_url = "<?php echo base_url()?>";


                function savepart() {
                    var data = {
                        brand: $('#brand').val(),
                        bmodel: $('#bmodel').val(),
                        pname: $('#pname').val(),
                        pcode: $('#pcode').val(),
                        pcost: $('#pcost').val()
                    };
                    console.log(data);
                    $.ajax({
                        url: svr_url + "index.php/Parts/savepart?data=" + JSON.stringify(data),
                        success: function (result) {

                            var json = JSON.parse(result);
                            console.log(result);

                            var status = json.status;
                            if (status == "SUCESS") {
                                swal("Saved!", "Saved Part !", "success")
                            } else {
                                swal("Error!", "Please Check Again!", "error")
                            }


                        }
                    });

                }



            </script>


                </div>
            </section>
            <!-- #END# Widgets -->



    <?php
    require ("footer.php");

}else{

    redirect(base_url());
}
?>