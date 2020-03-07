<section class="content-header">
	<h1>
		Loan Collection
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="loaner">Loan</a></li>
		<li class="active">Collection</li>
	</ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="form-group" style="width: 50%">
				<label class="col-sm-3 control-label pull-left">Loan Code</label>
				<div class="col-sm-9">
					<select  name="loan_code" id="loan_code" class="form-control select2">
						<option value=""></option>
						<?php foreach ($loaners as $loan) : ?>
							<option value="<?php echo $loan['id']; ?>"><?php echo $loan['code']?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body" style="display:none;">
			<table class="table">
				<tbody>
					<tr>
						<th>Member No</th>
						<td>1100</td>
						<th>Loan Date</th>
						<td>10-10-2018</td>
						<th>Loan End Date</th>
						<td>10-10-2018</td>
					</tr>
					<tr>
						<th>Loan No</th>
						<td>2018</td>
						<th>Loan Amount</th>
						<td>2018</td>
						<th>Principal Realise</th>
						<td>5000</td>
					</tr>
					<tr>
						<th>Member Name</th>
						<td>Abul Hosen</td>
						<th>Loan Qty.</th>
						<td>10</td>
						<th>Service Charge Realise</th>
						<td>1000</td>
					</tr>
					<tr>
						<th>Husband /Father's Name</th>
						<td>Abul Hosen</td>
						<th></th>
						<td></td>
						<th>Total</th>
						<th>6000</th>						
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
</section>

