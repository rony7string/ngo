<section class="content-header">
	<h1>
		Loan
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="loaner">Loan</a></li>
		<li class="active">Loan List</li>
	</ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> List All</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Land Code</th>
						<th>Member Code</th>
						<th>Name</th>
						<th>Village</th>
						<th>Amount</th>
						<th>Mobile</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($loaners as $loaner) :
						?>
						<tr>
							<td><?php echo $loaner['code']; ?></td>
							<td><?php echo $loaner['member_code']; ?></td>
							<td><?php echo $loaner['name']; ?></td>
							<td><?php echo $loaner['village']; ?></td>
							<td><?php echo $loaner['loan_amount']; ?></td>
							<td><?php echo $loaner['mobile']; ?></td>
							<td>
								<a class="btn-sm btn-warning" href="inventory/loaner_save/<?php echo $loaner['id']; ?>"><i class="ion-edit"></i> Edit</a>
								<a class="btn-sm btn-danger del" href="inventory/loaner_delete/<?php echo $loaner['id']; ?>"><i class="ion-trash-b"></i> Delete</a>
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

