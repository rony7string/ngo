<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/head'); ?>
</head>
<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"> <img src="<?php echo $this->session->userdata('company_logo'); ?>"></i><?php echo $this->session->userdata('company_name'); ?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-xs-12">
          <h4>Journal # <?php echo $master['journal_no']; ?></h4>
          <h4>Date : <?php echo date('jS F Y ', strtotime($master['journal_date'])); ?></h4>
          <h4>Narration : <?php echo $master['memo']; ?></h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
         <?php
         $d = 0;
         $c = 0;
         foreach ($details as $list) :
         if ($list['debit']) :
         $d++;
         else :
         $c++;
         endif;
         endforeach;
         ?>
         <div class="row">
           <div class="col-xs-5 pull-left">
            <div id="debit_details">
              <table class="table table-bordered table-striped responsive">
                <thead>
                  <tr>
                    <th class="center">Debit A/C Head</th>
                    <th class="center">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $debit_amount = 0;
                  foreach ($details as $list):
                  if ($list['debit']) :
                  ?>
                  <tr>
                    <td><?php echo $list['chart_name']; ?></td>
                    <td class="right"><?php echo number_format($list['debit'], 2); ?></td>
                  </tr>
                  <?php
                  $debit_amount += $list['debit'];
                  endif;
                  endforeach ;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-xs-2">
            &nbsp;
          </div>
          <div class="col-xs-5 pull-left">
            <div id="credit_details">
              <table class="table table-bordered table-striped responsive">
                <thead>
                  <tr>
                    <th class="center">Credit A/C Head</th>
                    <th class="center">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $credit_amount = 0;
                  foreach ($details as $list) :
                  if ($list['credit']) :
                  ?>
                  <tr>
                    <td><?php echo $list['chart_name']; ?></td>
                    <td class="right"><?php echo number_format($list['credit'], 2); ?></td>
                  </tr>
                  <?php
                  $credit_amount += $list['credit'];
                  endif;
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-5 pull-left">
            <div id="debit_details">
              <table class="table table-bordered table-striped responsive">
                <thead>
                  <tr>
                    <th class="center">Total</th>
                    <th class="right"><?php echo number_format($debit_amount, 2); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <div class="col-xs-2">
            &nbsp;
          </div>
          <div class="col-xs-5 pull-left">
            <div id="credit_details">
              <table class="table table-bordered table-striped responsive">
                <thead>
                  <tr>
                    <th class="center">Total</th>
                    <th class="right"><?php echo number_format($credit_amount, 2); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <a onclick="javascript:window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      </div>
    </div>
  </section>
  <section class="footer">
    <div class="col-xs-12">
     <?php $this->load->view('admin/footer'); ?>
   </div>
 </section>
 <!-- /.content -->

</div>
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<?php $this->load->view('admin/js'); ?>
<!-- ./wrapper -->
</body>
</html>
