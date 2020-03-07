<section class="content-header">
	<h1>
		Journal
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="accounts">Accounts</a></li>
		<li class="active"><?php if (count($master) > 0): ?>Edit<?php else: ?>Add New<?php endif; ?> Journal</li>
	</ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Entry Form</h3>
			<div class="box-tools">
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="box-body">
			<form  class="form-horizontal">
				<div class="col-lg-6">
					<div class="form-group">
						<label class="col-xs-4 control-label pull-left">Journal No</label>
						<div class="col-xs-8">
							<input type="text" name="journal_no" id="journal_no" placeholder="Enter Journal No ..." value="<?php echo $journal_no; ?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label  class="col-xs-4 control-label">Journal Date</label>
						<div class="col-xs-8">
							<input type="text"  class="form-control" name="journal_date" id="journal_date"data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php
							if (count($master) > 0) :
								echo $master['journal_date'];
							else :
								echo date('d-m-Y');
							endif;
							?>">
						</div>
					</div>
					<div class="form-group">
						<label  class="col-xs-4 control-label">Narration</label>
						<div class="col-xs-8">
							<textarea class="form-control" rows="3"  placeholder="Narration...">
								<?php
								if (count($master) > 0) :
									echo $master['memo'];
								else :
									echo set_value('memo');
								endif;
								?>
							</textarea>
						</div>
					</div>
				</div>
				<div class="col-lg-6">&nbsp;<br><br><br><br><br><br><br><br><br><br><br></div>
				<div class="col-lg-6">
					<div class="form-group">
						<h3 class="box-header with-border">Debit Voucher</h3>
						<label  class="col-sm-3 control-label">Select A/C Head</label>
						<div class="col-sm-9">
							<select name="debit_chart_id" id="debit_chart_id"  data-placeholder="chart_id" class="form-control select2">
								<?php echo $ac_chart_tree; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-3 control-label">Debit Voucher</label>
						<div class="col-sm-9">
							<input type="text" name="debit_amount" id="debit_amount" class="form-control" placeholder="00.00"value="<?php echo set_value('debit'); ?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="button" class="btn btn-success pull-right" name="debit_add" id="debit_add" value="Add Debit"/>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<h3 class="box-header with-border">Credit Voucher</h3>
						<label  class="col-sm-3 control-label">Select A/C Head</label>
						<div class="col-sm-9">
							<select name="credit_chart_id" id="credit_chart_id" class="form-control select2" data-placeholder="chart_id">
								<?php echo $ac_chart_tree; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-3 control-label">Credit Amount</label>
						<div class="col-sm-9">
							<input type="text" name="credit_amount"  class="form-control" id="credit_amount" placeholder="00.00" value="<?php echo set_value('credit'); ?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="button" name="credit_add" id="credit_add" class="btn btn-success pull-right" value="Add Credit" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Voucher List</h3>
			<div class="box-tools">
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="col-lg-6 pull-left">
				<div id="debit_details">
					<table class="table table-bordered table-striped responsive">
						<thead>
							<tr>
								<th class="center">Debit A/C Head</th>
								<th class="center">Amount</th>
								<th class="center">Memo</th>
								<th class="center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$debit_amount = 0;
							foreach ($details as $list) :
								if ($list['debit']) :
									?>
									<tr>
										<td><?php echo $list['chart_name']; ?></td>
										<td class="center"><?php echo $list['debit']; ?></td>
										<td class="center"><?php echo $list['memo']; ?></td>
										<td class="center">
											<input type="hidden" value="<?php echo $list['id']; ?>" /><span class="btn btn-danger debit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span>
										</td>
									</tr>
									<?php
									$debit_amount += $list['debit'];
								endif;
							endforeach;
							?>
						</tbody>
						<tfoot>
							<tr>
								<th class="left" colspan="4">&nbsp;</th>
							</tr>
							<tr>
								<th colspan="2">Total </th>
								<th colspan="2" class="right" id="debit_total"><?php echo number_format($debit_amount, 2); ?></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="col-lg-6 pull-right">
				<div id="credit_details">
					<table class="table table-bordered table-striped responsive">
						<thead>
							<tr>
								<th class="center">Credit A/C Head</th>
								<th class="center">Amount</th>
								<th class="center">Memo</th>
								<th class="center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$credit_amount = 0;
							foreach ($details as $list) :
								if ($list['credit']) :
									?>
									<tr>
										<td><?php echo $list['chart_name']; ?></td>
										<td class="center"><?php echo $list['credit']; ?></td>
										<td class="center"><?php echo $list['memo']; ?></td>
										<td class="center">
											<input type="hidden" value="<?php echo $list['id']; ?>" /><span class="btn btn-danger credit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span>
										</td>
									</tr>
									<?php
									$credit_amount += $list['credit'];
								endif;
							endforeach;
							?>
						</tbody>
						<tfoot>
							<tr>
								<th class="left" colspan="4">&nbsp;</th>
							</tr>
							<tr>
								<th colspan="2">Total </th>
								<th colspan="2" class="right" id="credit_total"><?php echo number_format($credit_amount, 2); ?></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

		</div>
		<div class="form-group" align="center">
			<input type="button" class="btn btn-success" id="journal_complete" value="Complete Journal Entry" />
		</div>
		<!-- /.box-body -->
	</div>
</section>

