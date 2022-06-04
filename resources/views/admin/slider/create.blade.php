@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.ٍSliders')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('sliders.store')}}" enctype="multipart/form-data">
                        @csrf


{{--

                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Slider_type')}} <span
                                    class="text-danger"></span></label>
                            <div class="col-12">
                                <select class="form-control " name="type" id="type" >
                                    <option value="1">{{trans('main.Slider_type_for_mobile')}}</option>

                                </select>
                                @error('ar_description') <small class="form-control-feedback"> </small> @enderror
                            </div>
--}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>العنوان  باللغة العربية</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{old('ar_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>العنوان باللغة الانجليزية</label>
                                    <input data-validation="required" type="text"  name="en_title" id="en_title" value="{{old('en_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
     <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المحتوي  باللغة العربية</label>
                                    <input data-validation="required" type="text"  name="ar_content" id="ar_content" value="{{old('ar_content')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المحتوي باللغة الانجليزية</label>
                                    <input data-validation="required" type="text"  name="en_content" id="en_content" value="{{old('en_content')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>

                        <div  class=" form-group m-t-40 row @error('image') has-danger @enderror">
                            <label for="input-file-now-custom-1" class="col-2 col-form-label">{{trans('main.Slider_image')}}*</label>
                            <div class="col-10">
                                <input type="file" name="image" id="input-file-now-custom-1" required class="dropify" data-default-file="" />
                                @error('image') <small class="form-control-feedback"> </small> @enderror

                            </div>
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
