<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <title>Trial Balance From: <?php echo $start_date; ?> To: <?php echo $end_date; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tapan Kumer Das : InnovativeBD">
    <link rel="shortcut icon" href="assets/backend/img/favicon.ico" type="image/x-icon" />

    <!-- styles -->
    <link href="assets/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/backend/css/stilearn.css" rel="stylesheet" />
    <style>
      @media print{
        p.muted{
            font-weight: bold;
        }
        small.small{
          font-weight: normal;
      }
  }
</style>
</head>

<body>
    <!-- section content -->
    <section class="section">
        <div class="container">
            <!-- span content -->
            <div class="span12">
                <!-- content -->
                <div class="content" style="border: 1px solid #d7d7d7;">
                    <!-- content-body -->
                    <div class="content-body">
                        <!-- invoice -->
                        <div id="invoice-container" class="invoice-container">
                            <div class="page-header">
                                <div class="pull-right">
                                    <img src="<?php echo $this->session->userdata('company_logo'); ?>" width="115" class="img">
                                </div>
                                <h3 class="left"><?php echo $this->session->userdata('company_name'); ?></h3>
                            </div>
                            <div class="row-fluid center">
                                <strong>Trial Balance</strong>
                                <p><?php echo date('jS F Y ', strtotime(date_to_db($start_date))); ?> To <?php echo date('jS F Y ', strtotime(date_to_db($end_date))); ?></p>
                            </div>
                            <div class="invoice-table">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th>Name of A/C</th>
                                            <th class="center">Debit</th>
                                            <th class="center">Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $debit = 0;
                                      $credit = 0;
                                      foreach ($trial_balance as $balance):
                                        ?>
                                    <tr>
                                        <td><?php echo $balance['chart_name']; ?></td>
                                        <td class="right"><?php echo number_format($balance['total_debit'], 2); ?></td>
                                        <td class="right"><?php echo number_format($balance['total_credit'], 2); ?></td>
                                    </tr>
                                    <?php
                                    $debit += $balance['total_debit'];
                                    $credit += $balance['total_credit'];
                                    endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td class="right"><b><?php echo number_format($debit, 2); ?></b></td>
                                        <td class="right"><b><?php echo number_format($credit, 2); ?></b></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!--/invoice-->
                </div><!--/content-body -->
            </div><!-- /content -->
        </div><!-- /span content -->

    </div><!-- /container -->
</section>

</body>
</html>