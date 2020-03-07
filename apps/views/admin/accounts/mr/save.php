<section class="content-header">
    <h1> Money Receipt  </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="accounts">Accounts</a></li>
        <li class="active">
            <?php if (count($mr) > 0) : ?>Edit<?php  else : ?>Add New<?php endif; ?> Money Receipt
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
            <form name="sales" action="accounts/mr_save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Money Receipt No</label>
                        <div class="col-sm-9">
                            <input type="text" name="mr_no" id="mr_no" class="form-control" value="<?php if(count($mr) > 0) : echo $mr['mr_no']; else : echo $mr_no; endif; ?>" data-validate="{required: true, messages:{required:'Please enter field required'}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Money Receipt Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="mr_date" id="mr_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php if(count($mr) > 0) : echo $mr['mr_date'];  else : echo date('d/m/Y'); endif; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Customer</label>
                        <div class="col-sm-9">
                            <select name="customer_id" id="customer_id" class="form-control select2">
                                <?php foreach ($customers as $customer): ?>
                                    <option value="<?php echo $customer['id']; ?>" <?php if(count($mr) > 0) : if( $mr['customer_id'] == $customer['id'] ) : echo 'selected'; endif; endif; ?> > <?php echo $customer['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" name="amount" class="form-control" id="amount" value="<?php if(count($mr) > 0): echo $mr['amount']; endif; ?>" placeholder="00.00" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Payment Type</label>
                        <div class="col-sm-9">
                            <select name="payment_type" id="payment_type" class="form-control select2">
                                <option value="cash" <?php if( count($mr) > 0 ): if( $mr['payment_type'] == 'cash' ): echo 'selected'; endif; endif; ?>>Cash</option>
                                <option value="cheque" <?php if( count($mr) > 0 ): if( $mr['payment_type'] == 'cheque' ): echo 'selected'; endif; endif; ?>>Cheque
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Ref. Employee</label>
                        <div class="col-sm-9">
                            <select name="emp_id" id="emp_id" class="form-control select2">
                                <?php foreach ($emps as $emp): ?>
                                    <option value="<?php echo $emp['id']; ?>" <?php if( count($mr) > 0 ): if( $mr['emp_id'] == $emp['id'] ): echo 'selected'; endif; endif; ?>><?php echo $emp['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label pull-left">Memo</label>
                        <div class="col-sm-9">
                            <textarea name="memo" id="memo" placeholder="Memo" class="form-control"><?php if(count($mr) > 0): echo $mr['memo']; endif; ?></textarea>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <?php if(count($mr) > 0): ?>
                            <input type="hidden" name="id" value="<?php echo $mr['id']; ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                           <input type="submit" class="btn btn-info pull-right" value="Save changes" />
                       </div>
                   </div>
               </div>
           </form>
       </div>
   </div>
</section>