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
                        <a href="index.html" class="toggled waves-effect waves-block">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                        <li class="">
                            <a href="index.html" class="toggled waves-effect waves-block">
                                <i class="material-icons">people</i>
                                <span>Create Customer</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="index.html" class="toggled waves-effect waves-block">
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