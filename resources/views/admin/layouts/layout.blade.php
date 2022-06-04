<!DOCTYPE html>
<html lang="en" dir="{{app()->getLocale()=='en'?'rtl':'rtl'}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <title>
        @if(app()->isLocale('en'))
            {{$settings->en_title}}
        @else
            {{$settings->ar_title}}
        @endif
    </title>
    <!-- Bootstrap Core CSS -->

    <link href="{{asset('toastr.min.css')}}" rel="stylesheet">

    <link href="{{asset('/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('/admin/plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css')}}" rel="stylesheet">


    <!-- chartist CSS -->
    <link href="{{asset('/admin/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/plugins/chartist-js/dist/chartist-init.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/plugins/css-chart/css-chart.css')}}" rel="stylesheet">
    <link href="{{asset('toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('fancy_fileupload.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    {{--    @if(app()->isLocale('en'))
            <link href="{{asset('/admin/css/style-en.css')}}" rel="stylesheet">
        @else--}}
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    {{--
             @endif--}}
    <script src="{{asset('admin/plugins/datatables/datatables.css')}}"></script>

    <link href="{{asset('admin/css/mycss.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <?php
    $admin=\App\Models\Admin::where('id',auth()->guard('admin')->user()->id)->first();

    $theme='default.css';
    if(auth()->guard('admin')->user()->them==1){
        $theme='default.css';

    }    if(auth()->guard('admin')->user()->them==4){
        $theme='default-dark.css';

    }   if(auth()->guard('admin')->user()->them==2){
        $theme='blue.css';

    } if(auth()->guard('admin')->user()->them==3){
        $theme='blue-dark.css';

    }  if(auth()->guard('admin')->user()->them==5){
        $theme='green.css';

    } if(auth()->guard('admin')->user()->them==6){
        $theme='green-dark.css';

    } if(auth()->guard('admin')->user()->them==7){
        $theme='megna.css';

    } if(auth()->guard('admin')->user()->them==8){
        $theme='megna-dark.css';

    } if(auth()->guard('admin')->user()->them==9){
        $theme='purple.css';

    } if(auth()->guard('admin')->user()->them==10){
        $theme='purple-dark.css';

    }if(auth()->guard('admin')->user()->them==11){
        $theme='red.css';

    } if(auth()->guard('admin')->user()->them==12){
        $theme='red-dark.css';

    }
    ?>
    @if(auth()->guard('admin')->user()->them==3)
        <link href="{{asset('admin/css/colors/'.$theme)}}" id="theme" rel="stylesheet">
    @else
{{--
        @php  $theme='blue-dark.css';@endphp
--}}
        <link href="{{asset('admin/css/colors/'.$theme)}}" id="theme" rel="stylesheet">
    @endif
<!-- toast CSS -->
    <link href="{{asset('admin/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{asset('admin/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @toastr_css

    @yield('header')


</head>
<body class="fix-header fix-sidebar card-no-border">

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<div id="main-wrapper">

    <!-- top navigation -->
@include('admin.inc.navbar')
<!-- /top navigation -->

    <!-- Sidebar Menu -->
@include('admin.inc.sidebar')
<!-- /Sidebar Menu -->
    <div class="page-wrapper" >
        <div class="container-fluid">

            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">{{trans('main.main')}}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">{{trans('main.main')}}</a></li>
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    </ol>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <a href="{{route('setting.index')}}" class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></a>
                    <a  href="{{ url()->previous() }}">
                        <i titil="عودة" class=" fa fa-arrow-circle-o-left right-side-toggle waves-effect waves-light btn-success btn-circle btn-sm pull-right m-l-10"></i>
                    </a>
                    @yield('page-create')
                </div>
            </div>



        @include('admin.inc.flash')

        <!-- page content -->
        @yield('content')

        <!-- /page content -->
        </div>

        <!-- footer -->
        <footer class="footer text-center">
            © 2022
            @if(app()->isLocale('en'))
                {{$settings->en_title}}
            @else
                {{$settings->ar_title}}
            @endif
        </footer>
        <!-- End footer -->
    </div>

</div>


<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('/admin/plugins/bootstrap/js/tether.min.js')}}"></script>
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('/admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('/admin/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('/admin/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('/admin/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{asset('/admin/plugins/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('/admin/plugins/echarts/echarts-all.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('/admin/js/dashboard1.js')}}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<script src="{{asset('admin/plugins/datatables/datatables.js')}}"></script>

<!-- ============================================================== -->
<script src="{{asset('/admin/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{asset('toastr.min.js')}}"></script>

@yield('footer')
<script src="{{asset('jquery.fileupload.js')}}"></script>
<script src="{{asset('jquery.fancy-fileupload.js')}}"></script>

<!-- Toastr  -->
<script src="{{asset('admin/plugins/toast-master/js/jquery.toast.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('admin/plugins/sweetalert/sweetalert.min.js')}}"></script>

</body>
@toastr_render
</html>
