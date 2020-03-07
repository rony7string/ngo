<section class="content-header">
    <h1>
        Staff
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="hr">H R</a></li>
        <li class="active"><?php if (count($emp) > 0) : ?>Edit<?php else : ?>Add New<?php endif; ?> Employee
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
            <form id="frmEmp" action="hr/emp_save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Employee Name</label>
                        <div class="col-sm-9">
                            <input name="name" value="<?php if(count($emp) > 0): echo $emp['name']; endif; ?>" id="name" type="text" placeholder="Employee Name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input name="father_name" value="<?php if(count($emp) > 0): echo $emp['father_name']; endif; ?>" id="father_name" type="text" placeholder="Father's Name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="mother_name" id="mother_name" placeholder="Mother's Name" value="<?php if(count($emp) > 0): echo $emp['mother_name']; endif; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Present Address</label>
                        <div class="col-sm-9">
                            <textarea name="present_address" id="present_address" class="form-control" placeholder="Present Address" ><?php if(count($emp) > 0): echo $emp['present_address']; endif; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"> Permanent Address</label>
                        <div class="col-sm-9">
                            <textarea name="permanent_address" id="permanent_address" class="form-control"  placeholder="Permanent Address"><?php if(count($emp) > 0): echo $emp['permanent_address']; endif; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Designation</label>
                    <div class="col-sm-9">
                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" value="<?php if(count($emp) > 0): echo $emp['designation']; endif; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Department</label>
                    <div class="col-sm-9">
                        <input type="text" name="department" id="department" class="form-control" placeholder="Department" value="<?php if(count($emp) > 0): echo $emp['department']; endif; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date of Join</label>
                    <div class="col-sm-9">
                        <input type="text"  name="joining" id="joining" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php if(count($emp) > 0) : echo date_to_ui($emp['joining']);  else : echo date('d/m/Y'); endif; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" id="mobile" value="<?php if(count($emp) > 0): echo $emp['mobile']; endif; ?>" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" placeholder="Email" id="email" value="<?php if(count($emp) > 0): echo $emp['email']; endif; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label pull-left">Notes</label>
                    <div class="col-sm-9">
                        <textarea name="notes" class="form-control" id="notes" placeholder="Customer Notes"><?php if(count($emp) > 0): echo $emp['notes']; endif; ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if(count($emp) > 0) : ?>
                   <input type="hidden" name="id" value="<?php echo $emp['id']; ?>" />
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
