<section class="content-header">
    <h1>
      User
  </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="user">User</a></li>
    <li class="active">
        <?php if (count($user) > 0) : ?>Edit<?php  else : ?>Add New<?php endif; ?> User
    </li>
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
            <form id="frmEmp" action="user/save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Full Name</label>
                        <div class="col-sm-9">
                            <input name="name" value="<?php if (count($user) > 0) : echo $user['name']; endif; ?>" id="name" type="text" placeholder="Full name" class="form-control" />
                        </div>
                    </div>
                    <?php if($this->session->userdata('user_type') == 'Admin'): ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Company</label>
                            <div class="col-sm-9">
                                <select name="company_id" id="company_id" data-placeholder="Company" class="form-control select2">
                                    <?php foreach ($companies as $company) { ?>
                                    <option value="<?php echo $company['id']; ?>" <?php if (count($user) > 0 && $company['id'] == $user['company_id']) { echo 'selected'; } ?>><?php echo $company['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email" value="<?php
                            if (count($user) > 0) :
                                echo $user['email'];
                            endif;
                            ?>" autocomplete=off data-validation="email" data-validation-error-msg="You did not enter a valid e-mail" placeholder="Email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" id="password_confirmation" <?php if ( ! count($user) > 0) : ?>data-validation="length" data-validation-length="min8"<?php endif; ?> placeholder="Password" class="form-control" /> <?php if (count($user) > 0) : echo 'Keep blank for unchange.'; endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" id="password" data-validation="confirmation" placeholder="Confirm Password" class="form-control" /> <?php if (count($user) > 0) : echo 'Keep blank for unchange.'; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <?php if($this->session->userdata('user_type') != 'User'): ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">User Type</label>
                            <div class="col-sm-9">
                               <select name="type" id="status" class="form-control select2" data-placeholder="Select User Type">
                                <option value=""></option>
                                <?php if($this->session->userdata('user_type') == 'Admin'): ?>
                                    <option value="Admin" <?php if (count($user) > 0 && $user['type'] == 'Admin') : echo 'selected'; endif;?>>Admin User</option>
                                <?php endif; ?>
                                <option value="Power User" <?php if (count($user) > 0 && $user['type'] == 'Power User') : echo 'selected'; endif;?>>Power User</option>
                                <option value="User" <?php if (count($user) > 0 && $user['type'] == 'User') : echo 'selected'; endif;?>>User</option> </select>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if($this->session->userdata('user_type') != 'User'):?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control select2" data-placeholder="Select Status">
                                    <option value=""></option>
                                    <option value="Active" <?php if (count($user) > 0 && $user['status'] == 'Active') : echo 'selected'; endif;?>>Active</option>
                                    <option value="Inactive" <?php if (count($user) > 0 && $user['status'] == 'Inactive') : echo 'selected'; endif;?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    <?php endif;?>
                    <input type="hidden" class="form-control" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <?php if(count($user) > 0) : ?>
                     <input type="hidden" name="id"  value="<?php echo $user['id']; ?>" />
                 <?php endif; ?>
                 <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-info pull-right"  value="Save Changes"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
