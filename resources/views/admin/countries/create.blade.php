@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
{{trans('main.Countries')}}@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('countries.store')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم الدولة  باللغة العربية</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{old('ar_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم الدولة  باللغة الانجليزية</label>
                                    <input data-validation="required" type="text"  name="en_title" id="en_title" value="{{old('en_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-group m-t-40 row @error('phone_code') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">مفتاح الدولة <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('phone_code') form-control-danger @enderror" type="text" name="phone_code" id="email_code" value="{{old('phone_code')}}"   required autocomplete="phone"
                                       autofocus>
                                @error('phone_code') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label>العلم</label>
                            <input data-validation="required" type="file" name="flag" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                            @error('flag') <small class="form-control-feedback"> </small> @enderror

                        </div>


                        <div class="form-group m-t-40 row">
                            <div class="col-10 offset-md-2">
                                <input type="submit" class="btn btn-success form-control" value="{{trans('main.Create')}}" name="submut"
                                       style="color:#fff; font-weight: 400; font-size: 20px">
                            </div>
                        </div>
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

