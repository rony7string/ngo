<section class="content-header">
	<h1>
		Loan
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="loaner">loaner</a></li>
		<li class="active"><?php if(count($loaner) > 0){ ?>Edit<?php }else{ ?>Add New<?php } ?> loaner
		</li>
	</ol>
</section>
<section class="content">

	<?php if($this->session->flashdata('success') || $this->session->flashdata('update') || $this->session->flashdata('error')) : ?>
	<?php if($this->session->flashdata('success')) : ?>
		<div class="alert alert-success alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('update')) : ?>
		<div class="alert alert-info alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Success!</strong> <?php echo $this->session->flashdata('update'); ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger alert-dismissible">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
<style type="text/css"> .form-group { margin-bottom: 5px !important;}</style>

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
		<form name="loaner" id="loaner" action="loaner/add_new_loaner" method="post" class="form-horizontal">
			<div class="col-lg-6 col-xs-1">

				<div class="form-group">
					<label class="col-sm-3 control-label pull-left">Loan Code</label>
					<div class="col-sm-9">
						<input type="text" name="code" id="code" value="<?php if(count($loaner) > 0){ echo $loaner['code']; } else echo $code;  ?>" class="form-control" >
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label pull-left">Member Code</label>
					<div class="col-sm-9">
						<select  name="member_code" id="member_code" class="form-control select2">
							<option value=""></option>
							<?php foreach ($members as $member) : ?>
								<option value="<?php echo $member['id']; ?>"><?php echo $member['code']?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Loaner Name</label>
					<div class="col-sm-9">
						<input type="text" name="name" id="name" placeholder="Loaner Name" value="<?php if(count($loaner) > 0){ echo $loaner['name']; } ?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Father Name</label>
					<div class="col-sm-9">
						<input type="text" name="father_name" id="father_name" placeholder="Husband / Father Name" value="<?php if(count($loaner) > 0){ echo $loaner['father_name']; } ?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Village</label>
					<div class="col-sm-9">
						<input type="text" name="village" id="village" placeholder="Village" value="<?php if(count($loaner) > 0){ echo $loaner['village']; } ?>" class="form-control" > </div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Post Office</label>
						<div class="col-sm-9">
							<input type="text" name="post_office" id="post_office" placeholder="Post Office" class="form-control" value="<?php if(count($loaner) > 0){ echo $loaner['post_office']; } ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Police Station</label>
						<div class="col-sm-9">
							<input type="text" name="police_station" id="police_station" placeholder="Police Station" class="form-control" value="<?php if(count($loaner) > 0){ echo $loaner['police_station'];}?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">District</label>
						<div class="col-sm-9">
							<input type="text" name="district" id="district" placeholder="District" class="form-control" value="<?php if(count($loaner) > 0){ echo $loaner['district'];}?>" >
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-3 control-label">Mobile</label>
						<div class="col-sm-9">
							<input type="text" name="mobile" id="mobile" value="<?php if(count($loaner) > 0){ echo $loaner['mobile']; } ?>" class="form-control" placeholder="loaner Mobile Number">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-3 control-label">NID Number</label>
						<div class="col-sm-9">
							<input type="text" name="nid_num" id="nid_num" value="<?php if(count($loaner) > 0){ echo $loaner['nid_num']; } ?>" class="form-control" placeholder="loaner Mobile Number">
						</div>
					</div>

				</div>
				<div class="col-lg-6 col-xs-6">

					<div class="form-group">
						<label  class="col-sm-3 control-label">Joined Date</label>
						<div class="col-sm-9">
							<input type="text"  name="date" id="date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="<?php if(count($loaner) > 0) : echo date_to_ui($loaner['date']);  else : echo date('d/m/Y'); endif; ?>">
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-3 control-label">Loan Date</label>
						<div class="col-sm-9">
							<input type="text"  name="loan_date" id="loan_date" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php if(count($loaner) > 0) : echo date_to_ui($loaner['loan_date']);  else : echo date('d/m/Y'); endif; ?>">
						</div>
					</div>

				<!--		
					<div class="form-group">
							<label  class="col-sm-3 control-label">End Date</label>
							<div class="col-sm-9">
								<input type="text"  name="loan_end_date" id="loan_end_date" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php // if(count($loaner) > 0) : echo date_to_ui($loaner['loan_end_date']);  else : echo date_to_ui($end_date); endif; ?>">
							</div>
						</div>
					-->
					<div class="form-group">
						<label class="col-sm-3 control-label">Field Officer</label>
						<div class="col-sm-9">
							<select name="fo_name" id="fo_name" class="form-control select2">
								<option value=""></option>
								<?php foreach ($field_officers as $field_officer) : ?>
									<option value="<?php echo $field_officer['id']; ?>"><?php echo $field_officer['code'] . ' - ' . $field_officer['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Field Supervisor</label>
						<div class="col-sm-9">
							<select name="fs_name" id="fs_name" class="form-control select2">
								<option value=""></option>
								<?php foreach ($field_officers as $field_officer) : ?>
									<option value="<?php echo $field_officer['id']; ?>"><?php echo $field_officer['code'] . ' - ' . $field_officer['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Loan Amount</label>
						<div class="col-sm-9">
							<input type="text" name="loan_amount"  id="loan_amount" placeholder="Loan Amount"  class="form-control" value="<?php if(count($loaner) > 0){ echo $loaner['loan_amount'];} ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Service Charge</label>
						<div class="col-sm-9">
							<input type="text" name="service_charge"  id="service_charge" placeholder="Service Charge"  class="form-control" value="<?php if(count($loaner) > 0){ echo $loaner['service_charge'];} ?>">
						</div>
					</div>
					<div class="form-group">
						<label  class="col-sm-3 control-label">Number of Installmant</label>
						<div class="col-sm-9">
							<select name="installment" id="installment" class="form-control select2" data-placeholder="Select Status">
								<option value=""></option>
								<option value="10" <?php if (count($loaner) > 0 && $loaner['installment'] == '10') : echo 'selected'; endif;?>>10</option>
								<option value="12" <?php if (count($loaner) > 0 && $loaner['installment'] == '12') : echo 'selected'; endif;?>>12</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label  class="col-sm-3 control-label pull-left">Guarantor</label>
						<div class="col-sm-9">
							<select  name="guarantor" id="guarantor" class="form-control select2">
								<option value="Bank Check" <?php if (count($loaner) > 0 && $loaner['guarantor'] == 'Bank Check') : echo 'selected'; endif; ?>>Bank Check</option>
								<option value="Stamp" <?php if (count($loaner) > 0 && $loaner['guarantor'] == 'Stamp') : echo 'selected'; endif; ?>>Stamp</option>
								<option value="Dalil" <?php if (count($loaner) > 0 && $loaner['guarantor'] == 'Dalil') : echo 'selected'; endif; ?>>Dalil</option>
							</select>
						</div>
					</div>
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<?php if(count($loaner) > 0): ?>
						<input type="hidden" name="id" value="<?php echo $loaner['id']; ?>" />
					<?php endif; ?>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" class="btn btn-info pull-right"  value="Save"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
