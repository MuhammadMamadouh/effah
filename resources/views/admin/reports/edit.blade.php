@extends('admin.layouts.layout')

@section('header')
<link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection

@section('page-title')
{{-- عنوان الصفحة --}}
الإبلاغات
@endsection


@section('page-create')
{{-- اضافة زرار--}}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                <form class="forms-sample" method="post" action="{{route('reports.update',$report->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>الرد على الإبلاغ </label>
                                <textarea data-validation="required" type="text" name="reply"
                                    class="form-control">{{$report->reply}}</textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">الرد /تعديل الرد</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    $(document).ready(function () {
            $('.dropify').dropify();

        });
</script>
<script>
    $(document).ready(function () {


        });
</script>
@endsection
