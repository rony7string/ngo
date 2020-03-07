<section class="content-header">
	<h1>
		A/C Head
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="settings">Settings</li>
		<li class="active">Default A/C Head List</li>
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
						<th>Code of A/C</th>
						<th>Name of A/C</th>
						<th>A/C Class</th>
						<th>Created</th>
						<th>Status</th>
						<th class="col-sm-2">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($charts as $chart): ?>
						<tr>
							<td><?php echo $chart['code']; ?></td>
							<td><?php echo $chart['name']; ?></td>
							<td><span class="label label-info"><?php echo $chart['type']; ?></span></td>
							<td class="right"><?php echo date('jS M, Y ', strtotime($chart['created_at'])); ?></td>
							<td class="center"><?php if($chart['status']== 'Active'): ?><span class="label label-success">Active</span><?php else : ?><span class="label label-important">Inactive</span><?php endif; ?></td>
							<td class="center">
								<a class="btn-sm btn-warning" href="settings/chart_save/<?php echo $chart['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="settings/chart_delete/<?php echo $chart['id']; ?>"><i class="ion-android-delete"></i> Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
</section>

