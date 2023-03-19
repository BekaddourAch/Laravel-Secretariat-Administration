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
                    <h1 class="m-0">Les courrier Départ البريد الصادر</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"> <a href="{{ URL::to('/dashboard') }}">Home</a></li>
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

            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-lg">
                {{-- <span class="badge bg-purple">12 departs</span> --}}
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

                                <th>#</th>
                                <th>مرسل الى</th>
                                <th>تاريخ الارسال</th>
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th> الملف</th> 
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departs as $depart)
                            <tr id='depart_{{ $depart->id }}'>
                                    <td>{{ $depart->Num_courie }}</td>
                                    <td>{{ $depart->envoye_a }}</td>
                                    <td>{{ $depart->date_envoi }}</td>
                                    <td>{{ $depart->objet }}</td> 
                                    <td data-typeid="{{ $depart->type_id }}">{{ $depart->Type->name }}</td>
                                    <td id="file">{{ $depart->fichier }}</td>
                                    <td>
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('plannings.show', $depart->id, $depart->nom) }}"> --}}
                                        <a class="btn btn-success btn-sm" onclick="showpdf(this);" href="javascript:void(0);" data-path="{{ asset(Storage::url("depart/".$depart->fichier)) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            عرض
                                        </a>
                                        
                                        <a class="btn btn-info btn-sm" onclick="showEdit({{ $depart->id }})" id="btn_edit"> <i class="fas fa-pencil-alt"> </i> Edit  </a> 
                                        <a class="btn btn-danger btn-sm" onclick="showDelete({{ $depart->id }})"  id="btn_delete"> <i class="fas fa-trash"> </i> Delete  </a>

                                        {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $depart->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            تعديل
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $depart->id }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            حذف
                                        </a> --}}
                                    </td>

                                    </td>
                                </tr>
                                 @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>مرسل الى</th>
                                <th>تاريخ الارسال</th>
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th> الملف</th> 
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
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Ajouter une depart</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        {{-- <form action="{{ route('cour_depart.update', $depart->id) }}" --}}
                                                            
                                                        <form action="" id="update_frm"     
                                                            method="POST" enctype="multipart/form-data"> @csrf

                                                            {{-- {{ method_field('PUT') }} --}}
                                                            {{ method_field('PATCH') }}
                                                            <div class="row">
                                                                <div class="col-md-3"> 
                                                                    <label for="">رقم المراسلة</label>
                                                                    <input class="form-control form-control-lg" type="text" hidden  name="id" value="">>
                                                                    <input class="form-control form-control-lg" type="text"  name="Num_courie"  value=""> 
                                                                </div>
                                                                <div class="col-md-4"> 
                                                                    <label for="">تاريخ الارسال</label>
                                                                    <input class="form-control form-control-lg" type="date"  name="date_envoi" value=""> 
                                                                </div>
                                                                
                                                                <div class="col-md-5">
                                                                    <label for="">مرسلة الى</label>
                                                                    <input class="form-control form-control-lg" type="text"  name="envoye_a" value=""> 
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row"> 
                                                                <div class="col"> 
                                                                    <label for="">موضوع المراسلة</label>
                                                                    <input class="form-control form-control-lg" type="text"  name="objet" value=""> 
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">  
                                                                <div class="col">
                                                                    <label for="">طبيعة المراسلة</label> 
                                                                    <select class="form-control form-control-lg" name="type_id" id="typeid" >   
                                                                        @foreach ($types as $type)
                                                                           <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                                                       @endforeach 
                                                                   </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="" for="chooseFile">ملف المراسلة</label>
                                                                    <input class="form-control form-control-lg" type="file" name="file" id="chooseFile" value=""> 
                                                                </div>
                                                            </div>
                                                            <br> 
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
{{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}
<div class="modal fade" id="showpdfmodal"  >
    <div class="modal-dialog modal-xl" style="width:1140px; height:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="file_title">  </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                {{ $depart->fichier  }}
                
                {{-- <iframe src="{{ asset('cv1_28.pdf') }}" width="50%" height="600">
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('cv1_28.pdf') }}">Download PDF</a>
                </iframe> --}}
                {{-- <embed src="{{ $depart->fichier }}" width="600" height="500" alt="pdf" />  url('show-pdf', $depart->id)--}}
                <iframe id="showmodaliframe" src=""
                    style="width:1100px; height:600px;"
                    frameborder="0">
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
                                <div class="modal fade" id="delete{{ $depart->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Large Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Supprimer une depart</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ route('cour_depart.destroy', $depart->id) }}"
                                                            method="POST" enctype="multipart/form-data"> @csrf
                                                            @csrf_field {{ method_field('delete') }}

                                                            <input class="form-control form-control-lg" type="hidden"
                                                                value="{{ $depart->id }}" name="id" id="depart_id">
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

                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                           
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
                            <h3 class="card-title">Ajouter une arrivée</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('cour_depart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <label for="">رقم المراسلة</label>
                                        <input class="form-control form-control-lg" type="text"  name="Num_courie"> 
                                    </div>
                                    
                                    <div class="col-md-4"> 
                                        <label for="">تاريخ الارسال</label>
                                        <input class="form-control form-control-lg" type="date"  name="date_envoi"> 
                                    </div>

                                    <div class="col-md-5">
                                        <label for="">مرسلة الى</label>
                                        <input class="form-control form-control-lg" type="text"  name="envoye_a"> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <label for="">موضوع المراسلة</label>
                                        <input class="form-control form-control-lg" type="text"  name="objet"> 
                                    </div>
                                </div>
                                <br>
                                <div class="row"> 
                                    <div class="col">
                                        <label for="">طبيعة المراسلة</label>
                                        <select class="form-control form-control-lg" name="type_id" id="" >   
                                            @foreach ($types as $type)
                                               <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                           @endforeach 
                                       </select> 
                                    </div>
                                    <div class="col">
                                        <label for="" for="chooseFile">ملف المراسلة</label>
                                        <input class="form-control form-control-lg" type="file" name="file" id="chooseFile"> 
                                    </div>
                                </div>
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

// console.log('--'+$('#depart_'+id).children().eq(5)); 
// console.log('--'+$('#depart_'+id).children().eq(5).data('formatioid'));
var form = document.getElementById("update_frm");
var action ="{{ route('cour_depart.update',"") }}/"+id;
form.action = action;
// $('#edit_mdl #update_frm').attr("action",action);

$('#edit_mdl input[name="id"]').val(id); 
$('#edit_mdl input[name="Num_courie"]').val($('#depart_' + id).children().eq(0).html()); 
$('#edit_mdl input[name="envoye_a"]').val($('#depart_' + id).children().eq(1).html());
$('#edit_mdl input[name="date_envoi"]').val($('#depart_' + id).children().eq(2).html());
$('#edit_mdl input[name="objet"]').val($('#depart_' + id).children().eq(3).html());
$('#edit_mdl #typeid').val($('#depart_' + id).children().eq(4).data('typeid')); 
$('#edit_mdl input[name="file"]').data($('#depart_' + id).children().eq(5).html()); 
// $('#edit_mdl input[name="objet"]').val($('#depart_' + id).children().eq(5).data('formatioid'));
$('#edit_mdl').modal('show');
}
//   id Num_courie envoye_a date_envoi objet type_id file
function showDelete(id) {  
var form = document.getElementById("destroy_frm");
var action ="{{ route('cour_depart.destroy',"") }}/"+id;
form.action = action;
$('#delete_mdl #depart_id').val($('#depart_' + id).children().eq(0).html());

$('#delete_mdl').modal('show');
}
        function showpdf(link){
            var path=$(link).data("path");
            $("#showpdfmodal #showmodaliframe").attr("src",path) ;
            $("#showpdfmodal #file_title").html(path); 
            
            $("#showpdfmodal").modal("show");
        }
    </script>
@endsection
