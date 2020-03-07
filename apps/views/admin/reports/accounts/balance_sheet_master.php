<section class="content-header">
    <h1>Report</h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="report">Report</a></li>
        <li class="active">
            Balance Sheet
        </li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">  Balance Sheet </h3>
            <div class="box-tools">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="box-body">
            <form name="sales" action="report/balance_sheet" method="post" class="form-horizontal" target="_blank" id="frm1">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Closing Date</label>
                        <div class="col-sm-9">
                           <div class="col-sm-9">
                            <input type="text"  name="closing_date" id="closing_date" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?php echo date('01-m-Y'); ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <div class="form-group pull-right">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-success">Show Report</button>
                      <button type="reset" class="btn">Cancel</button>
                  </div>
              </div>

          </div>

      </form>
  </div>
</div>
</section>