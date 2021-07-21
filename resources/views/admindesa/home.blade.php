@extends('../layout_admin/master')
@section('css')
<link rel="{{ asset('stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="{{ asset('stylesheet" href="datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Selamat Datang Admin Desa..</h1>
          </div>
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Kegiatan Desa</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection

<!-- @section('js') -->

<!-- DataTables -->
<!-- <script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>



<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection -->
