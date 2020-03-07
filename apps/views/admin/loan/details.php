<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->   
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Profile
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="#">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						Loan Packages
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
				<div class="profile-head">
					<div class="span9">
						<h1><?php echo $emp['name']; ?></h1>
						<p><?php $emp['designation']; ?> at <a href="<?php echo $emp['company_url']; ?>" target="_blank"><?php echo $emp['company_name']; ?></a></p>
					</div>
				</div>
				<div class="space15"></div>
				<div class="row-fluid">
					<div class="span12 bio">
						<h2>Bio Graph</h2>
						<p><label>Full Name </label>: <?php echo $emp['name']; ?></p>
						<p><label>Department </label>: <?php echo $emp['department']; ?></p>
						<p><label>Position/Designation </label>: <?php echo $emp['designation']; ?></p>
						<p><label>Father's Name </label>: <?php echo $emp['father_name']; ?></p>
						<p><label>Mother's Name </label>: <?php echo $emp['mother_name']; ?></p>
						<p><label>Present Address </label>: <?php echo $emp['present_address']; ?></p>
						<p><label>Permanent Address </label>: <?php echo $emp['permanent_address']; ?></p>
						<p><label>Email </label>: <?php echo $emp['email']; ?></p>
						<p><label>Mobile </label>: <?php echo $emp['mobile']; ?></p>
						<p><label>Notes </label>: <?php echo $emp['notes']; ?></p>
						<div class="space20"></div>
					</div>
				</div>
			</div>
			<!-- END PROFILE PORTLET-->
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->
</div>