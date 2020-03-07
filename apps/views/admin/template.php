<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<?php $this->load->view('admin/head'); ?>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- BEGIN HEADER -->
		<?php $this->load->view('admin/header'); ?>
		<!-- END HEADER -->

		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('admin/sidebar'); ?>
		<!-- END SIDEBAR -->
		<div class="content-wrapper">
			<?php $this->load->view($content); ?>
		</div>
		<!-- BEGIN FOOTER -->
		<?php $this->load->view('admin/footer'); ?>
		<!-- END FOOTER -->
	</div>
	<!-- BEGIN JAVASCRIPTS -->
	<?php $this->load->view('admin/js'); ?>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>