@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    الجنسيه@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="forms-sample" method="post" action="{{route('nationality.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>الجنسية للمذكر</label>
                                    <input data-validation="required" type="text"  name="name"  value="{{$category->name}}" class="form-control"/>
                                </div>
                            </div>

                        </div>   <div class="col-md-12">
                                <div class="form-group">
                                    <label>الجنسية للمؤنث</label>
                                    <input data-validation="required" type="text"  name="fName"  value="{{$category->fName}}" class="form-control"/>
                                </div>
                            </div>

                        </div>

                      {{--  <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>رسوم التطبيق</label>
                                    <input data-validation="required" type="number"  name="price" id="en_title" value="{{$category->price}}" class="form-control"/>
                                </div>
                            </div>

                        </div>--}}



                        <button type="submit" class="btn btn-gradient-primary mr-2">تعديل</button>
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

