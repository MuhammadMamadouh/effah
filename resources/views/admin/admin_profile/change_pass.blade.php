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
                    <form class="form" method="post" action="{{url('admin/profile/password/change')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$admin->id}}">

                        <div class="form-group m-t-40 row @error('password') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.NewPassword')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('password') form-control-danger @enderror" type="password" name="password" id="password" value="{{old('password')}}"    autocomplete="password"
                                       autofocus>
                                @error('password') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="form-group m-t-40 row @error('password') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.ConNewPassword')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('password') form-control-danger @enderror" type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}"    autocomplete="password_confirmation"
                                       autofocus>
                                @error('password') <small class="form-control-feedback"> </small> @enderror
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

