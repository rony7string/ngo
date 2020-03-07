<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Trial Balance
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li>
						<a href="report">Report</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						Trial Balance
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->

		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="widget blue">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Trial Balance </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
						</span>
					</div>
					<div class="widget-body">
						<!-- BEGIN FORM-->
						<form class="form-horizontal" id="form-validate" action="report/trial_balance" method="post" target="_blank">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="start_date">Start Date</label>
									<div class="controls">
										<div class="input-append date" data-form="datepicker" data-date="<?php echo date('01/m/Y'); ?>" data-date-format="dd/mm/yyyy">
											<input name="start_date" id="start_date" class="grd-white" data-form="datepicker" size="16" type="text" value="<?php echo date('01/m/Y'); ?>">
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="end_date">End Date</label>
									<div class="controls">
										<div class="input-append date" data-form="datepicker" data-date="<?php echo date('t/m/Y'); ?>" data-date-format="dd/mm/yyyy">
											<input name="end_date" id="end_date" class="grd-white" data-form="datepicker" size="16" type="text" value="<?php echo date('t/m/Y'); ?>">
											<span class="add-on"><i class="icon-th"></i></span>
										</div>
									</div>
								</div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<div class="form-actions">
									<input type="submit" class="btn btn-success" value="View Report" />
								</div>
							</fieldset>
						</form>
						<!-- END FORM-->
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
		</div>

		<!-- END PAGE CONTAINER-->
	</div>
	<!-- END PAGE -->
</div>