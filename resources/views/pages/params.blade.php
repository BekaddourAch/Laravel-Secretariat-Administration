@extends('layouts.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les courrier arrivée البريد الوارد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"> <a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"> </li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


<!-- Main content -->
@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <div class="container">

                        <a class="btn btn-app bg-success" data-toggle="modal" {{-- data-target="#modal-lg" --}} onclick="showAddBur()">
                            {{-- <span class="badge bg-purple">12 arrivees</span> --}}
                            <i class="fas fa-plus"></i> إضافة مكتب
                        </a>
                        <!-- Small boxes (Stat box) -->
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div style="max-height: 570px;overflow: auto;">
                                <table class="table table-bordered table-striped table-responsive"
                                    style="overflow: auto;display: table">
                                    <thead>
                                        <tr style="position: sticky; top: 0; z-index: 1;background-color: white !important;">
                                            <th>#</th>
                                            <th>إسم المصلحة / المكتب/ الخلية</th>
                                            <th>عمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody style=" left: 0;width:100%">
                                        @foreach ($bureaux as $bureau)
                                            <tr id='bureau_{{ $bureau->id }}'>
                                                <td>{{ $bureau->id }}</td>
                                                <td>{{ $bureau->name }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm"
                                                        onclick="showDeleteBur({{ $bureau->id }})" id="btn_delete"> <i
                                                            class="fas fa-trash"> </i> Delete </a>
                                                </td>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->

                <div class="col">

                    <div class="container">

                        <a class="btn btn-app bg-success" data-toggle="modal" {{-- data-target="#modal-lg" --}} onclick="showAddTyp()">
                            {{-- <span class="badge bg-purple">12 arrivees</span> --}}
                            <i class="fas fa-plus"></i> إضافة نوع مراسلة
                        </a>
                        <!-- Small boxes (Stat box) -->
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header --> 

                                <div style="max-height: 570px;overflow: auto;">
                                    <table id="example1" class="table table-bordered table-striped table-responsive"
                                    style="overflow: auto;display: table">
                                        <thead>
                                            <tr style="position: sticky; top: 0; z-index: 1;background-color: white !important;">
                                                <th>#</th>
                                                <th>نوع المراسلة</th>
                                                <th>عمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody style=" left: 0;width:100%">
                                            @foreach ($types as $type)
                                                <tr id='type_{{ $type->id }}'>
                                                    <td>{{ $type->id }}</td>
                                                    <td>{{ $type->name }}</td>
                                                    <td>

                                                        <a class="btn btn-danger btn-sm"
                                                            onclick="showDeleteTyp({{ $type->id }})" id="btn_delete">
                                                            <i class="fas fa-trash"> </i> Delete </a>
                                                    </td>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div> 
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>

    {{-- ---------------------------------------------------------------------- Modal Delete
------------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="delete_Typ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Supprimer une arrivee</h3>
                        </div>
                        <div class="card-body">
                            {{-- <form action="{{ route('cour_arrivee.destroy', $arrivee->id) }}" --}} <form action="" id="destroy_frm_Typ" method="POST"
                                enctype="multipart/form-data"> @csrf
                                @csrf_field {{ method_field('delete') }}

                                <input class="form-control form-control-lg" type="hidden" value="" name="id"
                                    id="type_id">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- <!-- /.modal -->------------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="delete_Bur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Supprimer une arrivee</h3>
                        </div>
                        <div class="card-body">
                            {{-- <form action="{{ route('cour_arrivee.destroy', $arrivee->id) }}" --}} <form action="" id="destroy_frm_Bur" method="POST"
                                enctype="multipart/form-data"> @csrf
                                @csrf_field {{ method_field('delete') }}

                                <input class="form-control form-control-lg" type="hidden" value="" name="id"
                                    id="bureau_id">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- ---------------------------------------------------------------------- Modal ADD
------------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="modal-typ">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title">إضافة نوع مراسلة</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-body">
                            <form action="{{ url('parameters/store-type') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">اسم نوع المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="name">
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-primary">إضــافة</button>

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    {{-- ---------------------------------------------------------------------- Modal ADD
------------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="modal-bur">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title">إضافة مكتب / مصلحة /خلية</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-body">
                            <form action="{{ url('parameters/store-bureau/') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">اسم المكتب</label>
                                        <input class="form-control form-control-lg" type="text" name="name">
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-primary">إضــافة</button>

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')
    <script src="{{ URL::asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-responsive/js/responsive.bootzstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('/assets/dist/js/adminlte.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        // $(function () {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
        function showAddBur() {
            $('#modal-bur').modal('show');
        }

        function showAddTyp() {
            $('#modal-typ').modal('show');
        }

        function showDeleteTyp(id) {
            var form = document.getElementById("destroy_frm_Typ");
            var action = "{{ url('parameters/delete-type', '') }}/" + id;
            form.action = action;
            $('#delete_Typ #type_id').val($('#arivee_' + id).children().eq(0).html());

            $('#delete_Typ').modal('show');
        }

        function showDeleteBur(id) {
            var form = document.getElementById("destroy_frm_Bur");
            var action = "{{ url('parameters/delete-bureau', '') }}/" + id;
            form.action = action;
            $('#delete_Bur #bureau_id').val($('#arivee_' + id).children().eq(0).html());

            $('#delete_Bur').modal('show');
        }
    </script>
@endsection
