<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Moshref | Admin Panel</title>
    <!-- Favicon-->
   

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>webroot/admin/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Control <b>Panel</b></a>
            <img class="img-responsive" src="<?php echo base_url(); ?>webroot/admin/images/logo_2.png" alt="logo" />
        </div>
        <div class="card">
            <div class="body">
                <form action="<?php echo site_url();?>admin/admin/login" id="sign_in" method="POST">
				       <?php if($this->session->flashdata('error')){ ?>
						
							 <div class="alert alert-danger">
                             <?php echo $this->session->flashdata('error'); ?>
                            </div>
						<?php } ?>
                    <div class="msg">Sign in to Enter your Admin panel</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password"  class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/jquery.validate.js"></script>
   <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>webroot/admin/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>webroot/admin/js/sign-in.js"></script> 
 
</body>

</html>