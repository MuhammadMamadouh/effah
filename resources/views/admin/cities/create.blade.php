@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    المحافظات@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('cities.store')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم المحافظة  باللغة العربية</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{old('ar_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>اسم المحافظة  باللغة الانجليزية</label>
                                    <input data-validation="required" type="text"  name="en_title" id="en_title" value="{{old('en_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">الدولة<span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="country_id"  class="form-control">
                                    <option selected disabled value="">  إختر الدولة</option>
                                    @foreach($countries as $country)
                                    <option value=" {{$country->id}}">  {{$country->ar_title}}</option>
                                       @endforeach
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
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
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
