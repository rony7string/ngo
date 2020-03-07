<section class="content-header">
	<h1>User</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="user">User</a></li>
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
			<h3 class="box-title">User List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Company</th>
						<th>Created</th>
						<th>Status</th>
						<th>User Type</th>
						<th class="col-sm-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($users as $user)  :
						?>
						<tr>
							<td><?php echo $user['name']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['c_name']; ?></td>
							<td><?php echo $user['created']; ?></td>
							<td><?php echo $user['status']; ?></td>
							<td><?php echo $user['type']; ?></td>
							<td>
								<?php if ($this->session->userdata('user_type') != 'User'): ?>
									<a class="btn-sm btn-success" href="user/privileges/<?php echo $user['id']; ?>"><i class="icon-lock icon-white"></i> Permission</a>
								<?php endif; ?>
								<a class="btn-sm btn-warning" href="user/save/<?php echo $user['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="user/delete/<?php echo $user['id']; ?>"><i class="ion-android-delete"></i> Delete</a>
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

