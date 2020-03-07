<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->   
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Change Password
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
				<div class="span10">
					<div class="row-fluid">
						<div class="span12 bio form">
							<h2> Profile Info</h2>
							<form action="user/profile" method="post" class="form-horizontal form-bordered form-validate" id="frm1">
								<div class="control-group">
									<label for="full_name" class="control-label">Full Name</label>
									<div class="controls">
										<input type="text" name="name" value="<?php
										if (count($user) > 0) {
											echo $user['name'];
										}
										?>" id="textfield" class="input-xlarge" data-rule-required="true" data-rule-minlength="2" />
									</div>
								</div>
								<div class="control-group">
									<label for="email" class="control-label">Email Address</label>
									<div class="controls">
										<input type="text" name="email" value="<?php
										if (count($user) > 0) {
											echo $user['email'];
										}
										?>" id="emailfield" class="input-xlarge" data-rule-email="true" data-rule-required="true" />
									</div>
								</div>
								<div class="control-group">
									<label for="pwfield" class="control-label">Password</label>
									<div class="controls">
										<input type="password" name="pwfield" id="pwfield" class="input-xlarge" data-rule-required="true" />
									</div>
								</div>
								<div class="control-group">
									<label for="confirmfield" class="control-label">Confirm password</label>
									<div class="controls">
										<input type="password" name="confirmfield" id="confirmfield" class="input-xlarge" data-rule-equalTo="#pwfield" data-rule-required="true" />
									</div>
								</div>
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
								<?php if (count($user) > 0) { ?><input type="hidden" name="id" value="<?php echo $user['id']; ?>" /><?php } ?>
								<input type="hidden" name="status" value="active" />
								<div class="form-actions">
									<input type="submit" class="btn btn-info" value="Submit">
									<button type="reset" class="btn">Cancel</button>
								</div>
							</form>

							<div class="space10"></div>

							<h2>Change Password</h2>

							<div class="widget orange">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i> Sets New Password</h4>
									<span class="tools">
										<a class="icon-chevron-down" href="javascript:;"></a>
										<a class="icon-remove" href="javascript:;"></a>
									</span>
								</div>
								<div class="widget-body ">
									<form class="form-horizontal" action="#">
										<div class="control-group">
											<label class="control-label">Current Password</label>
											<div class="controls">
												<input type="password" class="span6 ">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">New Password</label>
											<div class="controls">
												<input type="password" class="span6 ">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Re-type New Password</label>
											<div class="controls">
												<input type="password" class="span6 ">
											</div>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
										<div class="form-actions">
											<button type="submit" class="btn btn-success">Change Password</button>
											<button type="button" class="btn">Cancel</button>
										</div>

									</form>
								</div>
							</div>

							<h2>Project Progress</h2>

							<div class="widget red">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i> Sets Projects</h4>
									<span class="tools">
										<a class="icon-chevron-down" href="javascript:;"></a>
										<a class="icon-remove" href="javascript:;"></a>
									</span>
								</div>
								<div class="widget-body ">
									<form class="form-horizontal" action="#">
										<div class="control-group">
											<label class="control-label">Project Name</label>
											<div class="controls">
												<input type="text" class="span8 ">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Start and End Date</label>
											<div class="controls">
												<div class="input-prepend">
													<span class="add-on"><i class="icon-calendar"></i></span>
													<input type="text" class=" m-ctrl-medium" id="reservation">
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Progress</label>
											<div class="controls">
												<div id="slider-range-max" class="slider"></div>
												<div class="slider-info">
													Progress Value:
													<span id="slider-range-max-amount"></span>
												</div>
											</div>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
										<div class="text-center">
											<button class="btn btn-inverse "><i class="icon-plus"></i> Add Projects</button>
										</div>

									</form>
								</div>
							</div>

							<div class="text-center">
								<button class="btn btn-inverse btn-large "> Save & Continue</button>
							</div>
							<div class="space20"></div>
							<div class="space20"></div>
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