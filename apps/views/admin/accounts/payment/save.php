<section class="content-header">
    <h1> Payment Receipt </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="accounts">Accounts</a></li>
        <li class="active">
          <?php if (count($payment) > 0) { ?>Edit<?php } else { ?>Add New<?php } ?> Payment Receipt
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
            <form name="sales" action="accounts/payment_save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Payment Receipt No</label>
                        <div class="col-sm-9">
                           <input type="text" name="payment_no" id="payment_no" class="form-control" value="<?php if(count($payment) > 0){ echo $payment['payment_no']; }else{ echo $payment_no; } ?>" />
                       </div>
                   </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Payment Receipt Date</label>
                    <div class="col-sm-9">
                        <input type="text"  name="payment_date" class="form-control" id="payment_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php if(count($payment) > 0): $payment['payment_date'];  else : echo date('d/m/Y'); endif; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Select Supplier</label>
                    <div class="col-sm-9">
                        <select name="supplier_id" id="supplier_id" class="form-control select2">
                           <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?php echo $supplier['id']; ?>" <?php if( count($payment) > 0 ): if( $payment['supplier_id'] == $supplier['id'] ): echo 'selected'; endif; endif; ?>><?php echo $supplier['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                <label  class="col-sm-3 control-label">Amount</label>
                <div class="col-sm-9">
                    <input type="text" name="amount" id="amount" class="form-control" value="<?php if(count($payment) > 0): echo $payment['amount']; endif; ?>" placeholder="00.00" />
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">Payment Type</label>
                <div class="col-sm-9">
                    <select name="payment_type" id="payment_type" class="form-control select2">
                        <option value="cash" <?php if( count($payment) > 0 ){ if( $payment['payment_type'] == 'cash' ){ echo 'selected'; } } ?>>Cash</option>
                        <option value="cheque" <?php if( count($payment) > 0 ){ if( $payment['payment_type'] == 'cheque' ){ echo 'selected'; } } ?>>Cheque</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label">Ref. Employee</label>
                <div class="col-sm-9">
                    <select name="emp_id" id="emp_id" class="form-control select2">
                        <?php foreach ($emps as $emp): ?>
                            <option value="<?php echo $emp['id']; ?>" <?php if( count($payment) > 0 ): if( $payment['emp_id'] == $emp['id'] ): echo 'selected'; endif; endif; ?>><?php echo $emp['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-3 control-label pull-left">Memo</label>
                <div class="col-sm-9">
                    <textarea name="memo" id="memo" placeholder="Memo" class="form-control">
                        <?php if(count($payment) > 0): echo $payment['memo']; endif; ?>
                    </textarea>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if(count($payment) > 0): ?>
                    <input type="hidden" name="id" value="<?php echo $payment['id']; ?>" />
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