<section class ="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<?php if($privileges['loan_installment'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="">
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>Loan</h3>
							<p>Loan </p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-calculator"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<!-- ./col -->
		<?php if($privileges['manage_loaner'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="">
					<div class="small-box bg-green">
						<div class="inner">
							<h3>Loaner</h3>
							<p>Loaner List</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-people"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<!-- ./col -->
		<?php if($privileges['manage_depositor'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="">
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3>Deposit</h3>
							<p>Deposit</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-cart"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<!-- ./col -->
		<?php if($privileges['deposit'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="">
					<div class="small-box bg-fuchsia">
						<div class="inner">
							<h3>Depositors</h3>
							<p>Depositors</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>

		<?php if($privileges['employee'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="hr/emp_list">
					<div class="small-box bg-maroon">
						<div class="inner">
							<h3>Staff</h3>
							<p>Staff</p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-people"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<?php if($privileges['ac_head'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="accounts/chart_list">
					<div class="small-box bg-red-active">
						<div class="inner">
							<h3>A/C Head</h3>
							<p>A/C Head</p>
						</div>
						<div class="icon">
							<i class="ion ion-document-text"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<?php if($privileges['journal'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="accounts/journal_list">
					<div class="small-box bg-olive">
						<div class="inner">
							<h3>Journal</h3>
							<p>Journal</p>
						</div>
						<div class="icon">
							<i class="ion ion-compose"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
		
		<?php if($privileges['report_menu'] == 1): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<a href="report">
					<div class="small-box bg-light-blue">
						<div class="inner">
							<h3>Reports</h3>
							<p>Reports</p>
						</div>
						<div class="icon">
							<i class="ion ion-android-laptop"></i>
						</div>
					</div>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>


