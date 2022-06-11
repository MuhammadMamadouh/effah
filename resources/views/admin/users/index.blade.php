@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
{{-- عنوان الصفحة --}}
{{trans('main.Users')}}
@endsection


@section('page-create')
{{-- اضافة زرار--}}

@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{trans('main.Export')}}</h4>
                <div class="table-responsive m-t-40">
                    <form action="{{url("admin/users/savepoints")}}" method="post" class="form-horizontal">
                        @csrf
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">

                            <div class="form-group">
                                <label class="col-">النقاط</label>
                                <input type="text" name="points">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                            @if($users->count()!=null)
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>

                                    <th class="">{{trans('main.User_name')}} </th>
                                    <th class="">الاسم الثاني </th>
                                    <th class="">النوع </th>
                                    <th class="">{{trans('main.mobile')}} </th>
                                    <th class="">{{trans('main.Admin_image')}}</th>
                                    <th class="">{{trans('main.points')}}</th>

                                    <th class="">التحكم</th>
                                    <th class="">البيانات</th>
                                    <th><input type="checkbox" name="" id="check_all"></th>


                                </tr>
                            </thead>
                            @foreach($users as $admin)

                            <tr>
                                <td class=""> {{$loop->iteration}}</td>
                                <td class="">{{$admin->frName}}</td>
                                <td class="">@if($admin->lsName){{$admin->lsName}}@else غير محدد @endif </td>
                                <td class="">
                                    @if($admin->gender==1)<span class="badge badge-primary">شاب</span>
                                    @else
                                    <span class="badge badge-danger">فتاة</span>
                                    @endif
                                </td>
                                <td class="">{{$admin->phone}}</td>

                                <td class="">
                                    @if($admin->image)
                                    <img src="{{asset('/'.$admin->image)}}" width="50px" height="50px">
                                    @else
                                    <span style="color: #9d0d0d"> لم يحدد صورة شخصية</span>

                                    @endif
                                </td>
                                <td class="">{{$admin->points}}</td>
                                <td class="">
                                    <a href="{{route('users.active',$admin->id)}}" class="btn btn-success  btn-sm"
                                        style="padding: 10px">

                                        @if($admin->is_block==0)
                                        ايقاف
                                        @else
                                        تفعيل
                                        @endif
                                        <i class="mdi mdi-account-tie"></i>
                                    </a>
                                </td>
                                <td class="">
                                    <a href="{{route('users.show',$admin->id)}}" class="btn btn-success  btn-sm"
                                        style="padding: 10px">

                                        @if($admin->is_approved==0)
                                        مراجعة البيانات
                                        @else
                                        تم قبول البيانات
                                        @endif
                                        <i class="mdi mdi-account-tie"></i>
                                    </a>
                                </td>
                                <td><input class="check" type="checkbox" name="users[]" value="{{$admin->id}}"></td>
                                {{-- <td class="">@if($admin->type==1)عميل @else
                                    بائع
                                    @endif
                                </td>--}}


                                {{-- <td class="">
                                    <button class="btn btn-sm btn-danger delete" id="{{$admin->id}}">
                                        <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                    </button>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-warning " href="{{route('admins.edit',$admin->id)}}">
                                        <i class="mdi mdi-account-settings"></i>{{trans('main.Edit')}}
                                    </a>
                                </td>--}}
                            </tr>

                            @endforeach

                            @else

                            {{trans('main.no_row')}}

                            @endif
                        </table>
                    </form>
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
            $(document).on('click', '#check_all', function () {
                $('.check').attr('checked', this.checked);
            });
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
                        url: '#',
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
