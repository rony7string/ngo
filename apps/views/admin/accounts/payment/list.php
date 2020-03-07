<section class="content-header">
	<h1>Payment Receipt</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="accounts">Accounts</a></li>
		<li class="active">	Payment Receipt List</li>
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
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> List All</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr align="left" style="font-family: Arial; text-decoration: none;">
						<th>Payment No</th>
						<th>Payment Date</th>
						<th>Amount</th>
						<th>Ref. Employee</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($payments as $key => $value) :
						?>
						<tr>
							<td><a href="accounts/payment_preview/<?php echo $value['id']; ?>" target="_blank"><strong><?php echo $value['payment_no']; ?></strong></a></td>
							<td><?php echo date('jS F Y ', strtotime($value['payment_date'])); ?></td>
							<td><?php echo number_format($value['amount'], 2); ?></td>
							<td><?php echo $value['emp_name']; ?></td>
							<td>
								<a class="btn-sm btn-warning" href="accounts/payment_save/<?php echo $value['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="accounts/payment_delete/<?php echo $value['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
							</td>
						</tr>
						<?php
					endforeach;
					?>
				</tbody>
			</table>

		</div>
		<!-- /.box-body -->
	</div>
</section>

