<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="assets/backend/img/favicon.ico" type="image/x-icon" />
    <link href="assets/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/backend/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="assets/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/backend/css/style.css" rel="stylesheet" />
    <link href="assets/backend/css/style-responsive.css" rel="stylesheet" />
    <link href="assets/backend/css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="">
            <img class="center" alt="logo" src="assets/backend/img/logo.png" width="250">
        </a>
        <!-- END LOGO -->
    </div>

    <div class="login-wrap">
        <?php if($this->session->flashdata('error')) { ?>
        <div class="alert alert-error" style="margin: 0px 10px 10px 0px;">
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('info')) { ?>
        <div class="alert alert-info" style="margin: 0px 10px 10px 0px;">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
        </div>
        <?php } ?>
        <form action="login/reset-password/<?php echo $code; ?>" method="post">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-refresh" style="padding-top: 10px;"></i>
                    <span>Reset Password</span>
                </div>
            </div>
            <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="password" name="password" value="" tabindex="1" autofocus placeholder="New Password">
                </div>
            </div>
            <div class="metro double-size yellow">
                <div class="input-append lock-input">
                    <input type="password" name="passconf" value="" tabindex="2" placeholder="Confirm Password">
                </div>
            </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            <div class="metro single-size terques login">
                <button type="submit" name="submit" tabindex="3" class="btn login-btn">
                    Submit
                    <i class=" icon-long-arrow-right"></i>
                </button>
            </div>
        </form>
        <div class="login-footer">
            <!-- <div class="remember-hint pull-left">
                <input type="checkbox" id=""> Remember Me
            </div> -->
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="login/forgot-password">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>
<!-- END BODY -->
</html>