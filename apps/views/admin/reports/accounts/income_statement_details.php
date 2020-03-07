<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <title>Balance Sheet From: <?php echo $start_date; ?> To: <?php echo $end_date; ?></title>
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
                                <strong>Income Statement</strong>
                                <p><?php echo date('jS F Y ', strtotime(date_to_db($start_date))); ?> To <?php echo date('jS F Y ', strtotime(date_to_db($end_date))); ?></p>
                            </div>

                            <div class="invoice-table">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="left">Reveniue</th>
                                        </tr>
                                        <tr>
                                            <th>Name of A/C</th>
                                            <th class="center span3">Debit</th>
                                            <th class="center span3">Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $debit = 0;
                                        $credit = 0;
                                        foreach ($reveniues as $reveniue):
                                            ?>
                                        <tr>
                                            <td><?php echo $reveniue['chart_name']; ?></td>
                                            <td class="right"><?php echo number_format($reveniue['debit'], 2); ?></td>
                                            <td class="right"><?php echo number_format($reveniue['credit'], 2); ?></td>
                                        </tr>
                                        <?php
                                        $debit += $reveniue['debit'];
                                        $credit += $reveniue['credit'];
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Gross Total</b></td>
                                            <td class="right"><b><?php echo number_format($debit, 2); ?></b></td>
                                            <td class="right"><b><?php echo number_format($credit, 2); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Net Balance</b></td>
                                            <td colspan="2"><?php echo number_format(($debit - $credit), 2); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="invoice-table">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="left">Expense</th>
                                        </tr>
                                        <tr>
                                            <th>Name of A/C</th>
                                            <th class="center span3">Debit</th>
                                            <th class="center span3">Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $debit = 0;
                                        $credit = 0;
                                        foreach ($expenses as $expense):
                                            ?>
                                        <tr>
                                            <td><?php echo $expense['chart_name']; ?></td>
                                            <td class="right"><?php echo number_format($expense['debit'], 2); ?></td>
                                            <td class="right"><?php echo number_format($expense['credit'], 2); ?></td>
                                        </tr>
                                        <?php
                                        $debit += $expense['debit'];
                                        $credit += $expense['credit'];
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Gross Total</b></td>
                                            <td class="right"><b><?php echo number_format($debit, 2); ?></b></td>
                                            <td class="right"><b><?php echo number_format($credit, 2); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Net Balance</b></td>
                                            <td colspan="2"><?php echo number_format(($debit - $credit), 2); ?></td>
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