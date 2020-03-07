<section class="content-header">
    <h1>
        Basic
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="settings">Settings</a></li>
    </li>
</ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Basic Settings</h3>
            <div class="box-tools">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <form action="settings/basic" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Loaner on A/C Head</label>
                        <div class="col-sm-9">
                            <select name="ac_receivable" id="ac_receivable" class="form-control select2">
                               <option value="">Root</option>
                               <?php echo $receivable_tree; ?>
                           </select>
                       </div>
                   </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label pull-left">Depositor on A/C Head</label>
                    <div class="col-sm-9">
                        <select name="ac_payable" id="ac_payable" class="form-control select2">
                            <option value="">Root</option>
                            <?php echo $payable_tree; ?>
                        </select>
                    </div>
                    </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label pull-left">Cash Book A/C Head</label>
                    <div class="col-sm-9">
                        <select name="ac_cash" id="ac_cash" class="form-control select2">
                            <option value="">Root</option>
                            <?php echo $cash_tree; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label pull-left">Bank Book A/C Head</label>
                    <div class="col-sm-9">
                        <select name="ac_bank" id="ac_bank" class="form-control select2">
                            <option value="">Root</option>
                            <?php echo $bank_tree; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label pull-left">Income</label>
                    <div class="col-sm-9">
                        <select name="income" id="income" class="form-control select2">
                            <option value="">Root</option>
                            <?php echo $income; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label pull-left">Expenses</label>
                    <div class="col-sm-9">
                        <select name="expenses" id="expenses" class="form-control select2">
                           <option value="">Root</option>
                           <?php echo $expenses; ?>
                       </select>
                   </div>
               </div>


               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
               <?php if(count($settings) > 0): ?>
                <input type="hidden" name="id" value="<?php echo $settings['id']; ?>">
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
