@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
الإجابات
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('answers.update',$answer->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">السؤال<span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="category_id"  class="form-control">
                                    <option selected disabled value="">  إختر السؤال</option>
                                    @foreach($questions as $country)
                                        <option @if($answer->qu_id==$country->id)selected @endif value=" {{$country->id}}">  {{$country->content}}</option>
                                    @endforeach
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>نص الإجابة</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{$answer->content}}" class="form-control"/>
                                </div>
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

