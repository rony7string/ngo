<!-- Bootstrap 3.3.7 -->
<script src="assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/adminlte/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="assets/adminlte/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="assets/adminlte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/adminlte/plugins/input-mask/jquery.inputmask.extensions.j"></script>
<script src="assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="assets/js/DataTables/datatables.min.js"></script>
<!-- FastClick -->
<script src="assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- adminlte App -->
<script src="assets/adminlte/dist/js/adminlte.min.js"></script>
<script src="assets/plugin/jquery-popup-overlay/jquery.popupoverlay.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#member_table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
      
    } );
</script>


<script type="text/javascript">
    $(function($) {
        // this script needs to be loaded on every page where an ajax POST may happen
        $.ajaxSetup({
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }
        });
    });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    })

    $('#my_popup').popup({
        focusdelay: 400,
        outline: true,
        vertical: 'top'
    });

    $('#sales_no').focus();
    // $.validate();
</script>
<script>
    $(document).ready(function() {
      $('#example').DataTable();
  } );
</script>
<script src="assets/js/custom.js"></script>