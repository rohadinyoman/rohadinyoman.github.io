<!-- <h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> -->

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>SIMPEG | Sistem Informasi Pegawai</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>vendor/bootstrap/dist/css/bootstrap.css" />


    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>styles/style.css">

</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> 
    <div class="color-line"></div>
    <div class="splash-title">
        <div class="spinner"> 
            <div class="rect1"></div> 
            <div class="rect2"></div> 
            <div class="rect3"></div> 
            <div class="rect4"></div> 
            <div class="rect5"></div> 
        </div> 
    </div> 
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>



<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>SISTEM INFORMASI PEGAWAI</h3>
                <!-- <small>This is the best app ever!</small> -->

            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <!-- <form action="#" id="loginForm"> -->
                          <div id="infoMessage"><span style="color: red"><?php echo $message;?></span></div>
                        <?php echo form_open("auth/login");?>
                            <div class="form-group">
                                <label class="control-label" for="username"><?php echo lang('login_identity_label', 'identity');?></label>
                                <!-- <?php echo form_input($identity);?> -->
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="identity" id="identity" class="form-control">
                                <!-- <span class="help-block small">Your unique username to app</span> -->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password"><?php echo lang('login_password_label', 'password');?></label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <!-- <span class="help-block small">Yur strong password</span> -->
                            </div>
                            <!-- <div class="checkbox">
                                <input type="checkbox" class="i-checks" checked>
                                     Remember login
                                <p class="help-block small">(if this is a private computer)</p>
                            </div> -->
                            <button class="btn btn-success btn-block" name="submit">Login</button>
                            <!-- <?php echo form_submit('submit', lang('login_submit_btn'));?> -->
                            <!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
                        <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12 text-center">
            <strong>HOMER</strong> - AngularJS Responsive WebApp <br/> 2015 Copyright Company Name
        </div>
    </div> -->
</div>


<!-- Vendor scripts -->
<script src="<?php echo base_url('assets/') ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?php echo base_url('assets/') ?>scripts/homer.js"></script>

</body>
</html>