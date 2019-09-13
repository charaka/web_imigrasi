<!-- jQuery 3 -->
  {!! Html::script('assets/bower_components/jquery/dist/jquery.min.js') !!}
<!-- jQuery UI 1.11.4 -->
  {!! Html::script('assets/bower_components/jquery-ui/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!--   {!! Html::script('assets/components/bootstrap-timepicker/js/bootstrap-timepicker.js') !!} -->
<!-- Bootstrap 3.3.7 -->
  {!! Html::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
  {!! Html::script('assets/bower_components/raphael/raphael.min.js') !!}
<!--   {!! Html::script('assets/bower_components/morris.js/morris.min.js') !!} -->
<!-- Sparkline -->
  {!! Html::script('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
  {!! Html::script('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
  {!! Html::script('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
  {!! Html::script('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
<!-- daterangepicker -->
  {!! Html::script('assets/bower_components/moment/min/moment.min.js') !!}
  {!! Html::script('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
  {!! Html::script('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
<!-- Bootstrap WYSIHTML5 -->
  {!! Html::script('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
  {!! Html::script('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
  {!! Html::script('assets/bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
  {!! Html::script('assets/dist/js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--   {!! Html::script('assets/dist/js/pages/dashboard.js') !!} -->
<!-- AdminLTE for demo purposes -->
<!--   {!! Html::script('assets/dist/js/demo.js') !!} -->
  {!! Html::script('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
  {!! Html::script('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

<!-- script untuk localstorage -->
<!-- select2 -->
{!! Html::script('assets/plugins/select2/select2.full.min.js') !!}

{!! Html::script('assets/plugins/sorting/jquery.mjs.nestedSortable.js') !!}

<!-- alert -->
{!! Html::script('assets/plugins/jquery-alert/js/jquery-confirm.js') !!}

<!-- summernote -->
{!! Html::script('assets/plugins/summernote/summernote.js') !!}

<!-- fileupload -->
{!! Html::script('assets/plugins/fileupload/max.upload.js') !!}

<script type="text/javascript">
  $(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip(); 
    
    var url = window.location;
    //hanya akan bekerja pada href string yg matches dengan lokasi
    $('ul li a[href="'+ url +'"]').parent().addClass('active');

    $('ul .treeview .treeview-menu li a[href="'+ url +'"]').parent().addClass('active').addClass('menu-open');

    $('ul .treeview .treeview-menu li a[href="'+ url +'"]').parent().addClass('aktif').addClass('menu-open');

    $('.aktif').parent('.treeview-menu').parent('.treeview').addClass('active').addClass('menu-open');

    $('.aktif').parent('.treeview-menu').addClass('menu-open');

    $('.aktif').parent('.treeview-menu').css('display','block');

    $.fn.datepicker.defaults.format = "dd/mm/yyyy";
    $('.datepicker_input').datepicker({
        autoclose: true,
        orientation: 'bottom',
      })

  })
</script>