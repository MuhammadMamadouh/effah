@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/html5-editor/bootstrap-wysihtml5.css')}}" />

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.Payments')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}

@endsection

@section('content')
    <div class="main-content win-height">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <strong>عذرا!</strong> حدث خطأ ما فى ادخال البيانات.
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('msg'))
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert">×</a>
                <strong style="margin:auto">{!!Session::get('msg')!!}!</strong>
            </div>
        @elseif(Session::has('alert'))
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert">×</a>
                <strong style="margin:auto">{!!Session::get('alert')!!}!</strong>
            </div>

        @endif
      {{--  <div class="breadcrumb-box">
            <h1>الصفحة الرئيسية
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('dashboard')}}">الصفحة الرئيسية</a></li>
                <li class="active">كل التحويلات الجديدة</li>
            </ol>
        </div>--}}


        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="DTable table table-striped  table-bordered" cellspacing="0" width="100%">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>اسم البنك </th>
                                <th>صورة التحويل </th>
                                  <th>رقم الحساب  </th>
                                <th>المبلغ</th>
                                 <th> قبول</th>
                                <th>حذف</th>
                            </tr>

                            </thead>

                            <tbody>
<?php
 $cou=0;
 ?>
                            @foreach($payments as $ad)
                                <tr>
                                    <th scope="row">{{++$cou}}</th>

                                    <td class="test">
                                        {{Illuminate\Support\Str::limit($ad->user->name)}}
                                    </td>

                                    <td>
                                        {{Illuminate\Support\Str::limit($ad->bank->name,20)}}
                                    </td>

                                    <td >
                                        <img style="max-width=30px;max-height=330px" src="{{asset('/'.$ad->image)}}"
                                                                           class="img-responsive img-fancy">
                                    </td>
                                      <td>
                                        {{Illuminate\Support\Str::limit($ad->number,20)}}
                                    </td>
                                    <td>
                                        {{Illuminate\Support\Str::limit($ad->amount,20)}}
                                    </td>

                                    <td>
  <form action="{{route('payments.update' , $ad->id)}}"method="post">
      @method('PUT')
     {!! csrf_field() !!}
     <input type="hidden" name="method" value="PUT">

                                         <button type="submit"       class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                data-placement="top" title="قبول التحويل"><i class="fa fa-eye"></i></button>
                                                </form>
                                    </td>
                                    <td class="">
                                        <button class="btn btn-sm btn-danger delete"
                                                id="{{$ad->id}}">
                                            <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                        </button>
                                    </td>


                                    {{--   <td>
                                          <form action="{{route('payments.destroy' , $ad->id)}}"method="post">
                                              @method('put')

                                              {!! csrf_field() !!}
                                               <input type="hidden" name="method" value="DELETE">
                                                                                           <button type="submit"     onclick="return confirm('هل انت متأكد من حذف الحوالة لا يمكن استرجاع البيانات ?')"
                                                                                           class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                                                           data-placement="top" title="حذف"><i
                                                                                                    class="fa fa-trash-o"></i></button>
                                       </td>
   --}}



                                </tr>



                            @endforeach


                            </tbody>
                        </table>
                        {{--
                                                @if(Auth::user()->role_id==1)

                                                    <a href="{{url('admin/users/create')}}">
                                                        <button type="button" class="btn btn btn-deep-blue ">إضافة مستخدم</button>
                                                    </a>
                                                @endif
                        --}}
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
@section('footer')
    <script>
        $(document).ready(function () {


        });
    </script>

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example23').DataTable({
                dom: 'Bfrtip',

                buttons: [
                    { extend: 'copy', text: '{{trans('main.Copy')}}' },
                    { extend: 'excel', text: '{{trans('main.Excel')}}' },
                    { extend: 'pdf', text: '{{trans('main.PDF')}}' },
                    { extend: 'print', text: '{{trans('main.Print')}}' }
                ],
                "language": {
                    "sProcessing":   "{{trans('main.sProcessing')}}",
                    "sLengthMenu":   "{{trans('main.sLengthMenu')}}",
                    "sZeroRecords":  "{{trans('main.sZeroRecords')}}",
                    "sInfo":         "{{trans('main.sInfo')}}",
                    "sInfoEmpty":    "{{trans('main.sInfoEmpty')}}",
                    "sInfoFiltered": "{{trans('main.sInfoFiltered')}}",
                    "sInfoPostFix":  "",
                    "sSearch":       "{{trans('main.sSearch')}}:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "{{trans('main.sFirst')}}",
                        "sPrevious": "{{trans('main.sPrevious')}}",
                        "sNext":     "{{trans('main.sNext')}}",
                        "sLast":     "{{trans('main.sLast')}}"
                    }
                }
            });
            //End
            $(document).on('click', '.delete', function () {
                var id = $(this).attr('id');
                console.log(id)
                swal({
                    title: "{{trans('main.Message_title_attention')}}",
                    text: "{{trans('main.Message_warning')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{trans('main.Delete')}}",
                    cancelButtonText: "{{trans('main.Cancel')}}",
                    okButtonText: "{{trans('main.Accept')}}",
                    closeOnConfirm: false
                }, function () {
                    console.log(id)
                    $.ajax({
                        url: '{{route('payments.delete')}}',
                        type: 'post',
                        data: {id: id},
                        success: function (data) {
                            console.log(data)
                            if (data.error==1) {
                                swal({
                                    title: "{{trans('main.Message_title_attention')}}",
                                    text: "{{trans('main.Message_fail')}}",
                                    type: "error",
                                    confirmButtonText: "{{trans('main.Accept')}}"
                                });
                            } else {
                                swal({
                                    title: "{{trans('main.Message_title_congratulation')}}",
                                    text: "{{trans('main.Message_success')}}",
                                    type: "success",
                                    confirmButtonText: "{{trans('main.Accept')}}"
                                }, function () {
                                    location.reload();
                                });
                            }
                        }
                    });
                });
            });


        });//end jquery
    </script>
@endsection
