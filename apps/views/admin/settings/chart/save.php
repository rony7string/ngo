<section class="content-header">
    <h1>
        A/C Head
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="dashboard">Dashboard</a></li>
        <li class="active"><a href="settings">Settings</a></li>
        <li class="active"><?php if (count($chart) > 0) : ?>Edit<?php  else : ?>Add New<?php endif; ?> Default A/C Head
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
            <form action="settings/chart_save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Under A/C of</label>
                        <div class="col-sm-9">
                            <select name="parent_id" id="parent_id" class="form-control select2">
                                <option value="">Root</option>
                                <?php echo $ac_chart_tree; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Class</label>
                        <div class="col-sm-9">
                           <select name="type" id="parent_id" class="form-control select2">
                            <option value="">Default</option>
                            <option value="Receivable" <?php if(count($chart) > 0 && $chart['type'] == 'Receivable'): echo 'selected'; endif; ?>>Receivable</option>
                            <option value="Payable" <?php if(count($chart) > 0 && $chart['type'] == 'Payable'): echo 'selected'; endif; ?>>Payable</option>
                            <option value="Cash" <?php if(count($chart) > 0 && $chart['type'] == 'Cash'): echo 'selected'; endif; ?>>Cash</option>
                            <option value="Bank" <?php if(count($chart) > 0 && $chart['type'] == 'Bank'): echo 'selected'; endif; ?>>Bank</option>
                            <option value="Sales" <?php if(count($chart) > 0 && $chart['type'] == 'Sales'): echo 'selected'; endif; ?>>Sales</option>
                            <option value="Purchase" <?php if(count($chart) > 0 && $chart['type'] == 'Purchase'): echo 'selected'; endif; ?>>Purchase</option>
                            <option value="Inventory" <?php if(count($chart) > 0 && $chart['type'] == 'Inventory'): echo 'selected'; endif; ?>>Inventory</option>
                            <option value="COGS" <?php if(count($chart) > 0 && $chart['type'] == 'COGS'): echo 'selected'; endif; ?>>Cost of Goods Sold</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">A/C Code</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="code" placeholder="Enter A/C Code ..." value="<?php if (count($chart) > 0) : echo $chart['code'];endif; ?>" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Memo</label>
                    <div class="col-sm-9">
                        <textarea id="notes" name="memo" class="form-control" placeholder="Enter Memo..."><?php if (count($chart) > 0) : echo $chart['memo'];endif;?></textarea>
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if (count($chart) > 0) : ?>
                    <input type="hidden" name="id" value="<?php echo $chart['id']; ?>" />
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" name="submit" class="btn btn-success pull-right" value="Save changes"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
