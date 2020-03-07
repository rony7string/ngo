<section class="content-header">
    <h1>
        Loan Package
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="loan">Loan</a></li>
        <li class="active"><?php if (count($loan) > 0) : ?>Edit<?php else : ?>Add New<?php endif; ?> loanloyee
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
            <form id="frmloan" action="loan/loan_save" method="post" class="form-horizontal">
                <div class="col-lg-6 col-xs-1">
                    <div class="form-group">
                        <label class="col-sm-3 control-label pull-left">Package Name</label>
                        <div class="col-sm-9">
                            <input name="package_name" value="<?php if(count($loan) > 0): echo $loan['package_name']; endif; ?>" id="package_name" type="text" placeholder="Package Name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loan Amount</label>
                        <div class="col-sm-9">
                            <input name="loan_amount" value="<?php if(count($loan) > 0): echo $loan['loan_amount']; endif; ?>" id="loan_amount" type="text" placeholder="Loan Amount" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loan Interest</label>
                        <div class="col-sm-9">
                            <input type="text" name="loan_interest" id="loan_interest" placeholder="Loan Interest" value="<?php if(count($loan) > 0): echo $loan['loan_interest']; endif; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Number of Installmant</label>
                        <div class="col-sm-9">
                           <input type="text" name="num_of_installmant" id="num_of_installmant" class="form-control" placeholder="Number of Installmant" value="<?php if(count($loan) > 0): echo $loan['num_of_installmant']; endif; ?>" >
                       </div>
                   </div>
                   <div class="form-group">
                    <label  class="col-sm-3 control-label">Per Installmant Amount</label>
                    <div class="col-sm-9">
                       <input type="text" name="per_installmant_amount" id="per_installmant_amount" class="form-control" placeholder="Per Installmant Amount" value="<?php if(count($loan) > 0): echo $loan['per_installmant_amount']; endif; ?>" >
                   </div>
                    </div>
                   
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <?php if(count($loan) > 0) : ?>
                   <input type="hidden" name="id" value="<?php echo $loan['id']; ?>" />
               <?php endif; ?>
               <div class="form-group">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-info pull-right"  value="Save"/>
                </div>
            </div>

        </div>

    </form>
</div>
</div>
</section>
