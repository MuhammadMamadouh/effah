@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
   التحكم بالالوان
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('theme.update', Auth::guard('admin')->user()->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf


                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">لون المظهر <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="them"  class="form-control">
                                    <option @if(admin()->user()->them==1)selected @endif value="1"> الافتراضي</option>
                                    <option @if(admin()->user()->them==3)selected @endif value="3">   ابيض في ازرق</option>
                                    <option @if(admin()->user()->them==2)selected @endif  value="2"> ازرق في ابيض</option>
                                    <option @if(admin()->user()->them==4)selected @endif value="4"> ابيض في اسود</option>
                                    <option @if(admin()->user()->them==5)selected @endif value="5"> ابيض في اخضر</option>
                                    <option @if(admin()->user()->them==6)selected @endif value="6"> اخضر في اسود</option>
                                    <option @if(admin()->user()->them==7)selected @endif value="7">ابيض في  سماوي</option>
                                    <option  @if(admin()->user()->them==8)selected @endif value="8"> سماوي في اسود</option>
                                    <option @if(admin()->user()->them==9)selected @endif value="9">ابيض في  بنفسج</option>
                                    <option @if(admin()->user()->them==10)selected @endif value="10"> بنفسج في اسود</option>
                                    <option @if(admin()->user()->them==11)selected @endif value="11"> ابيض في احمر</option>
                                    <option @if(admin()->user()->them==12)selected @endif value="12"> احمر في اسود</option>

                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
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
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
