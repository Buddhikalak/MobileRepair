<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout03/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Aug 2015 16:06:28 GMT -->
<?

    if (isset($_SESSION['userID'])){
        ?>
        <script>
            window.location.href ="<?php echo base_url("index.php/dashboard/")?>";
        </script>

    <?php

    }else {
?>


<?php
require("header.php");
?>

<body class="login-page">
<div class="login-box">
        <div class="logo">
                <a href="javascript:void(0);">Admin<b>Signin</b></a>
                <small>Mobile Phone Repair system</small>
        </div>
        <div class="card">
                <div class="body">

                                <div class="msg">Sign in to start your session</div>
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                                        <div class="form-line">
                                                <input type="text" id="username" class="form-control" name="username" placeholder="Username" required autofocus>
                                        </div>
                                </div>
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                        <div class="form-line">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-xs-8 p-t-5">
                                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                                <label for="rememberme">Remember Me</label>
                                        </div>
                                        <div class="col-xs-4">
                                                <button class="btn btn-block bg-pink waves-effect" onclick="loginxxx()" type="button">SIGN IN</button>
                                        </div>
                                </div>
                                <div class="row m-t-15 m-b--20">
                                        <div class="col-xs-6">
                                                <a href="sign-up.html">Register Now!</a>
                                        </div>
                                        <div class="col-xs-6 align-right">
                                                <a href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                </div>

                </div>
        </div>
</div>





<? require("footer.php"); ?>

<script>
    function loginxxx() {
       // alert("f");
        var data = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        var svr_url = "<?php echo base_url()?>";
        $.ajax({
            url: svr_url + "index.php/sys/log?data=" + JSON.stringify(data), success: function (result) {

                var json = JSON.parse(result);
                console.log(result);
                var status = json.status;
                var message = json.message;
                var uid = json.userid;

                if (status == "ERROR") {

                    console.log(status + ":-" + message);


                } else {
                    $.ajax({
                        url: svr_url + "index.php/sys/save_login?data=" + result, success: function (result) {
                            var userID = result;
                                  //  alert(result);
                            window.location.href = '<?php echo base_url("index.php/dashboard")?>';
                        }
                    });

                }
            }
        });
    }

    <?php
    }
    ?>

</script>
