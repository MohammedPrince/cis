
<footer class="main-footer">
  <strong>Copyright © <?php date("Y") ?> All rights reserved for <a href="https://beta.fu.edu.sd/Home">The Future University.</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Developed by </b>CESD

</div>
</footer>
<!-- <aside class="control-sidebar control-sidebar-dark">

</aside> -->

</div>



<script src="include/plugins/jquery/jquery.min.js"></script>

<script src="include/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="include/plugins/chart.js/Chart.min.js"></script>

<script src="include/plugins/sparklines/sparkline.js"></script>

<script src="include/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="include/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="include/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="include/plugins/moment/moment.min.js"></script>
<script src="include/plugins/daterangepicker/daterangepicker.js"></script>

<script src="include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="include/plugins/summernote/summernote-bs4.min.js"></script>

<script src="include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="include/dist/js/adminlte2167.js?v=3.2.0"></script>

<script src="include/dist/js/demo.js"></script>

<script src="include/dist/js/pages/dashboard.js"></script>

<!-- datatable -->

<script src="include/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="include/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="include/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="include/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="include/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="include/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="include/plugins/jszip/jszip.min.js"></script>
<script src="include/plugins/pdfmake/pdfmake.min.js"></script>
<script src="include/plugins/pdfmake/vfs_fonts.js"></script>
<script src="include/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="include/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="include/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="include/plugins/jquery/jquery.min.js"></script>

<script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="include/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="include/plugins/toastr/toastr.min.js"></script>

<script src="include/dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="include/dist/js/demo.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>


</body>

</html>



