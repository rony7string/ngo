
<!-- BEGIN TOP NAVIGATION BAR -->
<header id="header" class="main-header">
	<!-- BEGIN LOGO -->
	<a class="logo" href="dashboard">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>LT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>MANOB</b>SHEBA</span>
	</a>
	<!-- END LOGO -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav" >
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/backend/img/avatar-mini.png" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $this->session->userdata('user_name');?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="assets/backend/img/avatar-mini.png" class="img-circle" alt="User Image">

							<p>

								<!-- <small>Member since Nov. 2012</small> -->
							</p>
						</li>
						<!-- Menu Body -->

						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="login/logout" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
	</nav>
</header><!-- /header -->
<!-- END HEADER -->
