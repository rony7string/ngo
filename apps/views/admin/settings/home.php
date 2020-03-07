<section class="content-header">
	<h1>
		Settings
		<small></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><a href="settings">Settings</a></li>
	</ol>
</section>
<section class="content">
	<?php if($this->session->flashdata('success') || $this->session->flashdata('info') || $this->session->flashdata('error')) : ?>
	<?php if($this->session->flashdata('success')) : ?>
		<div class="alert alert-success alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('info')) : ?>
		<div class="alert alert-info alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
<div class="row">
	<?php if($privileges['basic_settings'] == 1) : ?>
		<div class="col-lg-6">
			<a href="settings/basic">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>Basic</h3>
						<p>Settings</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-settings"></i>
						<i class="ion ion-android-settings"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['basic_settings'] == 1) : ?>
		<div class="col-lg-3 col-xs-6">
			<a href="settings/currency_save">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>Currency</h3>
						<p>Add New</p>
					</div>
					<div class="icon">
						<i class="ion ion-social-usd"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['basic_settings'] == 1) : ?>
		<div class="col-lg-3 col-xs-6">
			<a href="settings/currency_list">
				<div class="small-box bg-light-blue">
					<div class="inner">
						<h3>Currency</h3>
						<p>List All</p>
					</div>
					<div class="icon">
						<i class="ion ion-social-usd"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
</div>
<div class="row">
	<?php if($this->session->userdata('user_type') == 'Admin'): ?>
		<?php if($privileges['company_settings'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<a href="settings/cmp_save">
					<div class="small-box bg-green">
						<div class="inner">
							<h3>Company</h3>
							<p>Add New</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-add-circle"></i>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-xs-6">
				<a href="settings/cmp_list">
					<div class="small-box bg-olive">
						<div class="inner">
							<h3>Company</h3>
							<p>List All</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-list"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<?php if($privileges['default_ac_head_settings'] == 1): ?>
			<div class="col-lg-3">
				<a href="settings/chart_save">
					<div class="small-box bg-orange">
						<div class="inner">
							<h3>A/C Head</h3>
							<p>Add New</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-add"></i>
							<i class="ion ion-ios-list"></i>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3">
				<a href="settings/chart_list">
					<div class="small-box bg-orange-active">
						<div class="inner">
							<h3>A/C Head</h3>
							<p>List All</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-list"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
</section>
