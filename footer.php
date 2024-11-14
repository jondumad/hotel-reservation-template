    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    
    <!-- Select Plugin Js -->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    
    <!-- Slimscroll Plugin Js -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    
    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>
    
    <!-- Autosize Plugin Js -->
    <script src="assets/plugins/autosize/autosize.js"></script>
    
    <!-- Moment Plugin Js -->
    <script src="assets/plugins/momentjs/moment.js"></script>
    
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    
    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    
    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>    
    
    <!-- Demo Js -->
    <script src="assets/js/demo.js"></script>








    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script src="assets/js/pages/tables/jquery-datatable.js"></script>

    <script src="assets/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $("#alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000);
        });
        $('#gantiPassword').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            console.log(id)
            var modal = $(this)
            modal.find('.modal-body #id_user').val(id)
        })
    </script>
    </body>

    </html>