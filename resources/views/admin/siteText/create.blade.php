@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.SiteTexts')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('siteTexts.store')}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Text_en_title')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="en_title"  class="form-control">
                                    <option value="about"> من نحن</option>
                                    <option value="contions">الشروط والاحكام </option>
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>




                        <div class="form-group m-t-40 row @error('ar_content') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Text_ar_content')}} <span
                                        class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea class="form-control @error('ar_content') form-control-danger @enderror" type="text" name="ar_content" id="ar_content" required autocomplete="en_content" rows="5"></textarea>
                                @error('ar_content') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('en_content') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">{{trans('main.Text_en_content')}} <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <textarea class="form-control @error('en_content') form-control-danger @enderror" type="text" name="en_content" id="en_content" required autocomplete="en_content"rows="5"></textarea>
                                @error('en_content') <small class="form-control-feedback"> </small> @enderror
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
