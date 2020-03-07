<section class="content-header">
	<h1>
		Sales
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="accounts">Accounts</a></li>
		<li class="active">Journal List</li>
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
					<tr>
						<th>Journal No</th>
						<th>Journal Date</th>
						<th>Debit A/C Head</th>
						<th>Debit Amount</th>
						<th>Credit A/C Head</th>
						<th>Credit Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($journals as $key => $value):
						?>
						<tr>
							<td><b><a href="accounts/journal_preview/<?php echo $value['id']; ?>" target="_blank"><?php echo $value['journal_no']; ?></a></b></td>
							<td><?php echo date('jS M, Y ', strtotime($value['journal_date'])); ?></td>
							<td><?php echo $value['debit_ac']; ?></td>
							<td><?php echo number_format($value['debit_amount'], 2); ?></td>
							<td class="col-sm-2"><?php echo $value['credit_ac']; ?></td>
							<td><?php echo number_format($value['credit_amount'], 2); ?></td>
							<td>
								<a class="btn-sm btn-warning" href="accounts/journal_save/<?php echo $value['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="accounts/delete_journal/<?php echo $value['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
							</td>
						</tr>
						<?php
					endforeach;
					?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
</section>

