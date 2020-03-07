<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->   
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Profile
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						My Profile
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN Alert widget-->
		<?php if($this->session->flashdata('success') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
		<div class="row-fluid">
			<div class="span12">
				<?php if($this->session->flashdata('success')) { ?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('info')) { ?>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">×</button>
					<strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
				</div>
				<?php } ?>
				<?php if($this->session->flashdata('error')) { ?>
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">×</button>
					<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<!-- END Alert widget-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<!-- BEGIN PROFILE PORTLET-->
			<div class=" profile span12">
				<div class="profile-head">
					<div class="span9">
						<h1><?php echo $user['name']; ?></h1>
						<p><?php echo $user['type']; ?> at <a href="dashboard"><?php echo $user['company_name']; ?></a></p>
					</div>
					<div class="span3">
						<a href="user/profile_edit/<?php echo $user['id']; ?>" class="btn btn-edit btn-large pull-right mtop20"> Edit Profile </a>
					</div>
				</div>
				<div class="space15"></div>
				<div class="row-fluid">
					<div class="span8 bio">
						<h4>Other Details</h4>
						<p><label>Full Name </label>: <?php echo $user['name']; ?></p>
						<p><label>Company Name </label>: <?php echo $user['company_name']; ?></p>
						<p><label>Email </label>: <?php echo $user['email']; ?></p>
						<div class="space20"></div>
					</div>
				</div>
			</div>
			<!-- END PROFILE PORTLET-->
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->
</div>