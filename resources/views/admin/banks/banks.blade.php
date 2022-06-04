@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.banks')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
    <button class="btn pull-right hidden-sm-down btn-danger" name="bulk_delete" id="bulk_delete">حذف المحدد <i
            class="mdi mdi-delete"></i>
    </button>
    <a href="{{route('bank.create')}}" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>{{trans('main.Create')}}</a>

@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">{{trans('main.Export')}}</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                            <?php
                            $count=1;
                            ?>
                            @if($banks->count()!=null)
                                <thead>



                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>اسم البنك</th>
                                    <th>رقم الحساب</th>
                                    <th>رقم الايبان</th>
                                    <th class="">
                                        {{trans('main.Delete')}}
                                    </th>
                                    <th class="text-right">
                                        {{trans('main.Edit')}}
                                    </th>
                                </tr>

                                </thead>
                                    <tbody>
                                    @foreach($banks as $bank)
                                        <tr>
                                            <td class="">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox{{$bank->id}}"
                                                           name="tickets_checkbox[]" value="{{$bank->id}}"
                                                           class="tickets_checkbox">
                                                    <label for="checkbox{{$bank->id}}"></label>
                                                </div></td>
                                            <th scope="row">{{$bank->id}}</th>

                                            <td class="">
                                                {{Illuminate\Support\Str::limit($bank->name,20)}}
                                            </td>

                                            <td class="">
                                                {{Illuminate\Support\Str::limit($bank->number,20)}}
                                            </td>

                                            <td class="">
                                                {{Illuminate\Support\Str::limit($bank->iban,20)}}
                                            </td>


                                            <td class="">
                                                <button class="btn btn-sm btn-danger delete"
                                                        id="{{$bank->id}}">
                                                    <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <button class="btn btn-sm btn-warning edit"id="{{$bank->id}}"
                                                  >
                                                    <i class="mdi mdi-account-settings"></i>{{trans('main.Edit')}}
                                                </button>
                                            </td>
                                        </tr>



                                        @endforeach


                                        </tbody>


                            @else

                                {{trans('main.no_row')}}

                            @endif

                        </table>
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
                        url: '{{route('bank.delete')}}',
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
            $(document).on('click', '.edit', function () {
                var id = $(this).attr('id');
                console.log(id)
                swal({
                    title: "{{trans('main.Message_title_attention')}}",
                    text: "{{trans('main.Message_warning')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{trans('main.Edit')}}",
                    cancelButtonText: "{{trans('main.Cancel')}}",
                    okButtonText: "{{trans('main.Accept')}}",
                    closeOnConfirm: false
                }, function () {

                    console.log(id)
                    $.ajax({
                        url: '{{url('admin/bank/')}}'+'/'+id+'{{('/edit')}}',
                        type: 'get',
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
                                    text: "{{trans('main.Message_edit_success')}}",
                                    type: "success",
                                    confirmButtonText: "{{trans('main.Accept')}}"
                                }, function () {
                                    var url= '{{url('admin/admins/')}}'+'/'+id+'{{('/edit')}}';

                                    window.location = url;
                                });
                            }
                        }
                    });
                });
            });


        });//end jquery
    </script>
    <script>  $(document).on('click', '#bulk_delete', function () {

            var id = [];
            $('.tickets_checkbox:checked').each(function () {
                id.push($(this).val());
            });
            if (id.length > 0) {
                swal({
                    title: "هل انت متاكد انك تريد حذف الحسابات ؟",
                    text: "لن يمكنك استعادة  الحسابات بعد الحذف.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "حذف الحسابات",
                    cancelButtonText: "الغاء",
                    okButtonText: "موافق",
                    closeOnConfirm: false
                }, function () {
                    $.ajax({
                        url: '{{route('bank.delete.account')}}',
                        type: 'post',
                        data: {id: id},
                        success: function (data) {
                            if (data.error.length > 0) {
                                swal({
                                    title: "لم تتم العملية",
                                    text: data.error,
                                    type: "error",
                                    confirmButtonText: "موافق"
                                });
                                /*
                                                                myToast('لم تتم العملية', data.error, 'buttom-left', '#ff6849', 'error', 3500, 6);
                                */
                            } else {
                                /*
                                                                myToast('عملية ناجحة', data.success, 'buttom-left', '#ff6849', 'success', 3500, 6);
                                */
                                swal({
                                    title: "تم الحذف",
                                    text: "تم حذف الحسابات بنجاح.",
                                    type: "success",
                                    confirmButtonText: "موافق"
                                }, function () {
                                    location.reload();
                                });
                            }
                        }
                    });
                });
            } else {
                swal({
                    title: "لم تتم العملية",
                    text: "برجاء تحديد  الحسابات المراد حذفها اولا.",
                    type: "error",
                    confirmButtonText: "موافق"
                });
            }


        })
    </script>
@endsection
