<!doctype html>
<html lang="ar"  dir="rtl">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
{{--<link draggable="false" ondragstart="return false; rel="icon"  type="image/png" sizes="16x16" href="{{asset('upload').'/'.$settings['logo']}}">--}}
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> دخول المشرفون </title>

    <link rel="icon" href="{{asset('upload').'/'.$settings['logo']}}" type="image/x-icon">
    <!-- Bootstrap -->
    <!-- Material Design Bootstrap -->

    <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- More -->
    <link href="{{asset('admin/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{asset('admin/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('toastr.min.css')}}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- Custom style  -->
    <!-- fonts  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
</head>

<body>
<!-- ================ spinner ================= -->
<section id="Header">

</section>

{{--
<section class="spinner">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</section>
--}}
<!-- ================ Navbar ================= -->
<!-- =============== login ================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url({{asset('admin/images/login.jpg')}});">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                <img src="{{asset('upload').'/'.$settings['logo']}}" alt="Logo" width="50px" height="50px">
            </div>
        </div>
        <br>
        <div class="login-box card" style="background-color: #62886f;border-radius: 14%">
            <div class="card-block">
                @if($errors->has('error'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('error') }}</strong>
                    </span><br><br>
                @endif
                <form method="POST" class="form-horizontal form-material" id="loginform" action="{{ url('admin/login') }}"style="background-color: #62886f;border-radius: 14%">
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="box-title m-b-20 text-center">تسجيل دخول</h3>

                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                       placeholder="البريد الإلكتروني او اسم المستخدم" required autofocus>
                            </div>
                        </div>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="كلمة المرور"
                                       required>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label  style="padding-right:15px"   class="form-check-label" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-inverse btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">دخول</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <h1 CLASS="font-weight-bold"><a href="#" class="text-danger m-l-5"><b style="color:#62886f">{{strtoupper($settings->en_title)}}</b></a></h1>
            </div>
        </div>
    </div>
</section>
<!-- =============== footer ================== -->
<!-- <div id="Footer"></div> -->












<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<script src="{{url('/')}}/site/js/jquery-3.4.1.min.js"></script>
<script src="{{url('/')}}/site/js/popper.min.js"></script>
<script src="{{url('/')}}/site/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/site/js/mdb.min.js"></script>
<script src="{{url('/')}}/site/js/smooth-scroll.min.js"></script>
<script src="{{url('/')}}/site/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/site/js/wow.min.js"></script>
<script src="{{url('/')}}/site/js/flag.min.js"></script>
<script src="{{url('/')}}/site/js/Custom.js"></script>
<script src="{{asset('admin/plugins/toast-master/js/jquery.toast.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('admin/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('toastr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $('#Header').load("Header.html");
    // $('#Footer').load("Footer.html");/
</script>

</body>
@toastr_render

</html>
