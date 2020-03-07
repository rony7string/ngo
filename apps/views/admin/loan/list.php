<section class="content-header">
	<h1>
		Loan
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="loan">loan</a></li>
		<li class="active">List All</li>
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
		<h3 class="box-title">Loan List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Package Name</th>
					<th>Amount</th>
					<th>Inatallmant</th>
					<th>Installmant Number</th>
					<th>Per Imstallmant Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($loans as $loan)  :
					?>
					<tr>
						<td><a href="loan/loan_details/<?php echo $loan['id']; ?>"><strong><?php echo $loan['id']; ?></strong></a></td>
						<td><?php echo $loan['package_name']; ?></td>
						<td><?php echo $loan['loan_amount']; ?></td>
						<td><?php echo $loan['loan_interest']; ?></td>
						<td><?php echo $loan['num_of_installmant']; ?></td>
						<td><?php echo $loan['per_installmant_amount']; ?></td>
						<td class="center">
							<a class="btn-sm btn-warning" href="loan/loan_save/<?php echo $loan['id']; ?>"><i class="ion-edit"></i> Edit</a>
							<a class="btn-sm btn-danger del" href="loan/loan_delete/<?php echo $loan['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
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

