<section class="content-header">
	<h1>
		Company
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="inventory">Inventory</a></li>
		<li class="settings">Settings</li>
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
			<h3 class="box-title">Currency List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Contact Person</th>
						<th>Contact Number</th>
						<th>Email Address</th>
						<th class="col-sm-2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($companies as $company)   :
						?>
						<tr>
							<td ><?php echo $company['name']; ?></td>
							<td ><?php echo $company['address']; ?></td>
							<td><?php echo $company['contact_person']; ?></td>
							<td><?php echo $company['mobile_no']; ?></td>
							<td><?php echo $company['email']; ?></td>
							<td>
								<a class="btn-sm btn-primary" href="settings/cmp_set/<?php echo $company['id']; ?>"><i class="icon-map-marker icon-white"></i> Set As</a>
								<a class="btn-sm btn-warning" href="settings/cmp_save/<?php echo $company['id']; ?>"><i class="ion-edit"></i>Edit</a>
								<a class="btn-sm btn-danger" href="settings/cmp_delete/<?php echo $company['id']; ?>"><i class="icon-trash-b"></i> Delete</a>
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

