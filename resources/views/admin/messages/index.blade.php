@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
الرسائل@endsection


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
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                <?php
                                $count=1;
                                ?>
                                @if($messages->count()!=null)
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>

                                        <th class="">الإسم</th>
                                        <th class="">البريد الإلكتروني</th>
                                        <th class="">الهاتف </th>
                                        <th class="">الرسالة </th>



                                        <th class="text-right">
                                          {{trans('main.Delete')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($messages as $city)

                                        <tr>
                                            <td class=""> {{$count++}}</td>
                                            <td class="">{{$city->name}}</td>
                                            <td class="" style="max-width: 30%">{{$city->email}}</td>
                                            <td class="" style="max-width: 30%">{{$city->phone}}</td>
                                            <td class="" style="max-width: 30%">{{$city->content}}</td>


                                       <td class="text-right">
                                                <button class="btn btn-sm btn-danger delete"
                                                        id="{{$city->id}}">
                                                    <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                                </button>
                                            </td>

                                        </tr>

                                    @endforeach

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
                        url: '{{route('messages.delete')}}',
                        type: 'DELETE',
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
