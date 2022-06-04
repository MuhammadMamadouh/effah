@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.banks')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('bank.update',$bank->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group m-t-40 row @error('name') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.acc_name')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('name') form-control-danger @enderror" type="text" name="name" id="name" value="{{$bank->name}}"   required autocomplete="name"
                                       autofocus>
                                @error('name') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('bank_name') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.bank_name')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('bank_name') form-control-danger @enderror" type="text" name="bank_name" id="bank_name" value="{{$bank->bank_name}}"   required autocomplete="bank_name"
                                       autofocus>
                                @error('bank_name') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('iban') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.bank_iban')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('iban') form-control-danger @enderror" type="text" name="iban" id="iban" value="{{$bank->iban}}"   required autocomplete="name"
                                       autofocus>
                                @error('iban') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('number') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.bank_number')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <input class="form-control @error('number') form-control-danger @enderror" type="text" name="number" id="number" value="{{$bank->number}}"   required autocomplete="name"
                                       autofocus>
                                @error('number') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>






                        <div  class=" form-group m-t-40 row @error('image') has-danger @enderror">
                            <label for="input-file-now-custom-1" class="col-2 col-form-label">{{trans('main.Image')}}*</label>
                            <div class="col-10">
                                <input type="file" name="image" id="input-file-now-custom-1" required class="dropify" data-default-file="{{asset('upload').'/'.$bank->image}}" />
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
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
