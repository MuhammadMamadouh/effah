@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')

الأسئلة
    {{-- عنوان الصفحة --}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}


    <a href="{{route('question.create')}}" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>{{trans('main.Create')}}</a>


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
                                @if($questions->count()!=null)
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>

                                        <th class="">السؤال </th>
                                        <th class="">الجنس</th>
                                        <th class="">الترتيب</th>
                                        <th class="">التفعيل</th>



                                       {{-- <th class="text-right">
                                          {{trans('main.Delete')}}
                                        </th>--}}  <th class="text-right">
                                            نوع السؤال
                                        </th>  <th class="text-right">
                                            طبيعه السؤال
                                        </th>  <th class="text-right">
                                          {{trans('main.Edit')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($questions as $country)

                                        <tr>
                                            <td class=""> {{$count++}}</td>
                                            <td class="" style="max-width: 30%">{{$country->content}}</td>

                                            <td class="">@if($country->gender==0)<span class="badge badge-success">الجميع</span>
                                                @elseif($country->gender==1)<span class="badge badge-primary">للشباب</span>
                                                @else
                                                    <span class="badge badge-danger">للفتيات</span>
                                                @endif
                                            </td>
                                         <td class="" style="max-width: 30%">
                                             <form style="display: inline" action="{{route('question.order',$country->id)}}">
                                                 @method('PUT')
                                                 @csrf
                                                  <input type="hidden" name="type" value="1">
                                                 <button type="submit" class="btn btn-sm btn-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                         <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                                     </svg>
                                                 </button>
                                             </form>
                                             <form style="display: inline" action="{{route('question.order',$country->id)}}">
                                                 @method('PUT')
                                                 @csrf
                                                 <input type="hidden" name="type" value="-1">
                                                 <button type="submit" class="btn btn-sm btn-danger">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                 <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                             </svg>
                                                 </button>
                                             </form>
                                         </td>
                                            <td class="" style="max-width: 30%">
                                                <form style="display: inline" action="{{route('question.active',$country->id)}}" >
                                                    @method("PUT")
                                                    @csrf
                                                    @if($country->is_active	==1)
                                                        <button type="submit" class="btn btn-sm btn-danger">إيقاف</button>
                                                    @else
                                                        <button type="submit" class="btn btn-sm btn-success">تفعيل</button>
                                                    @endif
                                                </form>
                                            </td>



                                          {{--  <td class="text-right">
                                                <button class="btn btn-sm btn-danger delete"
                                                        id="{{$country->id}}">
                                                    <i class="fa fa-trash-alt"></i> {{trans('main.Delete')}}
                                                </button>
                                       </td>--}}
                                            <td class="text-right">@if($country->type==1)<span class="badge badge-success">نصي</span>
                                                @elseif($country->type==2)<span class="badge badge-primary">إختيار واحد</span>
                                                @elseif($country->type==4)<span class="badge badge-info"> رقمية</span>
                                                @else
                                                    <span class="badge badge-danger">إختيار متعدد</span>
                                                @endif
                                            </td>  <td class="text-right">@if($country->leve==1)<span class="badge badge-success">متعلق باجابة غيره  </span>
                                                @else
                                                    <span class="badge badge-danger"> مستقل</span>
                                                @endif
                                            </td>
                                       <td class="text-right">
                                                <a class="btn btn-sm btn-warning "
                                                   href="{{route('question.edit',$country->id)}}">
                                                    <i class="mdi mdi-account-settings"></i>{{trans('main.Edit')}}
                                                </a>
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
                        url: '{{route('question.delete')}}',
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
