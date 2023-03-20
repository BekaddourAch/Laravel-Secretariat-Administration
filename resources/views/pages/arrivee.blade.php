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
                    <h1 class="m-0">Les courriers arrivée كل البريد الوارد</h1>
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

            <a class="btn btn-app bg-success" data-toggle="modal" 
            {{-- data-target="#modal-lg" --}}
            onclick="showAdd()"
            >
                {{-- <span class="badge bg-purple">12 arrivees</span> --}}
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
                                {{-- <th>مرسل الى</th> --}}
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th>تحول الى</th>
                                <th>تاريخ التحويل</th>
                                <th>وجوب الرد</th>
                                <th>تاريخ الرد</th> 
                                <th Width="30px"> الملف</th> 
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arrivees as $arrivee)
                                <tr id='arivee_{{ $arrivee->id }}'>
                                    <td>{{ $arrivee->Num_courie }}</td>
                                    <td>{{ $arrivee->emetteur }}</td>
                                    <td>{{ $arrivee->date_envoi }}</td>
                                    {{-- <td>{{ $arrivee->envoye_a }}</td> --}}
                                    <td>{{ $arrivee->objet }}</td>
                                    <td data-typeid="{{ $arrivee->type_id }}">{{ $arrivee->Type->name }}</td>
                                    <td data-bureauid="{{ $arrivee->bureau_id }}">{{ $arrivee->Bureau->name }}</td>
                                    {{-- <td>{{ $arrivee->tranfere_a }}</td> --}}
                                    <td>{{ $arrivee->date_transfert }}</td>
                                    <td>{{ $arrivee->obligation_repanse }}</td>
                                    <td>{{ $arrivee->date_reponse }}</td>
                                    <td id="file">{{ $arrivee->fichier }}</td>
                                    <td>
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ route('plannings.show', $arrivee->id, $arrivee->nom) }}"> --}}
                                        <a class="btn btn-success btn-sm" onclick="showpdf(this);" href="javascript:void(0);" data-path="{{ asset(Storage::url("arrivee/".$arrivee->fichier)) }}">
                                            <i class="fas fa-file"> </i>  عرض
                                        </a>
                                        <a class="btn btn-info btn-sm" onclick="showEdit({{ $arrivee->id }})" id="btn_edit"> <i class="fas fa-pencil-alt"> </i> Edit  </a> 
                                        <a class="btn btn-danger btn-sm" onclick="showDelete({{ $arrivee->id }})"  id="btn_delete"> <i class="fas fa-trash"> </i> Delete  </a>
                                        {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $arrivee->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i> 
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $arrivee->id }}">
                                            <i class="fas fa-trash">
                                            </i> 
                                        </a> --}}
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
                                {{-- <th>مرسل الى</th> --}}
                                <th>المـــوضوع</th>
                                <th>نوع</th>
                                <th>تحول الى</th>
                                <th>تاريخ التحويل</th>
                                <th>وجوب الرد</th>
                                <th>تاريخ الرد</th> 
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
    {{-- ---------------------------------------------------------------------- Show PDF------------------------------------------------------------------------------------- --}}
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
                {{-- {{ $arrivee->fichier  }} --}}
                
                {{-- <iframe src="{{ asset('cv1_28.pdf') }}" width="50%" height="600">
                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('cv1_28.pdf') }}">Download PDF</a>
                </iframe> --}}
                {{-- <embed src="{{ $arrivee->fichier }}" width="600" height="500" alt="pdf" />  url('show-pdf', $arrivee->id)--}}
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
{{-- ---------------------------------------------------------------------- MODAL EDIT------------------------------------------------------------------------------------- --}}
<div class="modal fade" id="edit_mdl">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >تعديل البريد الوارد </h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Modifier une arrivee</h3>
                    </div>
                    <div class="card-body">
                        <form action="" id="update_frm" 
                            method="POST" enctype="multipart/form-data"> @csrf
                            {{-- 
                            {{ method_field('Delete') }} --}}
                            {{-- {{ method_field('PUT') }} --}}
                            
                            {{ method_field('PATCH') }}
                            {{-- @method('PUT') --}}
                            <div class="row">
                                <div class="col"> 
                                    <label for="">رقم المراسلة</label>
                                    <input class="form-control form-control-lg" type="text"  name="id" hidden value=""> 
                                    <input class="form-control form-control-lg" type="text"  name="Num_courie" value=""> 
                                </div>
                                <div class="col">
                                    <label for="">المرسل / الجهة المرسلة</label>
                                    <input class="form-control form-control-lg" type="text"  name="emetteur" value=""> 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col"> 
                                    <label for="">تاريخ الارسال</label>
                                    <input class="form-control form-control-lg" type="date"  name="date_envoi" value=""> 
                                </div>
                                {{-- <div class="col">
                                    <label for="">مرسلة الى</label>
                                    <input class="form-control form-control-lg" type="text"  name="envoye_a" value=""> 
                                </div> --}}
                                <div class="col">
                                    <label for="">نوع المراسلة</label>
                                    <select class="form-control form-control-lg" name="type_id" id="typeid" >   
                                        @foreach ($types as $type)
                                           <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                       @endforeach 
                                   </select>
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
                                    <label for="">الجهة المحول إليها		
                                    </label>
                                    <select class="form-control form-control-lg" name="bureau_id" id="bureauid">  
                                        
                                         @foreach ($bureaux as $bureau)
                                            <option value="{{ $bureau->id }}"> {{ $bureau->name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">تاريخ التحويل	    </label>
                                    <input class="form-control form-control-lg" type="date"  name="date_transfert" value=""> 
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox" style="padding: 2.5rem 0 2rem 1.5rem;">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="obligation_repanse" value="option1" checked="">
                                        <label for="customCheckbox1" class="custom-control-label">وجوب الرد على المراسلة ؟</label>
                                      </div>
                                </div>
                                <div class="col">
                                    <div id="datelbl">
                                        <label for="">تاريخ الرد</label>
                                        <input class="form-control form-control-lg" type="date"  name="date_reponse" id="datepickerresponse">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="chooseFile" for="chooseFile">ملف المراسلة</label>
                                    <input class="form-control form-control-lg" type="file" name="file" id="chooseFile" value="" text=""> 
                                </div>
                            </div>

                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">تعديــل</button>

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
{{-- ---------------------------------------------------------------------- Modal Delete  ------------------------------------------------------------------------------------- --}}

<div class="modal fade" id="delete_mdl">
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
                        <h3 class="card-title">Supprimer une arrivee</h3>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('cour_arrivee.destroy', $arrivee->id) }}" --}}
                        <form action="" id="destroy_frm"
                            method="POST" enctype="multipart/form-data"> @csrf
                            @csrf_field {{ method_field('delete') }}

                            <input class="form-control form-control-lg" type="hidden"
                                value="" name="id" id="arrivee_id">
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

