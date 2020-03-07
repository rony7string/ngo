<section class="content-header">
	<h1>
		Member
	</h1>
	<ol class="breadcrumb">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="members">Member</a></li>
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
		<form name="members" action="members/member_save" method="post" class="form-horizontal">
			<div class="col-lg-6 col-xs-1">
				
				<div class="form-group">
					<label class="col-sm-3 control-label pull-left">Member Code</label>
					<div class="col-sm-9">
						<input type="text" name="code" id="code" value="<?php if(count($member) > 0){ echo $member['code']; } else { echo $code; } ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Member Name</label>
					<div class="col-sm-9">
						<input type="text" name="name" id="name" placeholder="Member name" value="<?php if(count($member) > 0){ echo $member['name']; } ?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Husbend /Father's Name</label>
					<div class="col-sm-9">
						<input type="text" name="father_name" id="father_name" placeholder="Husbend or Father's Name" value="<?php if(count($member) > 0){ echo $member['father_name']; } ?>" class="form-control" >
					</div>
				</div>
				
				<h4 class="box-title">Present Address</h4>
				<div class="form-group">
					<label class="col-sm-3 control-label">Village</label>
					<div class="col-sm-9">
						<input type="text" name="village" id="village" placeholder="Village" value="<?php if(count($member) > 0){ echo $member['village']; } ?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Post Office</label>
					<div class="col-sm-9">
						<input type="text" name="post_office" id="post_office" placeholder="Post Office" class="form-control" value="<?php if(count($member) > 0){ echo $member['post_office']; } ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Police Station</label>
					<div class="col-sm-9">
						<input type="text" name="police_station" id="police_station" placeholder="Police Station" class="form-control" value="<?php if(count($member) > 0){ echo $member['police_station'];}?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">District</label>
					<div class="col-sm-9">
						<input type="text" name="district" id="district" placeholder="District" class="form-control" value="<?php if(count($member) > 0){ echo $member['district'];}?>" >
					</div>
				</div>

				<h4 class="box-title">Permanent Address</h4>
				<div class="form-group">
					<label class="col-sm-3 control-label">Village</label>
					<div class="col-sm-9">
						<input type="text" name="p_village" id="p_village" placeholder="Village" value="<?php if(count($member) > 0){ echo $member['p_village']; } ?>" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Post Office</label>
					<div class="col-sm-9">
						<input type="text" name="p_post_office" id="p_post_office" placeholder="Post Office" class="form-control" value="<?php if(count($member) > 0){ echo $member['p_post_office']; } ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Police Station</label>
					<div class="col-sm-9">
						<input type="text" name="p_police_station" id="p_police_station" placeholder="Police Station" class="form-control" value="<?php if(count($member) > 0){ echo $member['p_police_station'];}?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">District</label>
					<div class="col-sm-9">
						<input type="text" name="p_district" id="p_district" placeholder="District" class="form-control" value="<?php if(count($member) > 0){ echo $member['p_district'];}?>" >
					</div>
				</div>

			</div>
			<div class="col-lg-6 col-xs-6">

				<div class="form-group">
					<label  class="col-sm-3 control-label"> Date</label>
					<div class="col-sm-9">
						<input type="text"  name="date" id="date" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php if(count($member) > 0) : echo date_to_ui($member['date']);  else : echo date('d/m/Y'); endif; ?>">
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label">Share</label>
					<div class="col-sm-9">
						<input type="text" name="share" id="share" placeholder="Share"  class="form-control" value="<?php if(count($member) > 0){ echo $member['share']; } ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Admistion Fee</label>
					<div class="col-sm-9">
						<input type="text" name="fee" placeholder="100" id="fee" class="form-control" value="<?php if(count($member) > 0){ echo $member['fee'];} else{ echo '100';} ?>">
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label">Mobile</label>
					<div class="col-sm-9">
						<input type="text" name="mobile" id="mobile" value="<?php if(count($member) > 0){ echo $member['mobile']; } ?>" class="form-control" placeholder="Member Mobile Number">
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label">National ID</label>
					<div class="col-sm-9">
						<input type="text" name="nid_num" id="nid_num" value="<?php if(count($member) > 0){ echo $member['nid_num']; } ?>" class="form-control" placeholder="National ID Number">
					</div>
				</div>
				<h4 class="box-title">Nominee Infomation</h4>
				<div class="form-group">
					<label class="col-sm-3 control-label"> Name</label>
					<div class="col-sm-9">
						<input type="text" name="nominee" id="nominee" placeholder="Nominee name" value="<?php if(count($member) > 0){ echo $member['nominee']; } ?>" class="form-control" >
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label"> Address</label>
					<div class="col-sm-9">
						<textarea name="nominee_address" id="nominee_address" class="form-control" placeholder="Nominee Address" ><?php if(count($member) > 0){ echo $member['nominee_address']; } ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label"> Mobile</label>
					<div class="col-sm-9">
						<input type="text" name="nominee_mobile" id="nominee_mobile" value="<?php if(count($member) > 0){ echo $member['nominee_mobile']; } ?>" class="form-control" placeholder="Nominee Mobile Number">
					</div>
				</div>

				<div class="form-group">
					<label  class="col-sm-3 control-label">National ID</label>
					<div class="col-sm-9">
						<input type="text" name="nominee_nid_num" id="nominee_nid_num" value="<?php if(count($member) > 0){ echo $member['nominee_nid_num']; } ?>" class="form-control" placeholder="National ID Number">
					</div>
				</div>
				<h4 class="box-title">Member Status</h4>
				<div class="form-group">
					<label  class="col-sm-3 control-label pull-left">Select </label>
					<div class="col-sm-9">
						<select  name="status" id="status" class="form-control select2">
							<option value="active" <?php if (count($member) > 0 && $member['status'] == 'active') : echo 'selected'; endif; ?>>Active</option>
							<option value="inactive" <?php if (count($member) > 0 && $member['status'] == 'inactive') : echo 'selected'; endif; ?>>Inactive</option>
						</select>
					</div>
				</div>

				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

				<?php if(count($member) > 0): ?>
					<input type="hidden" name="id" value="<?php echo $member['id']; ?>" />
				<?php endif; ?>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" id="add_member" class="btn btn-info pull-right"  value="<?php if(count($member) > 0){ echo 'Save Changes';} else{ echo 'Save';} ?>"/>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</section>
