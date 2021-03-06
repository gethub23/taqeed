
  <footer class="footer fixed-bottom footer-dark">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="#"
          target="_blank" style="color: #f19433;">Awamer Elshabaka && Cross Team</a>, All rights reserved. </span>
      </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('/dashboard/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('/dashboard/app-assets/vendors/js/ui/headroom.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('/dashboard/app-assets/vendors/js/ui/prism.min.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
  
 
  <!-- data table -->
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <!-- data table -->
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/forms/validation/form-validation.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/extensions/jquery.toolbar.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/js/scripts/extensions/toolbar.js')}}" type="text/javascript"></script>
  <script src="{{asset('/dashboard/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <script>
    $('.dataex-html5-selectors').DataTable({
        language: {
                "sProcessing":   "{{awtTrans("???????? ??????????????...")}}",
                "sLengthMenu":   "{{awtTrans("???????? ??????????????")}} _MENU_",
                "sZeroRecords":  `<div><img  style="width:200px; height:200px" src="{{asset('storage/images/no_data.png')}}"></div>`,
                "sInfo":         "{{awtTrans('??????????')}} _START_ {{awtTrans('??????')}} _END_ {{awtTrans('????')}} {{awtTrans('??????')}} _TOTAL_ {{awtTrans('??????????')}}",
                "sInfoEmpty":    "{{awtTrans('????????')}} 0 {{awtTrans('??????')}} 0 {{awtTrans('????')}} {{awtTrans('??????')}} 0 {{awtTrans('????????')}}",
                "sInfoFiltered": "({{awtTrans('???????????? ???? ??????????')}} _MAX_ {{awtTrans('??????????')}})",
                "sInfoPostFix":  "",
                "sSearch":       "{{awtTrans('????????')}}:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "{{awtTrans('??????????')}}",
                    "sPrevious": "{{awtTrans('????????????')}}",
                    "sNext":     "{{awtTrans('????????????')}}",
                    "sLast":     "{{awtTrans('????????????')}}"
                }, 
                
        },
        dom: 'Bfrtip',
        buttons: [
            
            {
                extend :  'print',
                text   : '{{awtTrans('??????????')}}'
            },
            {
                extend: 'copyHtml5',
                text: '{{awtTrans('??????')}} ',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                text: '{{awtTrans('??????????')}} ',
                action: function ( e, dt, button, config ) {
                    var data = dt.buttons.exportData();

                    $.fn.dataTable.fileSave(
                        new Blob( [ JSON.stringify( data ) ] ),
                        'Export.json'
                    );
                }
            },
            {
                text: '{{awtTrans('??????????')}}',
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                text: '{{awtTrans('???? ???? ????')}}',
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            
            
        ] 
    } );
  </script>
  @yield('script')
  <x-admin.alert />
</body>
</html>