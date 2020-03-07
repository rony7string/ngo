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

    <div class="forget-wrap">
        <?php if($this->session->flashdata('error')) { ?>
        <div class="alert alert-error" style="margin: 0px 10px 10px 0px;">
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php } ?>
        <form action="login/forgot-password" method="post">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-keyboard" style="padding-top: 10px;"></i>
                    <span>Forget Password</span>
                </div>
            </div>
            <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="text" name="email" value="" tabindex="1" autofocus placeholder="User Email">
                </div>
            </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            <div class="metro single-size terques forget">
                <button type="submit" name="submit" tabindex="3" class="btn forget-btn">
                    Send Reset Link<br>
                    <i class=" icon-long-arrow-right"></i>
                </button>
            </div>
        </form>
        <div class="forget-footer">
            <div class="remember-hint pull-left">
                <a id="forget-password" class="" href="">Go Back.</a>
            </div>
            <!-- <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="login/forget-password">Forgot Password?</a>
            </div> -->
        </div>
    </div>
</body>
<!-- END BODY -->
</html>