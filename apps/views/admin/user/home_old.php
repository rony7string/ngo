<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					User
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li>
						<a href="user">User</a>
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
			<!--BEGIN METRO STATES-->
			<div class="metro-nav">
				<?php if($privileges['user_section'] == 1){ ?>
				<div class="metro-nav-block nav-block-purple double">
					<a data-original-title="" href="user/save">
						<i class="icon-file-text"></i>
						<div class="info">Add New</div>
						<div class="status">User</div>
					</a>
				</div>
				<div class="metro-nav-block nav-block-purple">
					<a data-original-title="" href="user/list_all">
						<i class="icon-list"></i>
						<div class="info">List All</div>
						<div class="status">User</div>
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="space10"></div>
			<!--END METRO STATES-->
		</div>

		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->
</div>