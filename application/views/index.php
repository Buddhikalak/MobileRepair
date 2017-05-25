<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout03/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Aug 2015 16:06:28 GMT -->
<?

require("header.php");
?>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">System of Mobile Repairing</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a onclick="loginxxx()" class="btn waves-effect waves-light col s12">Login</a>
          </div>
        </div>
        <div class="row">
         <!-- <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
          </div>-->
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password</a></p>
          </div>
        </div>

      </form>
    </div>
  </div>



  <? require("footer.php"); ?>

<script>
    function loginxxx(){
        alert("f");
        var data  = {
            username:$('#username').val(),
            password:$('#password').val()
        };
var svr_url="<?php echo base_url()?>";
        $.ajax({url: svr_url + "sys/log?data=" + JSON.stringify(data), success: function(result){

            var json = JSON.parse(result);
            console.log(result);
            var status =  json.status;
            var message =  json.message;
            var uid =  json.userid;

            if(status == "ERROR"){

console.log(status+":-"+message);


            }else{
                $.ajax({url: svr_url + "sys/save_login?data=" + result, success: function(result){
                    var userID = result;
                    window.location.href = '<?php echo base_url("dashboard")?>';
                }});

            }
        }});
    }



</script>


</body>

</html>