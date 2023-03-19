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
                    <h1 class="m-0">Les contactx D'envoi جداول الإرسال</h1>
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
                {{-- <span class="badge bg-purple">12 contacts</span> --}}
                <i class="fas fa-plus"></i> Ajouter
            </a> 
            <a class="btn btn-app bg-success" href="{{ url('contacts1') }}">
                {{-- <span class="badge bg-purple">12 contacts</span> --}}
                <i class="fas fa-plus"></i> Show 
            </a>
            <div style="display: inline-block; width: 250px;   height:50px">
                <div class="info-box shadow-none">
                <span style="width:50px; height:50px" class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
  
                <div class="info-box-content" >
                  <span class="info-box-text">Shadows</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>
            <br><br>
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
                                <th>اسم جهة الإتصال</th>
                                <th> 1 رقم الهاتف </th>
                                <th> رقم الهاتف 2</th>
                                <th>الفاكس</th>
                                <th>Email 1</th>
                                <th>Email 2</th>
                                <th>العنوان </th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr id='contact_{{ $contact->id }}'>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->nom_contact }}</td>
                                    <td><span class="badge badge-success" style="font-size:18px;">{{ $contact->telephone }}</span></td>
                                    <td>{{ $contact->telephone2 }}</td>
                                    <td>{{ $contact->fax }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->email2 }}</td>
                                    <td>{{ $contact->adresse }}</td>
                                    <td>

                                        
                                        <a class="btn btn-info btn-sm" onclick="showMDL({{ $contact->id }})"
                                            id="btn_edit"> <i class="fas fa-pencil-alt"> </i> عرض </a>
                                        <a class="btn btn-info btn-sm" onclick="showEdit({{ $contact->id }})"
                                                id="btn_edit"> <i class="fas fa-pencil-alt"> </i> تعديل </a>
                                        <a class="btn btn-danger btn-sm" onclick="showDelete({{ $contact->id }})"
                                            id="btn_delete"> <i class="fas fa-trash"> </i> حذف </a>

                                        
                                    </td>

                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>اسم جهة الإتصال</th>
                                <th> 1 رقم الهاتف </th>
                                <th> رقم الهاتف 2</th>
                                <th>الفاكس</th>
                                <th>Email 1</th>
                                <th>Email 2</th>
                                <th>العنوان </th>
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
                                <div class="modal fade"  id="edit_mdl">
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
                                                        <h3 class="card-title">Modifier une contact</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="" id="update_frm" method="POST" enctype="multipart/form-data"> @csrf 
                                                            {{ method_field('PATCH') }} 

                                                            <div class="row">
                                                                <div class="col"> 
                                                                    <label for=""> اسم جهة الإتصال</label>
                                                                    <input class="form-control form-control-lg" type="text" hidden  name="id" value="">
                                                                    <input class="form-control form-control-lg" type="text"  name="nom_contact" value=""> 
                                                                </div>
                                                                <div class="col">
                                                                    <label for=""> 1 رقم الهاتف  </label>
                                                                    <input class="form-control form-control-lg" type="text"  name="telephone" value=""> 
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col"> 
                                                                    <label for=""> 2 رقم الهاتف </label>
                                                                    <input class="form-control form-control-lg" type="text"  name="telephone2" value=""> 
                                                                </div>
                                                                <div class="col">
                                                                    <label for=""> الفاكس</label>
                                                                    <input class="form-control form-control-lg" type="text"  name="fax" value=""> 
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col"> 
                                                                    <label for=""> Email 1</label>
                                                                    <input class="form-control form-control-lg" type="text"  name="email" value=""> 
                                                                </div>
                                                                <div class="col">
                                                                    <label for=""> Email 2</label>
                                                                    <input class="form-control form-control-lg" type="text"  name="email2" value=""> 
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col"> 
                                                                    <label for="">العنوان  		
                                                                    </label>
                                                                    <textArea class="form-control form-control-lg" type="text"  name="adresse" > </textArea>
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
                                {{-- ---------------------------------------------------------------------- MODAL SHOW------------------------------------------------------------------------------------- --}}
                                <div class="modal fade" id="showMDL">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">عرض جهة اتصال</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    
                                                        
                                                                        
                                                                            <div class="card card-primary" id="cardshow">
                                                                                <div class="card-header">
                                                                                <h3 class="card-title" id="nom_contact"></h3>
                                                                                </div>
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body" >
                                                                                    <strong><i class="fas fa-phone mr-1"></i> Telephone</strong>
                                                                    
                                                                                    </p>
                                                                                    <span class="badge badge-success"
                                                                                            style="font-size:18px;" id="telephone">{{ $contact->telephone }}</span>

                                                                                    <span class="badge badge-warning"
                                                                                            style="font-size:18px;" id="telephone2">{{ $contact->telephone2 }}</span>
                                                                                    
                                                                                    <hr>
                                                                                    <strong><i class="fas fa-fax mr-1"></i></i> Fax</strong>
                                                                                    </p>
                                                                                    <span class="badge badge-info"
                                                                                            style="font-size:18px;" id="fax">{{ $contact->fax }}</span>
                                                                                    
                                                                                    <hr>
                                                                                    <strong><i class="fas fa-envelope mr-1"></i> Emails</strong>
                                                                                        </p>
                                                                                    <span class="badge badge-success"
                                                                                            style="font-size:18px;" id="email">{{ $contact->email }}</span>
                                                                                    <span class="badge badge-warning"
                                                                                            style="font-size:18px;" id="email2">{{ $contact->email2 }}</span>

                                                                                    <hr>
                                                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>
                                                                                    <p class="text-muted" id="adresse">{{ $contact->adresse }}</p>
                                                                                
                                                                
                                                                                
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>

                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                                </div>
                                                            </div>
                                                        
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                                {{-- ---------------------------------------------------------------------- MODAL DELETE ------------------------------------------------------------------------------------- --}}
                                <div class="modal fade"  id="delete_mdl">
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
                                                        <h3 class="card-title">Supprimer une contact</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="" id="destroy_frm" 
                                                            method="POST" enctype="multipart/form-data"> @csrf
                                                            @csrf_field {{ method_field('delete') }}

                                                            <input class="form-control form-control-lg" type="hidden"
                                                                value="{{ $contact->id }}" name="id">
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
{{-- ---------------------------------------------------------------------- ADD MODEL ------------------------------------------------------------------------------------- --}}                            
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
                            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col"> 
                                        <label for=""> اسم جهة الإتصال</label>
                                        <input class="form-control form-control-lg" type="text"  name="nom_contact"> 
                                    </div>
                                    <div class="col">
                                        <label for=""> 1 رقم الهاتف  </label>
                                        <input class="form-control form-control-lg" type="text"  name="telephone"> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <label for=""> 2 رقم الهاتف </label>
                                        <input class="form-control form-control-lg" type="text"  name="telephone2"> 
                                    </div>
                                    <div class="col">
                                        <label for=""> الفاكس</label>
                                        <input class="form-control form-control-lg" type="text"  name="fax"> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <label for=""> Email 1</label>
                                        <input class="form-control form-control-lg" type="text"  name="email"> 
                                    </div>
                                    <div class="col">
                                        <label for=""> Email 2</label>
                                        <input class="form-control form-control-lg" type="text"  name="email2"> 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col"> 
                                        <label for="">العنوان  		
                                        </label>
                                        <textArea class="form-control form-control-lg" type="text"  name="adresse"> </textArea>
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

        // console.log('--'+$('#arivee_'+id).children().eq(5)); 
        // console.log('--'+$('#arivee_'+id).children().eq(5).data('formatioid'));
        var form = document.getElementById("update_frm");
        var action = "{{ route('contacts.update', '') }}/" + id;
        form.action = action;
        // $('#edit_mdl #update_frm').attr("action",action);

        $('#edit_mdl input[name="id"]').val(id);
        $('#edit_mdl input[name="nom_contact"]').val($('#contact_' + id).children().eq(1).html());
        $('#edit_mdl input[name="telephone"]').val($('#contact_' + id+'').children().eq(2).children().html());
        $('#edit_mdl input[name="telephone2"]').val($('#contact_' + id).children().eq(3).html());
        $('#edit_mdl input[name="fax"]').val($('#contact_' + id).children().eq(4).html());
        $('#edit_mdl input[name="email"]').val($('#contact_' + id).children().eq(5).html());
        $('#edit_mdl input[name="email2"]').val($('#contact_' + id).children().eq(6).html());
        $('#edit_mdl input[name="adresse"]').val($('#contact_' + id).children().eq(7).html());

        jQuery.noConflict();
        $('#edit_mdl').modal('show');
        }
        //  id nom_contact telephone telephone2 fax email email2 adresse

        function showDelete(id) {
        var form = document.getElementById("destroy_frm");
        var action = "{{ route('contacts.destroy', '') }}/" + id;
        form.action = action;
        $('#delete_mdl #contacts_').val(id);
        jQuery.noConflict();
        $('#delete_mdl').modal('show');
        }


        function showMDL(id){
            $("#cardshow #nom_contact").html("Contact # "+id+"  -- <b>"+$('#contact_' + id).children().eq(1).html()+"</b>") ;
            $("#cardshow #telephone").html($('#contact_' + id).children().eq(2).children().html()) ;
            $("#cardshow #telephone2").html($('#contact_' + id).children().eq(3).html()) ;
            $("#cardshow #fax").html($('#contact_' + id).children().eq(4).html()) ;
            $("#cardshow #email").html($('#contact_' + id).children().eq(5).html()) ;
            $("#cardshow #email2").html($('#contact_' + id).children().eq(6).html()) ;
            $("#cardshow #adresse").html($('#contact_' + id).children().eq(7).html()) ;
            $("#showMDL").modal("show");
        }
    </script>
@endsection
