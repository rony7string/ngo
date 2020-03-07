<section class="content-header">
	<h1>
		Members
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="members">Member</a></li>
		<li class="active">Member List</li>
	</ol>
</section>
<section class="content">
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> List All</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="member_table" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Husband / Father </th>
						<th>Villagge</th>
						<th>Post Office</th>
						<th>Mobile</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($members as $member) :
						?>
						<tr>
							<td><?php echo $member['code']; ?></td>
							<td><?php echo $member['name']; ?></td>
							<td><?php echo $member['father_name']; ?></td>
							<td><?php echo $member['village']; ?></td>
							<td><?php echo $member['post_office']; ?></td>
							<td><?php echo $member['mobile']; ?></td>
							<td>
								<a class="btn-sm btn-warning" href="members/member_save/<?php echo $member['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="members/member_delete/<?php echo $member['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
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


