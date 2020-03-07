<section class="content-header">
    <h1>
        Currency
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="settings">Settings</a></li>
        <li class="active"><?php if(count($currency) > 0): ?>Edit <?php else : ?>Add New<?php endif; ?> Currency
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
            <form action="settings/currency_save"  id="frm1" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Country Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="fullname" id="fullname" value="<?php if(count($currency) > 0): echo $currency['fullname']; endif; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Short Form</label>
                        <div class="col-sm-9">
                            <input type="text" name="shortname" value="<?php if(count($currency) > 0): echo $currency['shortname']; endif; ?>" id="re_orderfield" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Symbol</label>
                        <div class="col-sm-9">
                            <input type="text" name="symbol" value="<?php if(count($currency) > 0) : echo $currency['symbol']; endif; ?>" id="re_orderfield" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Status</label>
                        <div class="col-sm-9">
                           <select name="status" id="status" class="form-control select2">
                            <option value="active" <?php if (count($currency) > 0 && $currency['status'] == 'Active') : echo 'selected'; endif; ?>>Active</option>
                            <option value="inactive" <?php if (count($currency) > 0 && $currency['status'] == 'Inactive') : echo 'selected'; endif;?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if(count($currency) > 0) : ?>
                    <input type="hidden" name="id" value="<?php echo $currency['id']; ?>">
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
