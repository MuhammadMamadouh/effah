@extends('admin.layouts.layout')

@section('header')
<link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/image-zoom.css')}}" />
<style>
    img {
        height: 100px;
    }

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8) none 50% / contain no-repeat;
        cursor: pointer;
        transition: 0.3s;

        visibility: hidden;
        opacity: 0;
    }

    #overlay.open {
        visibility: visible;
        opacity: 1;
    }

    #overlay:after {
        /* X button icon */
        content: "\2715";
        position: absolute;
        color: #fff;
        top: 10px;
        right: 20px;
        font-size: 2em;
    }
</style>
@endsection


@section('page-title')
{{-- عنوان الصفحة --}}
المدارس@endsection


@section('page-create')
{{-- اضافة زرار--}}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                {{-- <form class="forms-sample" method="post" action="{{route('schools.store')}}"
                    enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>اسم الأول </label>
                                <input type="text" name="name" id="ar_title" disabled value="{{$user->frName}}"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>اسم الثاني </label>
                                <input type="text" name="name" id="ar_title" disabled value="{{$user->lsName}}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>الهاتف </label>
                                <input type="text" name="name" id="ar_title" disabled value="{{$user->phone  }}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ذكر / أنثى </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{ $user->gender == App\Constants\Gender::MALE ? 'ذكر' : 'أنثى'  }}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>البلد </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{count($user->country()->get()) > 0 ? $user->country->ar_title : null  }}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>المحافظة </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{count($user->city()->get()) > 0 ? $user->city->name : null }}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>المنطقة </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{$user->district ? $user->district->name : null  }}" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>الدين </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{$user->religion->name  }}" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>المستوى التعليمي </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{$user->education ? $user->education->name: ''  }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>الجامعة </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{$user->universty ? $user->universty->name : null  }}"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>الكلية </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{$user->college ? $user->college->name :''  }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>العمر </label>
                                <input type="text" name="name" id="ar_title" disabled
                                    value="{{Carbon\Carbon::parse($user->birth_date)->diff(Carbon\Carbon::now())->y  }}"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة تأكيد الهوية 1- </label>
                                <img src="{{asset($user->identity_face)}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة تأكيد الهوية 2- </label>
                                <img src="{{asset($user->identity_back)}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة جواز السفر- </label>
                                <img src="{{asset($user->passport_image)}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عن المستخدم </label>
                                <textarea disabled class="form-control">{{$user->about_you}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عن الشريك </label>
                                <textarea disabled class="form-control">{{$user->about_partner}}</textarea
                    </div>
                {{-- </div> --}}
{{-- </div> --}}
                    {{-- @if(!$user->approved) --}}
                    <form action="{{route('approve_user')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>أدخل رقم البطاقة </label>
                                <input type="text" name="id_no"  value="{{$user->idNumber}}" {{ $user->is_approved ? 'disabled': ''}} class="form-control" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">تأكيد الحساب</button>
                    </form>
                    {{-- @endif --}}
                    {{--
                </form> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
{{-- <script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script> --}}

<script src="{{asset('admin/js/image-zoom.min.js')}}"></script>
<script>
    // $(document).ready(function () {
    //         $('.dropify').dropify();
    //     });

    $(function(){
        $('img').on('click', function() {
  $('#overlay')
    .css({backgroundImage: `url(${this.src})`})
    .addClass('open')
    .on('click', function() {
         $(this).removeClass('open'); });
            $('.my-gallery').imageZoom({
            $(this).imageZoom();
            });
        });


</script>
@endsection
