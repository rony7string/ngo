<section class="content-header">
	<h1>
		Employee
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="hr">H R</a></li>
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
		<h3 class="box-title"> Employee List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Code</th>
					<th>Full Name</th>
					<th>Present Address</th>
					<th>Mobile No</th>
					<th>Joining</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($emps as $emp)  :
					?>
					<tr>
						<td><a href="hr/emp_details/<?php echo $emp['id']; ?>"><strong><?php echo $emp['code']; ?></strong></a></td>
						<td><?php echo $emp['name']; ?></td>
						<td><?php echo $emp['present_address']; ?></td>
						<td><?php echo $emp['mobile']; ?></td>
						<td class="right"><?php echo date('jS F Y ', strtotime($emp['joining'])); ?></td>
						<td class="center">
							<a class="btn-sm btn-warning" href="hr/emp_save/<?php echo $emp['id']; ?>"><i class="ion-edit"></i> Edit</a>
							<a class="btn-sm btn-danger del" href="hr/emp_delete/<?php echo $emp['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
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

