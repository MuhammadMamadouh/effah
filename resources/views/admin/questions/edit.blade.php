@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
الاسئلة@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('question.update',$question->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">التصنيف<span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="category_id"  class="form-control">
                                    <option selected disabled value="">  إختر التصنيف</option>
                                    @foreach($categories as $country)
                                        <option @if($question->category_id== $country->id) selected @endif value=" {{$country->id}}">  {{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">الجنس <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="gender"  class="form-control">
                                    <option selected disabled value="">   إختر الجنس الموجه اليه </option>
                                    <option   @if($question->gender== 0) selected @endif   value="0">  الجنسين</option>
                                    <option  @if($question->gender== 1) selected @endif   value="1"> الذكور</option>
                                    <option  @if($question->gender== 2) selected @endif   value="2">  الإيناث</option>
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>نص السؤال</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{$question->content}}" class="form-control"/>
                                </div>
                            </div>

                        </div>


                        <div class="form-group m-t-40 row">
                            <div class="col-10 offset-md-2">
                                <input type="submit" class="btn btn-success form-control" value="{{trans('main.Edit')}}" name="submut"
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

