<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->   
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Edit Profile
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						Edit Profile
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<!-- BEGIN PROFILE PORTLET-->
			<div class=" profile span12">
				<div class="span12">
					<div class="row-fluid">
						<div class="span12 bio form">
							<h2> Profile Info</h2>
							<form action="user/profile_edit" method="post" class="form-horizontal form-bordered form-validate" id="frm1">
								<div class="control-group">
									<label for="full_name" class="control-label">Full Name</label>
									<div class="controls">
										<input type ="text" name="name" value="<?php if (count($user) > 0) { echo $user['name']; } ?>" id="textfield" class="input-xlarge" data-rule-required="true" data-rule-minlength="2" />
									</div>
								</div>
								<div class="control-group">
									<label for="email" class="control-label">Email Address</label>
									<div class="controls">
										<input type="text" name="email" value="<?php if (count($user) > 0) { echo $user['email']; } ?>" id="emailfield" class="input-xlarge" data-rule-email="true" data-rule-required="true" />
									</div>
								</div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<?php if (count($user) > 0) { ?>
								<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
								<?php } ?>
								<input type="hidden" name="status" value="active" />
								<div class="form-actions">
									<input type="submit" class="btn btn-info" value="Save">
									<button type="reset" class="btn">Cancel</button>
								</div>
							</form>

							<div class="space10"></div>

							<div class="widget red">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i> Set New Password</h4>
									<span class="tools">
										<a class="icon-chevron-down" href="javascript:;"></a>
									</span>
								</div>
								<div class="widget-body ">
									<form class="form-horizontal" method="post" action="user/change_password">
										<div class="control-group">
											<label class="control-label">Current Password</label>
											<div class="controls">
												<input type="password" name="c_password" class="span6 ">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">New Password</label>
											<div class="controls">
												<input type="password" name="password" class="span6 ">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Re-type New Password</label>
											<div class="controls">
												<input type="password" name="r_password" class="span6 ">
											</div>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
										<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
										<div class="form-actions">
											<button type="submit" class="btn btn-success">Change Password</button>
											<button type="button" class="btn">Cancel</button>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE PORTLET-->
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->
</div>