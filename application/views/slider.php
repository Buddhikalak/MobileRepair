<?php
/**
 * Created by PhpStorm.
 * User: Buddhika
 * Date: 5/27/2017
 * Time: 10:28 PM
 */

?>

<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()?>Asserts/images/user.png" width="48" height="48" alt="User">
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php

                        if (isset($_SESSION['user_name'])){
echo $_SESSION['user_name'];
                        }else{
                            echo "Please add the name";
                        }



                        ?></div>
                    <div class="email"><?php

                        if (isset($_SESSION['user_email'])){
echo $_SESSION['user_email'];
                        }else{
                            echo "Please add the email";
                        }


                        ?></div>

                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 361px;"><ul class="list" style="overflow: hidden; width: auto; height: 361px;">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="<?php echo base_url() ?>" class="toggled waves-effect waves-block">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                        <li class="">
                            <a data-toggle="modal" data-target="#customerModal" class="toggled waves-effect waves-block">
                                <i class="material-icons">people</i>
                                <span>Create Customer</span>
                            </a>


                        </li>

                        <li class="">
                            <a href="<?php  echo base_url()?>index.php/Jobs/" class="toggled waves-effect waves-block">
                                <i class="material-icons">note_add</i>
                                <span>Create Job</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="index.html" class="toggled waves-effect waves-block">
                                <i class="material-icons">payment</i>
                                <span>Invoice</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="index.html" class="toggled waves-effect waves-block">
                                <i class="material-icons">developer_board</i>
                                <span>Parts</span>
                            </a>
                        </li>




                    <li>
                        <a href="<?php echo base_url('index.php/sys/logout')?>" class=" waves-effect waves-block">
                            <i class="material-icons">exit_to_app</i>
                            <span>Logout</span>
                        </a>
                    </li>
                   </div>
                </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
© 2016 <a href="javascript:void(0);">Mask Developments</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
</div>
            </div>
            <!-- #Footer -->
        </aside>

    </section>


<div class="modal fade" id="customerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customerModal">Customer registration</h4>
            </div>
            <div class="modal-body">
                <form>


                  <div class="form-group">
                      <label>First Name</label>
                      <div class="form-line">
                          <input type="text" id="fname" class="form-control" placeholder="Enter your name">
                      </div>
                  </div>



                    <div class="form-group">
                        <label>Last Name</label>
                        <div class="form-line">
                            <input type="text"  id="lname" class="form-control" placeholder="Enter your last name">
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="form-line">
                            <input type="number" maxlength="10" id="phone_number" class="form-control" placeholder="Enter your Phone number">
                        </div>
                    </div>




                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="form-line">
                            <input type="email" id="email" class="form-control" placeholder="Enter your Email Address">
                        </div>
                    </div>


                    <div class="form-group form-float">
                        <label>Address</label>
                        <div class="form-line">
                            <input type="text" id="address" class="form-control" placeholder="Address">
                        </div>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" onclick="saveCusto()" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function saveCusto() {
        console.log("dddd");

        var f1 = $('#fname').val();
        var f2 = $('#phone_number').val();
        var f3 = $('#address').val();



            var data = {
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                phone_number: $('#phone_number').val(),
                email: $('#email').val(),
                address: $('#address').val()
            };
            var svr_url = "<?php echo base_url()?>";

            $.ajax({
                url: svr_url + "index.php/Customer_controller/createCus?data=" + JSON.stringify(data),
                success: function (result) {

                    var json = JSON.parse(result);
                    console.log(result);

                    var status = json.status;
                    if (status == "SUCESS") {
                        swal("Saved!", "Saved Customer !", "success")
                    } else {
                        swal("Error!", "Please Check Again!", "error")
                    }


                }
            });
        }


</script>