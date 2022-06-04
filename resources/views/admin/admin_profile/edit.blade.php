@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.Profile')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('admins.update',$admin->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group m-t-40 row @error('name') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Admin_name')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('name') form-control-danger @enderror" type="text" name="name" id="name" value="{{$admin->name}}"   required autocomplete="name"
                                       autofocus>
                                @error('name') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('email') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Admin_email')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('email') form-control-danger @enderror" type="email" name="email" id="email" value="{{$admin->email}}"   required autocomplete="email"
                                       autofocus>
                                @error('email') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>



                        <div  class=" form-group m-t-40 row @error('image') has-danger @enderror">
                            <label for="input-file-now-custom-1" class="col-2 col-form-label">{{trans('main.Admin_image')}}</label>
                            <div class="col-10">
                                <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('upload').'/'.$admin->image}}" />
                                @error('image') <small class="form-control-feedback"> </small> @enderror

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

@endsection