{{-- ---------------------------------------------------------------------- Modal ADD  ------------------------------------------------------------------------------------- --}}

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
                            <form action="{{ route('cour_arrivee.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col"> 
                                        <label for="">رقم المراسلة</label>
                                        <input class="form-control form-control-lg" type="text"  name="Num_courie"> 
                                    </div>
                                    <div class="col">
                                        <label for="">المرسل / الجهة المرسلة</label>
                                        <input class="form-control form-control-lg" type="text"  name="emetteur">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <label for="">تاريخ الارسال</label>
                                        <input class="form-control form-control-lg" type="date"  name="date_envoi"> 
                                    </div>
                                    {{-- <div class="col">
                                        <label for="">مرسلة الى</label>
                                        <input class="form-control form-control-lg" type="text"  name="envoye_a">
                                    </div> --}}
                                    <div class="col">
                                        <label for="">طبيعة المراسلة</label>
                                        {{-- <input class="form-control form-control-lg" type="text"  name="nature"> --}}
                                        <select class="form-control form-control-lg" name="type_id" id="" >  
                                            
                                            @foreach ($types as $type)
                                               <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                           @endforeach 
                                       </select>
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
                                        <label for="">الجهة المحول إليها		
                                        </label>
                                        {{-- <input class="form-control form-control-lg" type="text"  name="tranfere_a">  --}}
                                        <select class="form-control form-control-lg" name="bureau_id" id="">  
                                            
                                             @foreach ($bureaux as $bureau)
                                                <option value="{{ $bureau->id }}"> {{ $bureau->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="">تاريخ التحويل	    </label>
                                        <input class="form-control form-control-lg" type="date"  name="date_transfert"> 
                                    </div> 
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <div class="custom-control custom-checkbox" style="padding: 2.5rem 0 2rem 1.5rem;">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox11" name="obligation_repanse" value="1" checked="">
                                            <label for="customCheckbox11" class="custom-control-label">وجوب الرد على المراسلة ؟</label>
                                          </div>
                                        {{-- <input class="form-control form-control-lg" type="text"  name="obligation_repanse">  --}}
                                    </div>
                                    <div class="col">
                                        <div id="datelbl1">
                                            <label for="">تاريخ الرد</label>
                                            <input class="form-control form-control-lg" type="date"  name="date_reponse" id="datepickerresponse1">
                                        </div>
                                    </div> 
                                    <div class="col">
                                        <label for="" for="chooseFile">ملف المراسلة</label>
                                        <input class="form-control form-control-lg" type="file" name="file" id="chooseFile"> 
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
        function showAdd(){
            
    event.preventDefault();
    jQuery.noConflict();
            $('#modal-lg').modal('show');
        }
        function showEdit(id) {

            event.preventDefault();
    jQuery.noConflict();
        // console.log('--'+$('#arivee_'+id).children().eq(5)); 
        // console.log('--'+$('#arivee_'+id).children().eq(5).data('formatioid'));
        var form = document.getElementById("update_frm");
        var action ="{{ route('cour_arrivee.update',"") }}/"+id;
        form.action = action;
        // $('#edit_mdl #update_frm').attr("action",action);
        
        $('#edit_mdl input[name="id"]').val(id); 
        $('#edit_mdl input[name="Num_courie"]').val($('#arivee_' + id).children().eq(0).html()); 
        $('#edit_mdl input[name="emetteur"]').val($('#arivee_' + id).children().eq(1).html());
        $('#edit_mdl input[name="date_envoi"]').val($('#arivee_' + id).children().eq(2).html());
        // $('#edit_mdl input[name="envoye_a"]').val($('#arivee_' + id).children().eq(3).html());
        
        $('#edit_mdl input[name="objet"]').val($('#arivee_' + id).children().eq(3).html()); 
        $('#edit_mdl #typeid').val($('#arivee_' + id).children().eq(4).data('typeid'));
        $('#edit_mdl #bureauid').val($('#arivee_' + id).children().eq(5).data('bureauid'));
        $('#edit_mdl input[name="date_transfert"]').val($('#arivee_' + id).children().eq(6).html());
        
        $('#edit_mdl input[name="obligation_repanse"]').val($('#arivee_' + id).children().eq(7).html()); 
        $('#edit_mdl input[name="date_reponse"]').val($('#arivee_' + id).children().eq(8).html());
        $('#edit_mdl input[name="file"]').data($('#arivee_' + id).children().eq(9).html()); 
        // $('#edit_mdl input[name="objet"]').val($('#arivee_' + id).children().eq(5).data('formatioid'));
        $('#edit_mdl').modal('show');
        }
    //    Num_courie emetteur date_envoi envoye_a objet nature tranfere_a date_transfert obligation_repanse date_reponse file
        function showDelete(id) {  
            
    event.preventDefault();
    jQuery.noConflict();
        var form = document.getElementById("destroy_frm");
        var action ="{{ route('cour_arrivee.destroy',"") }}/"+id;
        form.action = action;
        $('#delete_mdl #arrivee_id').val($('#arivee_' + id).children().eq(0).html());

        $('#delete_mdl').modal('show');
        }

        function showpdf(link){
            
    event.preventDefault();
    jQuery.noConflict();
            var path=$(link).data("path");
            $("#showpdfmodal #showmodaliframe").attr("src",path) ;
            $("#showpdfmodal #file_title").html(path);                                                                                   
            
            $("#showpdfmodal").modal("show");
        } 
           
    </script>
    <script>
        $(document).ready(function(){
            $("#customCheckbox1").click(function(){
                // $("#datepickerresponse").toggle('fast',()=>{$("#datepickerresponse").attr( "disabled", false )});
                $("#datelbl").toggle('fast',()=>{$("#datelbl").attr( "disabled", false )});
            }); 
         
        });
        </script>
    <script>
        $(document).ready(function(){
            $("#customCheckbox11").click(function(){
                // $("#datepickerresponse1").toggle('fast',()=>{$("#datepickerresponse1").attr( "disabled", false )});
                $("#datelbl1").toggle('fast',()=>{$("#datelbl1").attr( "disabled", false )});
            });  
         
        });
        </script>
@endsection
