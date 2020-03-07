<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head'); ?>
</head>
<body>
	<div class="wrapper">
		<!-- Main content -->
		<section class="invoice">
			<!-- title row -->
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"> <img src="<?php echo $this->session->userdata('company_logo'); ?>"></i><?php echo $this->session->userdata('company_name'); ?>

					</h2>
				</div>
				<!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
					<h4>Money Receipt # <?php echo $details['mr_no']; ?></h4>
					<h4>Date: <?php echo date('jS F Y ', strtotime($details['mr_date'])); ?></h4>
					<h4>Memo: <?php echo $details['memo']; ?></h4>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
					<address>&nbsp;
					</address>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
					<h4>Customer Name: <?php echo $customer['name']; ?></h4>
					<h4>Mobile : <?php echo $customer['mobile']; ?></h4>
					<h4>Email : <?php echo $customer['email']; ?></h4>
					<h4>Ref. Employee : <?php if( isset($emp['name']) ): echo $emp['name']; endif; ?></h4>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<!-- Table row -->
			<div class="row">
				<div class="col-xs-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<tr>
									<th class="center">Details</th>
									<th class="center">Amount</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Receive from Customer</td>
									<td class="right"><?php echo number_format($details['amount'], 2); ?></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Grand Total</th>
									<th class="right"><?php if ($this->session->userdata('currency_symbol_position') == 'Before') { echo $this->session->userdata('currency_symbol'); } ?> <?php echo number_format($details['amount'], 2); ?> <?php if ($this->session->userdata('currency_symbol_position') == 'After') { echo $this->session->userdata('currency_symbol'); } ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-xs-12">
						<a onclick="javascript:window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
					</div>
				</div>
				<!-- /.row -->
			</section>
			<section class="footer">
				<div class="col-xs-12">
					<?php $this->load->view('admin/footer'); ?>
				</div>
			</section>
			<!-- /.content -->

		</div>
		<!-- BEGIN FOOTER -->

		<!-- END FOOTER -->

		<!-- BEGIN JAVASCRIPTS -->
		<?php $this->load->view('admin/js'); ?>
		<!-- ./wrapper -->
	</body>
	</html>
