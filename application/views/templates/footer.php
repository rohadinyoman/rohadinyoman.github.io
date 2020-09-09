<!-- Vendor scripts -->
<script src="<?php echo base_url('assets/') ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/sparkline/index.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/') ?>vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables buttons scripts -->
<script src="<?php echo base_url('assets/') ?>vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<!-- App scripts -->
<script src="<?php echo base_url('assets/') ?>scripts/homer.js"></script>


<script>

    $(function () {

        // Initialize Example 1
        $('#example1').dataTable( {
            "ajax": '<?php base_url('assets/') ?>api/datatables.json',
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });

        // Initialize Example 2
        $('#example2').dataTable();

    });


</script>

</body>
</html>