@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.Admins')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group m-t-40 row @error('name') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Admin_name')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('name') form-control-danger @enderror" type="text" name="name" id="name" value="{{old('name')}}"   required autocomplete="name"
                                       autofocus>
                                @error('name') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('email') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Admin_email')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('email') form-control-danger @enderror" type="email" name="email" id="email" value="{{old('email')}}"   required autocomplete="email"
                                       autofocus>
                                @error('email') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('phone') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">الهاتف <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('phone') form-control-danger @enderror" type="text" name="phone" id="email" value="{{old('phone')}}"   required autocomplete="phone"
                                       autofocus>
                                @error('phone') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-40 row @error('password') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Admin_password')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('password') form-control-danger @enderror" type="password" name="password" id="password" value="{{old('password')}}"   required autocomplete="password"
                                       autofocus>
                                @error('password') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div  class=" form-group m-t-40 row @error('image') has-danger @enderror">
                            <label for="input-file-now-custom-1" class="col-2 col-form-label">{{trans('main.Admin_image')}}</label>
                            <div class="col-10">
                                <input required type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
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

@endsection
