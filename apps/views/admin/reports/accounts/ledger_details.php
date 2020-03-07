<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <title>Ledger From: <?php echo $start_date; ?> To: <?php echo $end_date; ?></title>
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
                                <strong><?php if( isset($chart_name['name']) ) { echo $chart_name['name']; } else { echo 'Full Ledger'; } ?></strong>
                                <p><?php echo date('jS F Y ', strtotime(date_to_db($start_date))); ?> To <?php echo date('jS F Y ', strtotime(date_to_db($end_date))); ?></p>
                            </div>
                            <div class="invoice-table">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th class="span2">Journal Date</th>
                                            <th class="center span2">Journal No.</th>
                                            <th class="center span2">Name of A/C</th>
                                            <th>Transaction By/To</th>
                                            <th class="center">Debit</th>
                                            <th class="center">Credit</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $debit = 0;
                                    $credit = 0;
                                    foreach($previous as $pre){
                                        $debit += $pre['debit'];
                                        $credit += $pre['credit'];
                                    }
                                    //var_dump($previous);
                                    //echo $credit;
                                    if($opening_sum['opening'] > 0){
                                        $debit += $opening_sum['opening'];
                                    }else{
                                        $credit += abs( $opening_sum['opening'] );
                                    }
                                    //echo $credit;
                                    //var_dump($opening_sum);
                                    if($credit > 0){
                                        $opening = $debit - $credit;
                                    }else{
                                        $opening = $debit + $credit;
                                    }
                                    //$opening = $debit - $credit;
                                    //echo $opening;
                                    ?>
                                    <tbody>
                                        <tr style="font-size: 16px; font-weight: bold;">
                                            <td colspan="4">Balance Forwarded</td>
                                            <td colspan="2" class="right">
                                                <?php
                                                    if( $opening > 0 ){
                                                        echo number_format( $opening, 2 ) . ' Dr';
                                                    } else {
                                                        echo number_format( abs( $opening ), 2 ) . ' Cr';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php foreach ($charts as $chart){ ?>
                                        <tr>
                                            <td><?php echo date('jS M, Y ', strtotime($chart['journal_date'])); ?></td>
                                            <td class="center"><b><a href="accounts/journal_preview/<?php echo $chart['journal_id']; ?>" target="_blank"><?php echo $chart['journal_no']; ?></a></b></td>
                                            <td><?php echo $chart['chart_name']; ?></td>
                                            <td><?php echo $chart['ref_journal']; ?></td>
                                            <td class="right"><?php echo number_format($chart['debit'], 2); ?></td>
                                            <td class="right"><?php echo number_format($chart['credit'], 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="5"><?php echo $chart['master_memo']; ?></td>
                                        </tr>
                                        <?php
                                        $debit += $chart['debit'];
                                        $credit += $chart['credit'];
                                        ?>
                                        <?php } ?>
                                    </tbody>
                                    <?php
                                    if($credit > 0){
                                        $closing = $debit - $credit;
                                    } else {
                                        $closing = $debit + $credit;
                                    }
                                    ?>
                                    <tfoot>
                                        <tr style="font-size: 16px; font-weight: bold;">
                                            <td colspan="4"> Closing Balance</td>
                                            <td colspan="2" class="right">
                                            <?php
                                                if( $closing > 0 ){
                                                    echo number_format( $closing, 2 ) . ' Dr';
                                                } else {
                                                    echo number_format( abs( $closing ), 2 ) . ' Cr';
                                                }
                                            ?>
                                            </td>
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