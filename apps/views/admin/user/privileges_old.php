<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					User
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard">Dashboard</a>
						<span class="divider">/</span>
					</li>
					<li>
						<a href="user">User</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						Privilege
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->

        <!-- BEGIN Alert widget-->
        <?php if($this->session->flashdata('success') || $this->session->flashdata('info') || $this->session->flashdata('error')) { ?>
        <div class="row-fluid">
            <div class="span12">
                <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('info')) { ?>
                <div class="alert alert-info">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <!-- END Alert widget-->

		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="widget blue">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> User Privilege of <?php echo $ref_user['name']; ?> </h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
							<a href="javascript:;" class="icon-remove"></a>
						</span>
					</div>
                    <?php //var_dump($privilege); ?>
					<div class="widget-body">
						<!-- BEGIN FORM-->
						<form action="user/privileges" method="post" class="form-horizontal form-bordered form-validate" id="frm1">
                            <div class="row-fluid" style="border-bottom: 1px solid;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="inventory_menu" class="control-label">Inventory Menu</label>
                                        <div class="controls">
                                            <select name="inventory_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['inventory_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['inventory_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sales" class="control-label">Sales Section</label>
                                        <div class="controls">
                                            <select name="sales">
                                                <option value="0" <?php if($privilege){ if($privilege['sales']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['sales']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sales_return" class="control-label">Sales Return Section</label>
                                        <div class="controls">
                                            <select name="sales_return">
                                                <option value="0" <?php if($privilege){ if($privilege['sales_return']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['sales_return']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="purchase" class="control-label">Purchase Section</label>
                                        <div class="controls">
                                            <select name="purchase">
                                                <option value="0" <?php if($privilege){ if($privilege['purchase']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['purchase']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="purchase_return" class="control-label">Purchase Return Section</label>
                                        <div class="controls">
                                            <select name="purchase_return">
                                                <option value="0" <?php if($privilege){ if($privilege['purchase_return']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['purchase_return']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="customer" class="control-label">Customer Section</label>
                                        <div class="controls">
                                            <select name="customer">
                                                <option value="0" <?php if($privilege){ if($privilege['customer']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['customer']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="supplier" class="control-label">Supplier Supplier</label>
                                        <div class="controls">
                                            <select name="supplier">
                                                <option value="0" <?php if($privilege){ if($privilege['supplier']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['supplier']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="item" class="control-label">Item Section</label>
                                        <div class="controls">
                                            <select name="item">
                                                <option value="0" <?php if($privilege){ if($privilege['item']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['item']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid" style="border-bottom: 1px solid; margin-top: 10px;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="accounts_menu" class="control-label">Accounts Menu</label>
                                        <div class="controls">
                                            <select name="accounts_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['accounts_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['accounts_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="journal" class="control-label">Journal Section</label>
                                        <div class="controls">
                                            <select name="journal">
                                                <option value="0" <?php if($privilege){ if($privilege['journal']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['journal']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="money_receipt" class="control-label">Money Receipt Section</label>
                                        <div class="controls">
                                            <select name="money_receipt">
                                                <option value="0" <?php if($privilege){ if($privilege['money_receipt']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['money_receipt']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="ac_head" class="control-label">A/C Head Section</label>
                                        <div class="controls">
                                            <select name="ac_head">
                                                <option value="0" <?php if($privilege){ if($privilege['ac_head']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['ac_head']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="payment_receipt" class="control-label">Payment Receipt Section</label>
                                        <div class="controls">
                                            <select name="payment_receipt">
                                                <option value="0" <?php if($privilege){ if($privilege['payment_receipt']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['payment_receipt']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row-fluid" style="border-bottom: 1px solid; margin-top: 10px;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="hr_menu" class="control-label">HR Menu</label>
                                        <div class="controls">
                                            <select name="hr_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['hr_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['hr_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="employee" class="control-label">Employee Section</label>
                                        <div class="controls">
                                            <select name="employee">
                                                <option value="0" <?php if($privilege){ if($privilege['employee']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['employee']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid" style="border-bottom: 1px solid; margin-top: 10px;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="report_menu" class="control-label">Report Menu</label>
                                        <div class="controls">
                                            <select name="report_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['report_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['report_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sales_report" class="control-label">Sales Report</label>
                                        <div class="controls">
                                            <select name="sales_report">
                                                <option value="0" <?php if($privilege){ if($privilege['sales_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['sales_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sales_return_report" class="control-label">Sales Return Report</label>
                                        <div class="controls">
                                            <select name="sales_return_report">
                                                <option value="0" <?php if($privilege){ if($privilege['sales_return_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['sales_return_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="ledger_report" class="control-label">Ledger Report</label>
                                        <div class="controls">
                                            <select name="ledger_report">
                                                <option value="0" <?php if($privilege){ if($privilege['ledger_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['ledger_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="balance_sheet_report" class="control-label">Balance Sheet Report</label>
                                        <div class="controls">
                                            <select name="balance_sheet_report">
                                                <option value="0" <?php if($privilege){ if($privilege['balance_sheet_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['balance_sheet_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bills_receivable_report" class="control-label">Bills Receivable Report</label>
                                        <div class="controls">
                                            <select name="bills_receivable_report">
                                                <option value="0" <?php if($privilege){ if($privilege['bills_receivable_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['bills_receivable_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cash_book_report" class="control-label">Cash Book Report</label>
                                        <div class="controls">
                                            <select name="cash_book_report">
                                                <option value="0" <?php if($privilege){ if($privilege['cash_book_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['cash_book_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="purchase_report" class="control-label">Purchase Report</label>
                                        <div class="controls">
                                            <select name="purchase_report">
                                                <option value="0" <?php if($privilege){ if($privilege['purchase_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['purchase_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="purchase_return_report" class="control-label">Purchase Return Report</label>
                                        <div class="controls">
                                            <select name="purchase_return_report">
                                                <option value="0" <?php if($privilege){ if($privilege['purchase_return_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['purchase_return_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inventory_report" class="control-label">Inventory Report</label>
                                        <div class="controls">
                                            <select name="inventory_report">
                                                <option value="0" <?php if($privilege){ if($privilege['inventory_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['inventory_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="trial_balance_report" class="control-label">Trial Balance Report</label>
                                        <div class="controls">
                                            <select name="trial_balance_report">
                                                <option value="0" <?php if($privilege){ if($privilege['trial_balance_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['trial_balance_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="income_statement_report" class="control-label">Income Statement Report</label>
                                        <div class="controls">
                                            <select name="income_statement_report">
                                                <option value="0" <?php if($privilege){ if($privilege['income_statement_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['income_statement_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bills_payable_report" class="control-label">Bills Payable Report</label>
                                        <div class="controls">
                                            <select name="bills_payable_report">
                                                <option value="0" <?php if($privilege){ if($privilege['bills_payable_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['bills_payable_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="bank_book_report" class="control-label">Bank Book Report</label>
                                        <div class="controls">
                                            <select name="bank_book_report">
                                                <option value="0" <?php if($privilege){ if($privilege['bank_book_report']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['bank_book_report']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid" style="border-bottom: 1px solid; margin-top: 10px;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="settings_menu" class="control-label">Settings Menu</label>
                                        <div class="controls">
                                            <select name="settings_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['settings_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['settings_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="company_settings" class="control-label">Company Section</label>
                                        <div class="controls">
                                            <select name="company_settings">
                                                <option value="0" <?php if($privilege){ if($privilege['company_settings']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['company_settings']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="basic_settings" class="control-label">Basic Settings</label>
                                        <div class="controls">
                                            <select name="basic_settings">
                                                <option value="0" <?php if($privilege){ if($privilege['basic_settings']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['basic_settings']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="default_ac_head_settings" class="control-label">Default A/C Head Section</label>
                                        <div class="controls">
                                            <select name="default_ac_head_settings">
                                                <option value="0" <?php if($privilege){ if($privilege['default_ac_head_settings']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['default_ac_head_settings']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid" style="margin-top: 10px;">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="user_menu" class="control-label">User Menu</label>
                                        <div class="controls">
                                            <select name="user_menu">
                                                <option value="0" <?php if($privilege){ if($privilege['user_menu']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['user_menu']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="user_section" class="control-label">User Section</label>
                                        <div class="controls">
                                            <select name="user_section">
                                                <option value="0" <?php if($privilege){ if($privilege['user_section']==0){ echo 'selected'; } }?>>No</option>
                                                <option value="1" <?php if($privilege){ if($privilege['user_section']==1){ echo 'selected'; } }?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>

        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>