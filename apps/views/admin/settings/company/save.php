<section class="content-header">
    <h1>
        Company
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="settings">Settings</a></li>
        <li class="active"><?php if(count($company) > 0) : ?>Edit <?php else : ?> Add New <?php endif; ?> Company
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
            <form action="settings/cmp_save" id="frm1" enctype="multipart/form-data" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Company Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name" value="<?php if(count($company) > 0): echo $company['name']; endif; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Currency</label>
                        <div class="col-sm-9">
                            <select name="currency_id" id="currency_id"  class="form-control">
                                <?php foreach($currencies as $currency) : ?> <option value="<?php echo $currency['id']; ?>" <?php if (count($company) > 0 && $company['currency_id'] == $currency['id']) : echo 'selected'; endif;?>><?php echo $currency['fullname'] . ' - ( ' . $currency['symbol'] . ' )'; ?></option>          <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Symbol Position</label>
                        <div class="col-sm-9">
                            <select name="currency_symbol_position" id="currency_symbol_position"  class="form-control">
                                <option value="Before" <?php if (count($company) > 0 && $company['currency_symbol_position'] == 'Before') : echo 'selected'; endif;?>>Before</option>
                                <option value="After" <?php if (count($company) > 0 && $company['currency_symbol_position'] == 'After') : echo 'selected'; endif;?>>After</option>
                            </select>
                        </div>
                    </div>
                    <?php if(count($company) > 0 && $company['logo'] != '') : ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Current Logo</label>
                            <div class="col-sm-9"  class="form-control">
                                <img src="uploads/companies/<?php echo $company['logo']; ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" id="description"  class="form-control" ><?php if(count($company) > 0): echo $company['address']; endif; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Area</label>
                        <div class="col-sm-9">
                            <input type="text" name="area" value="<?php if(count($company) > 0): echo $company['area']; endif; ?>" id="re_orderfield" data-rule-required="true" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                            <input type="text" name="city" value="<?php if(count($company) > 0) : echo $company['city']; endif; ?>" id="re_orderfield" data-rule-required="true"  class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Zip</label>
                        <div class="col-sm-9">
                            <input type="text" name="zip" value="<?php if(count($company) > 0): echo $company['zip']; endif; ?>" id="re_orderfield" data-rule-required="true"  class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                            <input type="text" name="country" value="<?php if(count($company) > 0): echo $company['country']; endif; ?>" id="re_orderfield" data-rule-required="true"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" value="<?php if(count($company) > 0) : echo $company['phone']; endif; ?>" id="re_orderfield" data-rule-required="true"  class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person</label>
                        <div class="col-sm-9">
                         <input type="text" name="contact_person" value="<?php if(count($company) > 0) : echo $company['contact_person']; endif; ?>" id="purchasefield" data-rule-required="true"  class="form-control"/>
                     </div>
                 </div>

                 <div class="form-group">
                     <label class="col-sm-3 control-label">Contact Number</label>
                     <div class="col-sm-9">
                        <input type="text" name="mobile_no" value="<?php if(count($company) > 0): echo $company['mobile_no']; endif; ?>" id="purchasefield" data-rule-required="true"  class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="<?php if(count($company) > 0) : echo $company['email']; endif; ?>" id="salefield" data-rule-required="true"  class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" id="salefield" data-rule-required="true"  class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Select Status</label>
                    <div class="col-sm-9">
                        <select name="status" id="status"  class="form-control">
                            <option value="Active" <?php if (count($company) > 0 && $company['status'] == 'Active') : echo 'selected'; endif; ?>>Active</option>
                            <option value="Inactive" <?php if (count($company) > 0 && $company['status'] == 'Inactive') : echo 'selected'; endif;?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if(count($company) > 0): ?>
                    <input type="hidden" name="id" value="<?php echo $company['id']; ?>" />
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
