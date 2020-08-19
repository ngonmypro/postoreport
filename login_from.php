<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/LOGOYONGHOUSE.png" type="image/png" />

    <title>Wage</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <script src="ajax/function.js"></script>
     <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

  </head>

  <body class="login" onload="javascript:showscreen();">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <!--<div class="animate form login_form">-->
          <section class="login_content">
            <form>
              <img src="images/LOGOYONGHOUSE_13012555.png" width="50%">
              <div>
                <input type="text" id="username" class="form-control" placeholder="Username" onKeyUp="checkKey(this.id);" />
              </div>
              <div>
                <input type="password" id="password" class="form-control" placeholder="Password" onKeyUp="checkKey(this.id);" />
              </div>
              <div style="color: red; font-size: 15px;" id="pp"></div>
              <div>
                <a class="btn btn-info submit" href="javascript:checkuser();">Log in</a>
                <!--<a class="btn btn-danger submit"href="javascript:logoutuser();">LOGOUT</a>
                <a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <font size="5"><i class="fa fa-balance-scale"></i> โปรแกรมคิดค่าแรงคนงาน</font>
                  <p>©<?=date("Y")?> All Rights Reserved. Create By Yong Group IT Team.</p>
                </div>
              </div>
            </form>
          </section>
        <!--</div>-->

      </div>
    </div>
  </body>
</html>
