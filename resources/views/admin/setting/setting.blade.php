@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.Setting')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('setting.update',$settings->id)}} " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div  class=" form-group m-t-40 row @error('logo') has-danger @enderror">
                            <label for="input-file-now-custom-1" class="col-2 col-form-label">{{trans('main.Setting_logo')}}</label>
                            <div class="col-10">
                            <input type="file" name="logo" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('upload').'/'.$settings['logo']}}" />
                                @error('logo') <small class="form-control-feedback"> </small> @enderror

                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_en_title')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('en_title') form-control-danger @enderror" type="text" name="en_title" id="en_title" value="{{$settings['en_title']}}"   required autocomplete="en_title"
                                       autofocus>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('ar_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_ar_title')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('ar_title') form-control-danger @enderror" type="text" name="ar_title" id="ar_title" value="{{$settings['ar_title']}}"   required autocomplete="ar_title"
                                       autofocus>
                                @error('ar_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('android_app') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_android_app')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('android_app') form-control-danger @enderror" type="text" name="android_app" id="android_app" value="{{$settings['android_app']}}"   required autocomplete="android_app"
                                       autofocus>
                                @error('android_app') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('ios_app') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_ios_app')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('ios_app') form-control-danger @enderror" type="text" name="ios_app" id="ios_app" value="{{$settings['ios_app']}}"   required autocomplete="ios_app"
                                       autofocus>
                                @error('ios_app') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-40 row @error('address1') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_address1')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('address1') form-control-danger @enderror" type="text" name="address1" id="address1" value="{{$settings['address1']}}"   required autocomplete="address1"
                                       autofocus>
                                @error('address1') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-40 row @error('address2') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_address2')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('address2') form-control-danger @enderror" type="text" name="address2" id="address2" value="{{$settings['address2']}}"   required autocomplete="address2"
                                       autofocus>
                                @error('address2') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-40 row @error('email1') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_email1')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('email1') form-control-danger @enderror" type="text" name="email1" id="email1" value="{{$settings['email1']}}"   required autocomplete="email1"
                                       autofocus>
                                @error('email1') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>

                        <div class="form-group m-t-40 row @error('email2') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_email2')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('email2') form-control-danger @enderror" type="text" name="email2" id="email2" value="{{$settings['email2']}}"   required autocomplete="email2"
                                       autofocus>
                                @error('email2') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>



                        <div class="form-group m-t-40 row @error('phone1') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_phone1')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('phone1') form-control-danger @enderror" type="text" name="phone1" id="phone1" value="{{$settings['phone1']}}"   required autocomplete="phone1"
                                       autofocus>
                                @error('phone1') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>



                        <div class="form-group m-t-40 row @error('phone2') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Setting_phone2')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('phone2') form-control-danger @enderror" type="text" name="phone2" id="phone2" value="{{$settings['phone2']}}"   required autocomplete="phone2"
                                       autofocus>
                                @error('phone2') <small class="form-control-feedback"> </small> @enderror
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



{{--Setup ajax--}}
    <script>
        //map initial value
        var centreGot = false;
    </script>

    {{--Init the javascript part of the map--}}
    <script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.dropify').dropify();

        });
    </script>


@endsection
