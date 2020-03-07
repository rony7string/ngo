 <aside class="main-sidebar">
 	<!-- sidebar: style can be found in sidebar.less -->
 	<section class="sidebar">
 		<!-- Sidebar user panel -->
 		<div class="user-panel">
 			<div class="pull-left image">
 				<img src="assets/backend/img/avatar-mini.png" class="img-circle" alt="User Image">
 			</div>
 			<div class="pull-left info">
 				<p><?php echo $this->session->userdata('user_name');?></p>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
       <input type="text" name="q" class="form-control" placeholder="Search...">
       <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- BEGIN SIDEBAR MENU -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li>
     <a href ="dashboard">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
 			<!--<span class="pull-right-container">
				<i class ="fa fa-angle-left pull-right"></i>
            </span>
 				</a>
 			<ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>-->
        </li>
        <?php
        if($privileges['manage_member'] == 1)
          : ?>
        <li class="treeview <?php if($menu == 'manage_member'){ ?>active<?php } ?> ">
          <a href="">
            <i class="fa fa-users"></i>
            <span>Manage Members</span>
            <span class="pull-right-container">
              <i class ="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="members/member_save"><i class="fa fa-plus"></i>New Member</a></li>
            <li><a href="members/member_list"><i class="fa fa-list"></i> All Members</a></li>
          </ul>
        </li>
      <?php endif; ?>

      <?php
      if($privileges['manage_loaner'] == 1)
       : ?>
     <li class="treeview <?php if($menu == 'manage_loaner'){ ?>active<?php } ?> ">
       <a href="">
        <i class="fa fa-leanpub"></i>
        <span>Manage Loan</span>
        <span class="pull-right-container">
          <i class ="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="loaner/add_new_loaner"><i class="fa fa-plus"></i>New Loan</a></li>
        <li><a href="loaner/loan_collection"><i class="fa fa-usd"></i>Loan Collection</a></li>
        <li><a href="loaner/loan_list"><i class="fa fa-list"></i> All Loan</a></li>
      </ul>
    </li>
  <?php endif; ?>

  <?php
  if($privileges['manage_depositor'] == 1)
   : ?>
 <li class="treeview <?php if($menu == 'manage_depositor'){ ?>active<?php } ?> ">
   <a href="">
    <i class="fa fa-usd"></i>
    <span>Manage Deposit</span>
    <span class="pull-right-container">
      <i class ="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href=""><i class="fa fa-plus"></i>Deposit Collcetion</a></li>
    <li><a href=""><i class="fa fa-columns"></i>Deposit Return</a></li>
  </ul>
</li>


<?php
if($privileges['hr_menu'] == 1)
 : ?>
<li class="treeview <?php if($menu == 'hr'){ ?>active<?php } ?> ">
 <a href="">
  <i class="fa fa-address-book"></i>
  <span>Manage Staff</span>
  <span class="pull-right-container">
    <i class ="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li><a href="hr/emp_save"><i class="fa fa-plus"></i>New Staff</a></li>
  <li><a href="hr/emp_list"><i class="fa fa-list"></i> All Staff</a></li>
</ul>
</li>
<?php endif; ?>

<?php endif; ?>
<?php if($privileges['accounts_menu'] == 1): ?>
  <li class="<?php if($menu == 'accounts'){ ?>active<?php } ?>">
   <a class="" href="accounts">
    <i class="fa fa-calculator"></i>
    <span>Accounts</span>
  </a>
</li>
<?php endif; ?>

<?php if($privileges['report_menu'] == 1): ?>
  <li class="<?php if($menu == 'report'){ ?>active<?php } ?>">
   <a class="" href="report">
    <i class="fa fa-columns"></i>
    <span>Reports</span>
  </a>
</li>
<?php endif ?>
<?php if($privileges['settings_menu'] == 1): ?>
  <li class="<?php if($menu == 'settings'){ ?>active<?php } ?>">
   <a class="" href="settings">
    <i class="fa  fa-gear"></i>
    <span>Settings</span>
  </a>
</li>
<?php endif ?>
<?php if($privileges['user_menu'] == 1): ?>
  <li class=" <?php if($menu == 'user'){ ?>active<?php } ?>">
   <a href="user" class="">
    <i class="fa fa-user"></i>
    <span>Users</span>
  </a>
</li>
<?php endif; ?>
</ul>
<!-- END SIDEBAR MENU -->
</section>
</aside>