<section class="content-header">
	<h1>
		Reports
		<small></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="report">Reports</a></li>
		<li class="active">Home</li>
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
	
	<?php if($privileges['ledger_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/ledger">
				<div class="small-box bg-yellow-active">
					<div class="inner">
						<h3>Ledger</h3>
						<p>Ledger</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-cart"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['trial_balance_report'] == 1):?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/trial_balance">
				<div class="small-box bg-orange">
					<div class="inner">
						<h3>Trial Balance</h3>
						<p>Trial Balance</p>
					</div>
					<div class="icon">
						<i class="ion ion-android-cart"></i>
						<i class="ion ion-arrow-return-left"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['balance_sheet_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/balance_sheet">
				<div class="small-box bg-orange-active">
					<div class="inner">
						<h3>Balance Sheet</h3>
						<p>Balance Sheet</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['income_statement_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/income_statement">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>Income Statement</h3>
						<p>Income Statement</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['bills_receivable_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/bills_receivable">
				<div class="small-box  bg-olive">
					<div class="inner">
						<h3>Bills Receivable</h3>
						<p>Bills Receivable</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['bills_payable_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/bills_payable">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>Bills Payable</h3>
						<p>Bills Payable</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['cash_book_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/cash_book">
				<div class="small-box bg-aqua-active">
					<div class="inner">
						<h3>Cash Book</h3>
						<p>Cash Book</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
	<?php if($privileges['bank_book_report'] == 1): ?>
		<div class="col-lg-3 col-xs-6">
			<a href="report/bank_book">
				<div class="small-box bg-red-active">
					<div class="inner">
						<h3>Bank Book</h3>
						<p>Bank Book</p>
					</div>
					<div class="icon">
						<i class="ion ion-arrow-return-left"></i>
						<i class="ion ion-android-list"></i>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
</div>
</section>
