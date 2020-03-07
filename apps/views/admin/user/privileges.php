<section class="content-header">
    <h1>
      User
  </h1>
  <ol class="breadcrumb">
    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="user">User</a></li>
    <li class="active">
      Privilege
  </li>
</ol>
</section>
<section class="content">
    <?php if($this->session->flashdata('success') || $this->session->flashdata('info') || $this->session->flashdata('error')) : ?>
        <?php if($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible">
                <button class="close" data-dismiss="alert">×</button>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('info')) : ?>
            <div class="alert alert-info alert-dismissible">
                <button class="close" data-dismiss="alert">×</button>
                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> User Privilege of <?php echo $ref_user['name']; ?></h3>
            <div class="box-tools">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <form id="frmEmp" action="user/privileges" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Inventory Menu</label>
                        <div class="col-sm-9">
                            <select name="inventory_menu">
                                <option value="0" <?php if($privilege): if($privilege['inventory_menu']==0): echo 'selected'; endif; endif;?>>No</option>
                                <option value="1" <?php if($privilege): if($privilege['inventory_menu']==1): echo 'selected'; endif;endif;?>>Yes</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Sales Section</label>
                        <div class="col-sm-9">
                            <select name="sales">
                                                <option value="0" <?php if($privilege){ if($privilege['sales']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['sales']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <?php if(count($privilege) > 0){ ?>
                            <input type="hidden" name="id" value="<?php echo $privilege['id']; ?>" />
                            <?php } ?>
                            <input type="hidden" name="ref_user" value="<?php echo $ref_user['id']; ?>" />
                            <input type="hidden" name="status" value="active" />
                            <div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Save Changes">
                                <button type="reset" class="btn">Cancel</button>
                            </div>
            </div>
        </form>
    </div>
</div>
</section>
