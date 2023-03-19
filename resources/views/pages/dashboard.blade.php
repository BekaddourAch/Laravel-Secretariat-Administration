@extends('layouts.master')


@section('page-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
{{-- <input type="checkbox" data-toggle="switchbutton" checked="false"  data-onstyle="success" id="switcho"> --}}
<input type="checkbox" data-toggle="switchbutton" checked="false" data-onlabel="تعطيل الحذف" data-offlabel="تفعيل الحذف" data-onstyle="danger" data-offstyle="success" id="switcho">
                    {{-- <h1 class="m-0">الواجهة الرئيسية</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6"> 
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1 </li>
                    </ol> --}}
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
                <!-- /.Left col -->
                <div class="col-lg-8">


                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $ariv_nbr }}</h3>

                                    <p>البريد الوارد</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-drafts"></i>
                                </div>
                                <a href="{{ url('cour_arrivee') }}" class="small-box-footer">إطلع أكثر <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $dep_nbr }}</h3>

                                    <p>البريد الصادر</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-mail"></i>
                                </div>
                                <a href="{{ url('cour_depart') }}" class="small-box-footer">إطلع أكثر <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $bor_nbr }}</h3>

                                    <p>جداول الارسال</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document"></i>
                                </div>
                                <a href="{{ url('/bordereaux') }}" class="small-box-footer">إطلع أكثر <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $cont_nbr }}</h3>

                                    <p>جهات الإتصال</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="{{ url('/contacts') }}" class="small-box-footer">إطلع أكثر <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-5 connectedSortable">

                            <!-- TO DO List -->
                            <div class="card bg-navy">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        المهام
                                    </h3>
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-primary " style="float:right;"><i class="fas fa-plus"></i> إضافة مهام</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <ul class="todo-list" data-widget="todo-list">
                                        @foreach ($todos as $todo)
                                            <li id="li-todo-{{ $todo->id }}">
                                                <span class="handle">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                {{-- <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" value="" name="date6" id="dateCheck6">
                                                    <label for="dateCheck6"></label>
                                                </div> --}}
                                                <span class="text">{{ $todo->id }}</span>
                                                <span class="text">{{ $todo->object }}</span>
                                                <small class="badge badge-secondary"><i class="far fa-clock"></i>
                                                    {{ $todo->created_at->diffForHumans() }}</small>
                                                
                                                    {{-- <i class="fas fa-edit"></i> --}}
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                         

                                                    {{-- <button class="deleteRecord" data-id="{{ $todo->id }}" >Delete Record</button> --}}
                                                    <a href="javascript:void(0);" style=" visibility: hidden;"  class="deleteRecord" data-id="{{ $todo->id }}"  data-route="todo">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    {{-- <a   data-toggle="modal"  onclick="deleteMdl(this);" href="javascript:void(0);" data-theid="{{ $todo->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a> --}}
                                                <div class="tools"></div>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

                                </div>
                            </div>
                            <!-- /.card -->

                        </section>
                        <div class="modal fade" id="addModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">إضافة مهام </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card card-success">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-body">
                                                <form action="{{ route('todo.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="">نص المهمة </label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="object">
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <button type="submit" class="btn btn-primary">حفظ</button>

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


                        {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
                        <section class="col-lg-7 connectedSortable">

                            <!-- TO DO List -->
                            <div class="card bg-indigo" style="max-height:600px;min-height:600px;">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        جدول المواعيد
                                    </h3>
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addModalDates"
                                        class="btn btn-primary " style="float:right;"><i class="fas fa-plus"></i> إضافة
                                        موعد </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <ul class="todo-list" data-widget="todo-list">
                                        <div class="card">
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <table class="table table-sm bg-indigo" style="max-height:550px;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>الموعد</th>
                                                            <th>الاهمية</th>
                                                            <th>التاريخ</th>
                                                            <th style="width: 40px">الساعة</th>
                                                            <th style="width: 40px">حذف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($dates as $date)
                                                            <tr id="li-date-{{ $date->id }}">
                                                                <td>{{ $date->id }}.</td>
                                                                <td>{{ $date->title }}.</td>
                                                                <td>{{ $date->type }}</td>
                                                                <td>
                                                                    {{ $date->date }}
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-warning">{{ $date->hour }}</span>
                                                                </td>
                                                                <td>
                                                                    
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                <a href="javascript:void(0);"   style=" visibility: hidden;"  class="deleteRecord" data-id="{{ $date->id }}" data-route="date">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>

                                    </ul>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

                                </div>
                            </div>
                            <!-- /.card -->




                            <div class="modal fade" id="addModalDates">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">إضافة مواعيد </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('date.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for=""> موضوع الموعد </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="title">
                                                            </div>
                                                            <div class="col">
                                                                <label for=""> طبيعة الموعد </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="type">
                                                            </div>
                                                            <div class="col">
                                                                <label for=""> تاريخ الموعد </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="date">
                                                            </div>
                                                            <div class="col">
                                                                <label for=""> الساعة </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="hour">
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <button type="submit" class="btn btn-primary">حفظ</button>

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



                        </section>


                    </div>
                    <!-- /.card-body -->
                </div>




                {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
                <section class="col-lg-4 connectedSortable">
                    <div class="card bg-gray-dark ">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fas fa-phone"></i> دليل الهاتف الداخلي</h3>
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addInterphone"
                                class="btn btn-primary float-right" style="float: right;"><i
                                    class="fas fa-plus"></i>إضافة رقم </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive" style="max-height:300px;">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>الدائرة</th>
                                            <th>المكتب</th>
                                            <th>رقم الهاتف</th>
                                            <th style="width: 40px">Label</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($phones as $phone)
                                            <tr id="li-phones-{{ $phone->id }}">
                                                <td>{{ $phone->id }}.</td>
                                                <td>{{ $phone->departmnt }}</td>
                                                <td> {{ $phone->name }} </td>
                                                <td>
                                                    <strong class="badge badge-{{ $phone->color }}"
                                                        style="font-size:18px">{{ $phone->phone }}</strong>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"   style=" visibility: hidden;"  class="deleteRecord" data-id="{{ $phone->id }}" data-route="phones">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>




                    <div class="modal fade" id="addInterphone">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">إضافة رقم هاتف داخلي </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-success">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('phones.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for=""> اسم الدائرة </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="departmnt">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">إسم المكتب </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="name">
                                                    </div>
                                                    <div class="col">
                                                        <label for=""> رقم هاتف المكتب </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="phone">
                                                    </div>
                                                </div>
                                                <br>

                                                <button type="submit" class="btn btn-primary">حفظ</button>

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


                    <div class="card  bg-gray-dark">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fas fa-phone"></i> دليل هواتف الموظفين</h3>
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addEmployeephone"
                                class="btn btn-primary " style="float: right;"><i class="fas fa-plus"></i> إضافة رقم</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive" style="max-height:300px;">
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>الاسم واللقب</th>
                                            <th>الوظيفة</th>
                                            <th>رقم الهاتف</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr id="li-employee-{{ $employee->id }}">
                                                <td>{{ $employee->id }}.</td>
                                                <td>{{ $employee->name }}</td>
                                                <td> {{ $employee->job }} </td>
                                                <td>
                                                    <strong class="badge badge-success"
                                                        style="font-size:18px">{{ $employee->phone }}</strong>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);"   style=" visibility: hidden;"  class="deleteRecord" data-id="{{ $employee->id }}" data-route="employee">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>




                    <div class="modal fade" id="addEmployeephone">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">إضافة رقم هاتف داخلي لموظف </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-success">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('employee.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for=""> اسم الموظف </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="name">
                                                    </div>
                                                    <div class="col">
                                                        <label for="">إسم الوظيفة </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="job">
                                                    </div>
                                                    <div class="col">
                                                        <label for=""> رقم الهاتف </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            name="phone">
                                                    </div>
                                                </div>
                                                <br>

                                                <button type="submit" class="btn btn-primary">حفظ</button>

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

                </section>

            </div>
            <!-- /.row (main row) -->



            {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}


                                {{-- ----------------------------------------------------------------------  ------------------------------------------------------------------------------------- --}}
                                {{-- ---------------------------------------------------------------------- MODAL DELETE ------------------------------------------------------------------------------------- --}}
                                <div class="modal fade" id="deleteMdl">
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
                                                        <h3 class="card-title" id="title">kk </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="" id="frm_delete"
                                                            method="POST" enctype="multipart/form-data"> @csrf
                                                            @csrf_field {{ method_field('delete') }}

                                                            <input class="form-control form-control-lg" 
                                                            type="hidden"
                                                                value="" name="id" id="input_to_delete">
                                                            <br>
                                                            <button type="submit" class="btn btn-primary">حذف</button>
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

            {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

        </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
<script>
    // $(document).ready(function() {
    //     $('#example').DataTable({
    //         "pagingType": "full_numbers"
    //     });
    // });
    document.getElementById('switcho').switchButton('off', true);
    function deleteMdl(link){
            var theid=$(link).data("theid");
            var route=$(link).data("route");
            $("#deleteMdl #input_to_delete").attr("value",theid ) ;
            $("#deleteMdl #title").html("Supprimer "+theid) ; 
            $("#deleteMdl #frm_delete").attr("action","{{ route('todo.destroy',"+theid+") }}" ) ;
            
            $("#deleteMdl").modal("show");
        }

        $(".deleteRecord").each(function() {

            $(this).click(function(){
                
                console.log($(this).parent());
            var id = $(this).data("id"); 
            var route = $(this).data("route"); 
            var type = $(this).data("type"); 
                    console.log(""+route+"/"+id);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
            {
                url: ""+route+"/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (response){
                    
                    if(typeof response.success  !== 'undefined'){
                        $("#li-"+route+"-"+id).remove();
                    }else{
                        console.log(response);
                    }
                }
            });
        });
       
        });

            $(function() {
                $('#switcho').change(function() {
                // var x = $(".deleteRecord");
                // $(".deleteRecord").hide();
                if ($(".deleteRecord").css('visibility') == 'hidden' ) {
                    
                    $(".deleteRecord").css('visibility','visible');
                    $(".deleteRecord").css('display','inline');
                    
                    // $(".deleteRecord").show();display: inline;
                } else {
                    $(".deleteRecord").css('visibility','hidden');
                    $(".deleteRecord").css('display','none');
                    // $(".deleteRecord").hide();
                }
            } );
            } );
</script>
@endsection