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
                    <h1 class="m-0">Les Bordereaux D'envoi جداول الإرسال</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <a href="{{ URL::to('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> </li>
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

            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-lg">
                {{-- <span class="badge bg-purple">12 bordereaus</span> --}}
                <i class="fas fa-plus"></i> Ajouter إضــافة
            </a>
            {{-- <a class="btn btn-app bg-warning">
                <span class="badge bg-info">0</span>
                <i class="fas fa-envelope"></i> Planning
            </a> --}}
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                {{-- <th>Num_courie</th>
                                <th>emetteur</th>
                                <th>date_envoi</th>
                                <th>envoye_a</th>
                                <th>objet</th>
                                <th>nature</th>
                                <th>tranfere_a</th>
                                <th>date_transfert</th>
                                <th>obligation_repanse</th>
                                <th>date_reponse</th>
                                <th>fichier</th> 
                                <th>Actions</th> --}}
                                <th>#</th>
                                <th>المرسل</th>
                                <th>تاريخ الارسال</th>
                                <th>مرسل الى</th>
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th>تحول الى</th>
                                <th>تاريخ التحويل</th>
                                <th>وجوب الرد</th>
                                <th>تاريخ الرد</th>
                                <th hidden> الملف</th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bordereaus as $bordereau)
                                <tr id='bordereau_{{ $bordereau->id }}'>
                                    <td>{{ $bordereau->Num_courie }}</td>
                                    <td>{{ $bordereau->emetteur }}</td>
                                    <td>{{ $bordereau->date_envoi }}</td>
                                    <td>{{ $bordereau->envoye_a }}</td>
                                    <td>{{ $bordereau->objet }}</td>
                                    <td>{{ $bordereau->type }}</td>
                                    <td>{{ $bordereau->tranfere_a }}</td>
                                    <td>{{ $bordereau->date_transfert }}</td>
                                    <td>{{ $bordereau->obligation_repanse }}</td>
                                    <td>{{ $bordereau->date_reponse }}</td>
                                    <td id="file" hidden>{{ $bordereau->fichier }}</td>
                                    <td>
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('plannings.show', $bordereau->id, $bordereau->nom) }}"> --}}
                                        <a class="btn btn-success btn-sm" onclick="showpdf(this);"
                                            href="javascript:void(0);"
                                            data-path="{{ asset(Storage::url('bordereau/' . $bordereau->fichier)) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            عرض
                                        </a>

                                        <a class="btn btn-info btn-sm" onclick="showEdit({{ $bordereau->id }})"
                                            id="btn_edit"> <i class="fas fa-pencil-alt"> </i> Edit </a>
                                        <a class="btn btn-danger btn-sm" onclick="showDelete({{ $bordereau->id }})"
                                            id="btn_delete"> <i class="fas fa-trash"> </i> Delete </a>

                                    </td>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>المرسل</th>
                                <th>تاريخ الارسال</th>
                                <th>مرسل الى</th>
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th>تحول الى</th>
                                <th>تاريخ التحويل</th>
                                <th>وجوب الرد</th>
                                <th>تاريخ الرد</th>
                                <th hidden> الملف</th>
                                <th>عمليات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    {{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="edit_mdl">
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
                            <h3 class="card-title">Modifier une bordereau</h3>
                        </div>
                        <div class="card-body">
                            <form action="" id="update_frm" method="POST" enctype="multipart/form-data"> @csrf

                                {{ method_field('PATCH') }}

                                <div class="row">

                                    <input class="form-control form-control-lg" type="text" name="id" hidden
                                        value="">
                                    <div class="col">
                                        <label for="">رقم المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="Num_courie"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <label for="">المرسل / الجهة المرسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="emetteur"
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">تاريخ الارسال</label>
                                        <input class="form-control form-control-lg" type="date" name="date_envoi"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <label for="">مرسلة الى</label>
                                        <input class="form-control form-control-lg" type="text" name="envoye_a"
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">موضوع المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="objet"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <label for="">طبيعة المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="type"
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">الجهة المحول إليها
                                        </label>
                                        <input class="form-control form-control-lg" type="text" name="tranfere_a"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <label for="">تاريخ التحويل </label>
                                        <input class="form-control form-control-lg" type="date" name="date_transfert"
                                            value="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">وجوب الرد على المراسلة ؟</label>
                                        <input class="form-control form-control-lg" type="text"
                                            name="obligation_repanse" value="">
                                    </div>
                                    <div class="col">
                                        <label for="">تاريخ الرد</label>
                                        <input class="form-control form-control-lg" type="date" name="date_reponse"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <label for="" for="chooseFile">ملف المراسلة</label>
                                        <input class="form-control form-control-lg" type="file" name="file"
                                            id="chooseFile" value="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">تعديـل</button>


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
    {{-- ---------------------------------------------------------------------- MODAL PDF------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="showpdfmodal">
        <div class="modal-dialog modal-xl" style="width:1140px; height:900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="file_title"> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- {{ $bordereau->fichier }} --}}

                    {{-- <iframe src="{{ asset('cv1_28.pdf') }}" width="50%" height="600">
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('cv1_28.pdf') }}">Download PDF</a>
                    </iframe> --}}
                    {{-- <embed src="{{ $bordereau->fichier }}" width="600" height="500" alt="pdf" />  url('show-pdf', $bordereau->id) --}}
                    <iframe id="showmodaliframe" src="" style="width:1100px; height:600px;" frameborder="0">
                    </iframe>
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
    {{-- ---------------------------------------------------------------------- MODAL DELETE ------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="delete_mdl">
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
                            <h3 class="card-title">Supprimer une bordereau</h3>
                        </div>
                        <div class="card-body">
                            <form action="" id="destroy_frm" {{-- <form action="{{ route('bordereaux.destroy', $bordereau->id) }}" --}} method="POST"
                                enctype="multipart/form-data">   @csrf
                                @csrf_field 
                                {{ method_field('delete') }}

                                <input class="form-control form-control-lg" type="hidden" value=""
                                    name="id" id="bordereau_id">
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

    {{-- ----------------------------------------------------------------------  MODAL ADD------------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">إضافة بريد وارد</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">إضافة جدول إرسال</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bordereaux.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">رقم المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="Num_courie">
                                    </div>
                                    <div class="col">
                                        <label for="">المرسل / الجهة المرسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="emetteur">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">تاريخ الارسال</label>
                                        <input class="form-control form-control-lg" type="date" name="date_envoi">
                                    </div>
                                    <div class="col">
                                        <label for="">مرسلة الى</label>
                                        <input class="form-control form-control-lg" type="text" name="envoye_a">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">موضوع المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="objet">
                                    </div>
                                    <div class="col">
                                        <label for="">طبيعة المراسلة</label>
                                        <input class="form-control form-control-lg" type="text" name="type">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">الجهة المحول إليها
                                        </label>
                                        <input class="form-control form-control-lg" type="text" name="tranfere_a">
                                    </div>
                                    <div class="col">
                                        <label for="">تاريخ التحويل </label>
                                        <input class="form-control form-control-lg" type="date" name="date_transfert">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="">وجوب الرد على المراسلة ؟</label>
                                        <input class="form-control form-control-lg" type="text"
                                            name="obligation_repanse">
                                    </div>
                                    <div class="col">
                                        <label for="">تاريخ الرد</label>
                                        <input class="form-control form-control-lg" type="date" name="date_reponse">
                                    </div>
                                    <div class="col">
                                        <label for="" for="chooseFile">ملف المراسلة</label>
                                        <input class="form-control form-control-lg" type="file" name="file"
                                            id="chooseFile">
                                    </div>
                                </div>

                                <br>
                                <br>

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
    <script src="{{ URL::asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
       
        function showEdit(id) {

            // console.log('--'+$('#arivee_'+id).children().eq(5)); 
            // console.log('--'+$('#arivee_'+id).children().eq(5).data('formatioid'));
            var form = document.getElementById("update_frm");
            var action = "{{ route('bordereaux.update', '') }}/" + id;
            form.action = action;
            // $('#edit_mdl #update_frm').attr("action",action);

            $('#edit_mdl input[name="id"]').val(id);
            $('#edit_mdl input[name="Num_courie"]').val($('#bordereau_' + id).children().eq(0).html());
            $('#edit_mdl input[name="emetteur"]').val($('#bordereau_' + id).children().eq(1).html());
            $('#edit_mdl input[name="date_envoi"]').val($('#bordereau_' + id).children().eq(2).html());
            $('#edit_mdl input[name="envoye_a"]').val($('#bordereau_' + id).children().eq(3).html());

            $('#edit_mdl input[name="objet"]').val($('#bordereau_' + id).children().eq(4).html());
            $('#edit_mdl input[name="type"]').val($('#bordereau_' + id).children().eq(5).html());
            $('#edit_mdl input[name="tranfere_a"]').val($('#bordereau_' + id).children().eq(6).html());
            $('#edit_mdl input[name="date_transfert"]').val($('#bordereau_' + id).children().eq(7).html());

            $('#edit_mdl input[name="obligation_repanse"]').val($('#bordereau_' + id).children().eq(8).html());
            $('#edit_mdl input[name="date_reponse"]').val($('#bordereau_' + id).children().eq(9).html());
            $('#edit_mdl input[name="file"]').data($('#bordereau_' + id).children().eq(10).html());
            // $('#edit_mdl input[name="objet"]').val($('#arivee_' + id).children().eq(5).data('formatioid'));
            jQuery.noConflict();
            $('#edit_mdl').modal('show');
        }
        //  Num_courie emetteur date_envoi envoye_a objet type tranfere_a date_transfert obligation_repanse date_reponse file
        
        function showDelete(id) {
            var form = document.getElementById("destroy_frm");
            var action = "{{ route('bordereaux.destroy', '') }}/" + id;
            form.action = action;
            $('#delete_mdl #bordereau_id').val(id);
            jQuery.noConflict();
            $('#delete_mdl').modal('show');
        }

        function showpdf(link) {
            var path = $(link).data("path");
            // var bor='bordereau/';
            // path=bor.concat(path) ;
            $("#showpdfmodal #showmodaliframe").attr("src", path);
            $("#showpdfmodal #file_title").html(path);
            jQuery.noConflict();
            $("#showpdfmodal").modal("show");
        }
     
    </script>
@endsection
