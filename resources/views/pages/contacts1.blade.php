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
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid" style="background-color: #F4F6F9">
            <div class="card-body pb-0">
                <div class="row">
                    @foreach ($contacts as $contact)
                        <div class="col-12 col-sm-4 col-md-2 d-flex align-items-stretch flex-column">
                            <div class="card bg-gray  d-flex flex-fill" style="box-shadow: 0 4px 3px rgba(0,0,0,.225),0 1px 3px rgba(0,0,0,.5)">
                                <div class="card-header  bg-secondary border-bottom-1" style="border-bottom: 1px solid white;background-color:#262626  !important">
                                    {{-- Contact # {{ $contact->id }} --}}
                                    <h5 style="font-size: 0.8vw;"><b>{{ $contact->nom_contact }}</b></h5>
                                </div>
                                <div class="card-body pt-0"  style="background-color: #FFF; color: #000;">
                                    <div class="row">
                                       
                                        <div class="row"  style="padding-top: 10px;padding-left: 10px">

                                            
                                                <p class="text-muted text-sm"  style="color:white"><i class="fas fa-lg fa-phone"></i> Tel : 
                                                    <span class="badge badge-success"
                                                        style="font-size:18px; ">{{ $contact->telephone }}</span> </p>
                                                {{-- <p class="text-muted text-sm"><i class="fas fa-lg fa-phone"></i> Tel 2   : <span class="badge badge-success" style="font-size:18px;">{{ $contact->telephone2 }}</span> </p> --}}
                                                <p class="text-muted text-sm"><i class="fas fa-lg fa-phone"></i> Fax : <span
                                                        class="badge badge-success"
                                                        style="font-size:18px;">{{ $contact->fax }}</span> </p>
                                            
                                            {{-- <div class="col-2">
                              <p class="text-muted text-sm"><i class="fas fa-lg fa-envelope"></i> Email 1 : <span class="badge badge-success" style="font-size:14px;">{{ $contact->email }}</span> </p>
                              <p class="text-muted text-sm"><i class="fas fa-lg fa-envelope"></i> Email 2 : <span class="badge badge-success" style="font-size:14px;">{{ $contact->email2 }}</span> </p>
                              
                          </div> --}}
                                        </div>
                                        
                                        {{-- <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                        </ul> --}}

                                        {{-- <div class="col-5 text-center">
                        <img src="{{ URL::asset('/assets/dist/img/user2-160x160.jpg') }}" alt="user-avatar" class="img-circle img-fluid">
                      </div> --}}
                                    </div>
                                </div>
                                <div class="card-footer bg-gray-dark "  style="background-color:#e5e5e5 !important;color:#000 !important">
                                    <div class="text-left">
                                        <i class="fas fa-lg fa-home"> </i>
                                         Address: <br>
                                            {{ $contact->adresse }}
                                        {{-- <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
@endsection
