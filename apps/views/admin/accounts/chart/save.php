<section class="content-header">
    <h1>
        A/C Head
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="accounts">Accounts</a></li>
        <li class="active">
            <?php if (count($chart) > 0) : ?>Edit<?php else : ?>Add New<?php endif; ?> A/C Head
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
            <form  action="accounts/chart_save" method="post" class="form-horizontal">
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
                        <label class="col-sm-3 control-label">A/C Code</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" class="form-control" name="code" placeholder="Enter A/C Code ..." value="<?php if (count($chart) > 0) : echo $chart['code']; endif; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">A/C Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="date01" class="form-control" name="name" placeholder="Enter A/C Name ..."  value="<?php if (count($chart) > 0) : echo $chart['name']; endif; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Memo</label>
                    <div class="col-sm-9">
                        <textarea id="notes" name="memo" class="form-control" placeholder="Enter Memo..." ><?php if (count($chart) > 0) : echo $chart['memo']; endif; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Opening Balance</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" class="form-control" name="opening" placeholder="Enter Opening Balance ..." value="<?php if (count($chart) > 0) : echo $chart['opening']; endif; ?>" />
                    </div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if (count($chart) > 0) : ?>
                    <input type="hidden" name="id" value="<?php echo $chart['id']; ?>" />
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-6 pull-right">
                        <input type="submit" name="submit" class="btn btn-info pull-right" value="Save changes" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
