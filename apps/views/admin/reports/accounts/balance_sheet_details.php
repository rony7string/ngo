<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <title>Balance Sheet Closing at <?php echo $closing_date; ?></title>
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
<link href="assets/plugin/treetable/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
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
                                <strong>Balance Sheet</strong>
                                <p>Closing at <?php echo date('jS F Y ', strtotime(date_to_db($closing_date))); ?></p>
                            </div>
                            <div class="invoice-table">
                                <table id="treetable1" class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="left">Assets</th>
                                        </tr>
                                        <tr>
                                            <th>Name of A/C</th>
                                            <th class="center span2">Debit</th>
                                            <th class="center span2">Credit</th>
                                            <th class="center span2">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $net = 0;
                                        $balance = 0;
                                        $debit = 0;
                                        $credit = 0;
                                        foreach ($assets as $a1) {
                                            //print_r($a1);
                                            $aa[] = $a1;
                                            $debit = sum_subarrays_by_key($aa, "debit");
                                            $credit = sum_subarrays_by_key($aa, "credit");
                                            $balance = $debit - $credit;
                                            $net += $balance;
                                            if($balance > 0){
                                                $pre = 'Dr';
                                            } elseif($balance == 0) {
                                                $pre = ' ';
                                            }else{
                                                $pre = 'Cr';
                                            }
                                            ?>
                                            <tr data-tt-id="<?php echo $a1['id']; ?>">
                                                <td><?php echo $a1['name']; ?></td>
                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                            </tr>
                                            <?php
                                            $balance = 0;
                                            $debit = 0;
                                            $credit = 0;
                                            unset($aa);
                                            if (isset($a1['child'])) {
                                                foreach ($a1['child'] as $a2) {
                                                    $bb[] = $a2;
                                                    $debit = sum_subarrays_by_key($bb, "debit");
                                                    $credit = sum_subarrays_by_key($bb, "credit");
                                                    $balance = $debit - $credit;
                                                    if($balance > 0){
                                                        $pre = 'Dr';
                                                    } elseif($balance == 0) {
                                                        $pre = ' ';
                                                    }else{
                                                        $pre = 'Cr';
                                                    }
                                                    ?>
                                                    <tr data-tt-id="<?php echo $a2['id']; ?>" data-tt-parent-id="<?php echo $a1['id']; ?>">
                                                        <td><?php echo $a2['name']; ?></td>
                                                        <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                        <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                        <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                    </tr>
                                                    <?php
                                                    $balance = 0;
                                                    $debit = 0;
                                                    $credit = 0;
                                                    unset($bb);
                                                    if (isset($a2['child'])) {
                                                        foreach ($a2['child'] as $a3) {
                                                            $cc[] = $a3;
                                                            $debit = sum_subarrays_by_key($cc, "debit");
                                                            $credit = sum_subarrays_by_key($cc, "credit");
                                                            $balance = $debit - $credit;
                                                            if($balance > 0){
                                                                $pre = 'Dr';
                                                            }elseif($balance == 0){
                                                                $pre = ' ';
                                                            }else{
                                                                $pre = 'Cr';
                                                            }
                                                            ?>
                                                            <tr data-tt-id="<?php echo $a3['id']; ?>" data-tt-parent-id="<?php echo $a2['id']; ?>">
                                                                <td><?php echo $a3['name']; ?></td>
                                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                            </tr>
                                                            <?php
                                                            $balance = 0;
                                                            $debit = 0;
                                                            $credit = 0;
                                                            unset($cc);
                                                            if (isset($a3['child'])) {
                                                                foreach ($a3['child'] as $a4) {
                                                                    $dd[] = $a4;
                                                                    $debit = sum_subarrays_by_key($dd, "debit");
                                                                    $credit = sum_subarrays_by_key($dd, "credit");
                                                                    $balance = $debit - $credit;
                                                                    if($balance > 0){
                                                                        $pre = 'Dr';
                                                                    } elseif($balance == 0) {
                                                                        $pre = ' ';
                                                                    } else {
                                                                        $pre = 'Cr';
                                                                    }
                                                                    ?>
                                                                    <tr data-tt-id="<?php echo $a4['id']; ?>" data-tt-parent-id="<?php echo $a3['id']; ?>">
                                                                        <td><?php echo $a4['name']; ?></td>
                                                                        <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                        <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                        <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $balance = 0;
                                                                    $debit = 0;
                                                                    $credit = 0;
                                                                    unset($dd);
                                                                    if (isset($a4['child'])) {
                                                                        foreach ($a4['child'] as $a5) {
                                                                            $ee[] = $a5;
                                                                            $debit = sum_subarrays_by_key($ee, "debit");
                                                                            $credit = sum_subarrays_by_key($ee, "credit");
                                                                            $balance = $debit - $credit;
                                                                            if($balance > 0){
                                                                                $pre = 'Dr';
                                                                            } elseif($balance == 0) {
                                                                                $pre = ' ';
                                                                            } else {
                                                                                $pre = 'Cr';
                                                                            }
                                                                            ?>
                                                                            <tr data-tt-id="<?php echo $a5['id']; ?>" data-tt-parent-id="<?php echo $a4['id']; ?>">
                                                                                <td><?php echo $a5['name']; ?></td>
                                                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            $balance = 0;
                                                                            $debit = 0;
                                                                            $credit = 0;
                                                                            unset($ee);
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }

                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                        if($net > 0){
                                            $npre = 'Dr';
                                        }elseif($net == 0){
                                            $npre = ' ';
                                        }else{
                                            $npre = 'Cr';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3"><b>Net Balance</b></td>
                                            <td class="right"><?php echo number_format(abs($net), 2) . ' ' . $npre; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="invoice-table">
                                <table id="treetable2" class="table table-striped table-bordered bootstrap-datatable datatable">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="left">Liability</th>
                                        </tr>
                                        <tr>
                                            <th>Name of A/C</th>
                                            <th class="center span2">Debit</th>
                                            <th class="center span2">Credit</th>
                                            <th class="center span2">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $net = 0;
                                        $balance = 0;
                                        $debit = 0;
                                        $credit = 0;
                                        foreach ($liabilities as $a1) {
                                            //print_r($a1);
                                            $aa[] = $a1;
                                            $debit = sum_subarrays_by_key($aa, "debit");
                                            $credit = sum_subarrays_by_key($aa, "credit");
                                            $balance = $debit - $credit;
                                            $net += $balance;
                                            if($balance > 0){
                                                $pre = 'Dr';
                                            }elseif($balance == 0){
                                                $pre = ' ';
                                            }else{
                                                $pre = 'Cr';
                                            }
                                            ?>
                                            <tr data-tt-id="<?php echo $a1['id']; ?>">
                                                <td><?php echo $a1['name']; ?></td>
                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                            </tr>
                                            <?php
                                            $balance = 0;
                                            $debit = 0;
                                            $credit = 0;
                                            unset($aa);
                                            if (isset($a1['child'])) {
                                                foreach ($a1['child'] as $a2) {
                                                    $bb[] = $a2;
                                                    $debit = sum_subarrays_by_key($bb, "debit");
                                                    $credit = sum_subarrays_by_key($bb, "credit");
                                                    $balance = $debit - $credit;
                                                    if($balance > 0){
                                                        $pre = 'Dr';
                                                    }elseif($balance == 0){
                                                        $pre = ' ';
                                                    }else{
                                                        $pre = 'Cr';
                                                    }
                                                    ?>
                                                    <tr data-tt-id="<?php echo $a2['id']; ?>" data-tt-parent-id="<?php echo $a1['id']; ?>">
                                                        <td><?php echo $a2['name']; ?></td>
                                                        <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                        <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                        <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                    </tr>
                                                    <?php
                                                    $balance = 0;
                                                    $debit = 0;
                                                    $credit = 0;
                                                    unset($bb);
                                                    if (isset($a2['child'])) {
                                                        foreach ($a2['child'] as $a3) {
                                                            $cc[] = $a3;
                                                            $debit = sum_subarrays_by_key($cc, "debit");
                                                            $credit = sum_subarrays_by_key($cc, "credit");
                                                            $balance = $debit - $credit;
                                                            if($balance > 0){
                                                                $pre = 'Dr';
                                                            }elseif($balance == 0){
                                                                $pre = ' ';
                                                            }else{
                                                                $pre = 'Cr';
                                                            }
                                                            ?>
                                                            <tr data-tt-id="<?php echo $a3['id']; ?>" data-tt-parent-id="<?php echo $a2['id']; ?>">
                                                                <td><?php echo $a3['name']; ?></td>
                                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                            </tr>
                                                            <?php
                                                            $balance = 0;
                                                            $debit = 0;
                                                            $credit = 0;
                                                            unset($cc);
                                                            if (isset($a3['child'])) {
                                                                foreach ($a3['child'] as $a4) {
                                                                    $dd[] = $a4;
                                                                    $debit = sum_subarrays_by_key($dd, "debit");
                                                                    $credit = sum_subarrays_by_key($dd, "credit");
                                                                    $balance = $debit - $credit;
                                                                    if($balance > 0){
                                                                        $pre = 'Dr';
                                                                    }elseif($balance == 0){
                                                                        $pre = ' ';
                                                                    }else{
                                                                        $pre = 'Cr';
                                                                    }
                                                                    ?>
                                                                    <tr data-tt-id="<?php echo $a4['id']; ?>" data-tt-parent-id="<?php echo $a3['id']; ?>">
                                                                        <td><?php echo $a4['name']; ?></td>
                                                                        <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                        <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                        <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $balance = 0;
                                                                    $debit = 0;
                                                                    $credit = 0;
                                                                    unset($dd);
                                                                    if (isset($a4['child'])) {
                                                                        foreach ($a4['child'] as $a5) {
                                                                            $ee[] = $a5;
                                                                            $debit = sum_subarrays_by_key($ee, "debit");
                                                                            $credit = sum_subarrays_by_key($ee, "credit");
                                                                            $balance = $debit - $credit;
                                                                            if($balance > 0){
                                                                                $pre = 'Dr';
                                                                            }elseif($balance == 0){
                                                                                $pre = ' ';
                                                                            }else{
                                                                                $pre = 'Cr';
                                                                            }
                                                                            ?>
                                                                            <tr data-tt-id="<?php echo $a5['id']; ?>" data-tt-parent-id="<?php echo $a4['id']; ?>">
                                                                                <td><?php echo $a5['name']; ?></td>
                                                                                <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                                <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                                <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                            </tr>
                                                                            <?php
                                                                            $balance = 0;
                                                                            $debit = 0;
                                                                            $credit = 0;
                                                                            unset($ee);
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }

                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                        if($net > 0){
                                            $npre = 'Dr';
                                        }elseif($net == 0){
                                            $npre = ' ';
                                        }else{
                                            $npre = 'Cr';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3"><b>Net Balance</b></td>
                                            <td class="right"><?php echo number_format(abs($net), 2) . ' ' . $npre; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="invoice-table">
                              <table id="treetable3" class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="left">Capital</th>
                                    </tr>
                                    <tr>
                                        <th>Name of A/C</th>
                                        <th class="center span2">Debit</th>
                                        <th class="center span2">Credit</th>
                                        <th class="center span2">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $net = 0;
                                    $balance = 0;
                                    $debit = 0;
                                    $credit = 0;
                                    foreach ($equities as $a1) {
                                        //print_r($a1);
                                        $aa[] = $a1;
                                        $debit = sum_subarrays_by_key($aa, "debit");
                                        $credit = sum_subarrays_by_key($aa, "credit");
                                        $balance = $debit - $credit;
                                        $net += $balance;
                                        if($balance > 0){
                                            $pre = 'Dr';
                                        }elseif($balance == 0){
                                            $pre = ' ';
                                        }else{
                                            $pre = 'Cr';
                                        }
                                        ?>
                                        <tr data-tt-id="<?php echo $a1['id']; ?>">
                                            <td><?php echo $a1['name']; ?></td>
                                            <td class="right"><?php echo number_format($debit, 2); ?></td>
                                            <td class="right"><?php echo number_format($credit, 2); ?></td>
                                            <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                        </tr>
                                        <?php
                                        $balance = 0;
                                        $debit = 0;
                                        $credit = 0;
                                        unset($aa);
                                        if (isset($a1['child'])) {
                                            foreach ($a1['child'] as $a2) {
                                                $bb[] = $a2;
                                                $debit = sum_subarrays_by_key($bb, "debit");
                                                $credit = sum_subarrays_by_key($bb, "credit");
                                                $balance = $debit - $credit;
                                                if($balance > 0){
                                                    $pre = 'Dr';
                                                }elseif($balance == 0){
                                                    $pre = ' ';
                                                }else{
                                                    $pre = 'Cr';
                                                }
                                                ?>
                                                <tr data-tt-id="<?php echo $a2['id']; ?>" data-tt-parent-id="<?php echo $a1['id']; ?>">
                                                    <td><?php echo $a2['name']; ?></td>
                                                    <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                    <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                    <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                </tr>
                                                <?php
                                                $balance = 0;
                                                $debit = 0;
                                                $credit = 0;
                                                unset($bb);
                                                if (isset($a2['child'])) {
                                                    foreach ($a2['child'] as $a3) {
                                                        $cc[] = $a3;
                                                        $debit = sum_subarrays_by_key($cc, "debit");
                                                        $credit = sum_subarrays_by_key($cc, "credit");
                                                        $balance = $debit - $credit;
                                                        if($balance > 0){
                                                            $pre = 'Dr';
                                                        }elseif($balance == 0){
                                                            $pre = ' ';
                                                        }else{
                                                            $pre = 'Cr';
                                                        }
                                                        ?>
                                                        <tr data-tt-id="<?php echo $a3['id']; ?>" data-tt-parent-id="<?php echo $a2['id']; ?>">
                                                            <td><?php echo $a3['name']; ?></td>
                                                            <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                            <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                            <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                        </tr>
                                                        <?php
                                                        $balance = 0;
                                                        $debit = 0;
                                                        $credit = 0;
                                                        unset($cc);
                                                        if (isset($a3['child'])) {
                                                            foreach ($a3['child'] as $a4) {
                                                                $dd[] = $a4;
                                                                $debit = sum_subarrays_by_key($dd, "debit");
                                                                $credit = sum_subarrays_by_key($dd, "credit");
                                                                $balance = $debit - $credit;
                                                                if($balance > 0){
                                                                    $pre = 'Dr';
                                                                }elseif($balance == 0){
                                                                    $pre = ' ';
                                                                }else{
                                                                    $pre = 'Cr';
                                                                }
                                                                ?>
                                                                <tr data-tt-id="<?php echo $a4['id']; ?>" data-tt-parent-id="<?php echo $a3['id']; ?>">
                                                                    <td><?php echo $a4['name']; ?></td>
                                                                    <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                    <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                    <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                </tr>
                                                                <?php
                                                                $balance = 0;
                                                                $debit = 0;
                                                                $credit = 0;
                                                                unset($dd);
                                                                if (isset($a4['child'])) {
                                                                    foreach ($a4['child'] as $a5) {
                                                                        $ee[] = $a5;
                                                                        $debit = sum_subarrays_by_key($ee, "debit");
                                                                        $credit = sum_subarrays_by_key($ee, "credit");
                                                                        $balance = $debit - $credit;
                                                                        if($balance > 0){
                                                                            $pre = 'Dr';
                                                                        }elseif($balance == 0){
                                                                            $pre = ' ';
                                                                        }else{
                                                                            $pre = 'Cr';
                                                                        }
                                                                        ?>
                                                                        <tr data-tt-id="<?php echo $a5['id']; ?>" data-tt-parent-id="<?php echo $a4['id']; ?>">
                                                                            <td><?php echo $a5['name']; ?></td>
                                                                            <td class="right"><?php echo number_format($debit, 2); ?></td>
                                                                            <td class="right"><?php echo number_format($credit, 2); ?></td>
                                                                            <td class="right"><?php echo number_format(abs($balance), 2) . ' ' . $pre; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                        $balance = 0;
                                                                        $debit = 0;
                                                                        $credit = 0;
                                                                        unset($ee);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <?php
                                    if($net > 0){
                                        $npre = 'Dr';
                                    }elseif($net == 0){
                                        $npre = ' ';
                                    }else{
                                        $npre = 'Cr';
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3"><b>Net Balance</b></td>
                                        <td class="right"><?php echo number_format(abs($net), 2) . ' ' . $npre; ?></td>
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
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/plugin/treetable/js/jquery.treetable.js"></script>
<script>
    $("#treetable1").treetable({expandable: true});
    $("#treetable2").treetable({expandable: true});
    $("#treetable3").treetable({expandable: true});
</script>
</body>
</html>