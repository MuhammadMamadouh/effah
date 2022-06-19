@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    الإبلاغات
@endsection



@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">{{trans('main.Export')}}</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                            @if($reports->count()!=null)
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th class="">المبلغ </th>
                                    <th class="">المبلغ عنه </th>
                                    <th class="">الإبلاغ </th>
                                    <th class="">الرد </th>
                                    <th class="">وقت الرد </th>
                                    <th class="">وقت الإبلاغ </th>
                                    <th class="">
                                        {{trans('main.Edit')}}
                                    </th>  <th class="">
                                        {{trans('main.Delete')}}
                                    </th>

                                </tr>
                                </thead>
                                @foreach($reports as $report)

                                    <tr>
                                        <td class=""> {{$loop->iteration}}</td>
                                        <td class=""> {{$report->reporter->fullName}}</td>
                                        <td class=""> {{$report->reported->fullName}}</td>
                                        <td class=""> {{$report->content}}</td>
                                        <td class=""> {{$report->reply}}</td>
                                        <td class=""> {{$report->reply_at ? \Carbon\Carbon::parse($report->reply_at)->format('Y-m-d H:i') : ''}}</td>
                                        <td class=""> {{$report->created_at ? \Carbon\Carbon::parse($report->created_at)->format('Y-m-d H:i') : ''}}</td>


                                        <td class="">
                                            <a class="btn btn-sm btn-warning "
                                               href="{{route('reports.edit',$report->id)}}">
                                                <i class="mdi mdi-account-settings"></i>رد على الإبلاغ
                                            </a>
                                        </td>

                                        <td class="">
                                            <button class="btn btn-sm btn-danger delete"
                                                    id="{{$report->id}}">
                                                <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach

                            @else
                                <div class="alert alert-danger" role="alert">
                                    {{trans('main.no_row')}}
                                </div>
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
        $( document ).ready(function() {
            console.log( "ready!" );
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
                        url: '{{route('colleges.delete')}}',
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
                alert('hhh');
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
                        url: '{{url('admin/points/')}}'+'/'+id+'{{('/edit')}}',
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
@endsection
