@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    الجامعات@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="forms-sample" method="post" action="{{route('universities.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم الجامعة   </label>
                                    <input data-validation="required" type="text"  name="name" id="ar_title" value="{{old('name')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
{{--
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم التصنيف  باللغة الانجليزية</label>
                                    <input data-validation="required" type="text"  name="en_title" id="en_title" value="{{old('en_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
--}}

                      {{--  <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>رسوم التطبيق </label>
                                    <input data-validation="required" type="number"  name="price" id="en_title" value="{{old('price')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
--}}



                        <button type="submit" class="btn btn-gradient-primary mr-2">إضافة</button>
                    </form>                </div>
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

