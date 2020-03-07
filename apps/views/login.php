<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/adminlte/plugins/iCheck/square/blue.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- BEGIN LOGO -->
        <div class="login-logo" href="">
            <img class="center" alt="logo" src="assets/backend/img/logo.png" width="200">
        </div>
        <!-- END LOGO -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php      if($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif;  ?>
            <?php   if($this->session->flashdata('info')) :    ?>
                <div class="alert alert-info" style="margin: 0px 10px 10px 0px;">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php endif;  ?>
            <?php if($this->session->flashdata('error')) :    ?>
                <div class="alert alert-error" style="margin: 0px 10px 10px 0px;">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif;       ?>
            <form action="login" method="post">
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div class="col-xs-12">
                        <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
            <div class="login-footer">
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="login/forgot-password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery 3 -->
    <script src="assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck
<script src="assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
$('input').iCheck({
checkboxClass: 'icheckbox_square-blue',
radioClass: 'iradio_square-blue',
increaseArea: '20%' /* optional */
});
});
</script>
-->
</body>
<!-- END BODY -->
</html>