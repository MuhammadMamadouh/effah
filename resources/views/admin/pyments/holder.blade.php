@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/html5-editor/bootstrap-wysihtml5.css')}}" />

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    {{trans('main.ContactUs')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}

@endsection

@section('content')
    <div class="main-content win-height">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <strong>عذرا!</strong> حدث خطأ ما فى ادخال البيانات.
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('msg'))
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert">×</a>
                <strong style="margin:auto">{!!Session::get('msg')!!}!</strong>
            </div>
        @elseif(Session::has('alert'))
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert">×</a>
                <strong style="margin:auto">{!!Session::get('alert')!!}!</strong>
            </div>

        @endif

        <div class="breadcrumb-box">
            <h1>الصفحة الرئيسية
                <small></small>
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{route('home.index')}}"> الرئيسية</a></li>
                <li><a href="{{url('admin/payments')}}">كل السجل</a></li>
                <li class="active">تفاصيل الدفع</li>


            </ol>
        </div>


        <div class="container-fluid">
                @foreach($payments as $payment)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 style="text-align: right">تفاصيل : </h4>

                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <i class="fa fa-user fa-1x right-fa text-primary"></i>
                    </div>
                    <div class="pull-left">
                        <i class="fa fa-hand-o-left fa-1x left-fa text-primary "></i> created
                        at {{$payment->created_at}}

                    </div>
                    <br>
                    <hr>
                    <br>

                    <div class="col-lg-12 col-md-6">
                        <span class="text-primary" style="padding-left: 25px"> اسم العميل :</span>
                        {{$payment->user->name}}
                        <br><br>

                        <span class="text-primary" style="padding-left: 25px"> رقم هاتف العميل :</span>
                        {{$payment->user->mobile}}
                        <br><br>

                        <span class="text-primary" style="padding-left: 25px"> بدايه الحجز :</span>
                        {{$payment->amount}}
                        <br><br>

                        <span class="text-primary" style="padding-left: 25px"> نهايه الحجز :</span>

                        <br><br>


                        <p class="text-primary"> صوره الايصال :</p>
                        {{--<div class="thumbnail">--}}
                        <div class="col-md-4">
                            <a data-fancybox="gallery" href="{{asset('upload/'.$payment->image)}}">
                                <img src="{{asset('upload/'.$payment->image)}}"
                                     class="img-responsive img-fancy">
                            </a>
                        </div>
                        {{--</div>--}}

                        @endforeach
                    </div>
                </div>
            </div>


        @endsection



