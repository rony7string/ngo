<section class="content-header">
	<h1>
		Accounts
		<small></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="accounts">Accounts</a></li>
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
	<?php if($privileges['loan'] == 1) : ?>
		<div class="col-lg-3 col-xs-6">
			<a href="accounts/journal_save">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>Journal</h3>
						<p>Add New</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-calculator"></i>
						<i class="ion ion-android-add"></i>
					</div>
				</div>
			</a>
		</div>
		<div class="col-lg-3 col-xs-6">
			<a href="accounts/journal_list">
				<div class="small-box bg-aqua-active">
					<div class="inner">
						<h3>Journal </h3>
						<p>List All</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-calculator"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>

	<?php if($privileges['loan'] == 1) : ?>
		<div class="col-lg-3 col-xs-6">
			<a href="accounts/chart_save">
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>A/C Head</h3>
						<p>Add New</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-calculator"></i>
						<i class="ion ion-arrow-return-left"></i>
					</div>
				</div>
			</a>
		</div>
		<div class="col-lg-3 col-xs-6">
			<a href="accounts/chart_list">
				<div class="small-box bg-purple-active">
					<div class="inner">
						<h3>A/C Head</h3>
						<p>List All</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-calculator"></i>
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	
</section>
