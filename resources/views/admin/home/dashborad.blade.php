@extends('admin.layouts.layout')

@section('header')
@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
{{trans('main.main')}}
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">



        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('providers.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-warning text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\Admin::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-edit"></i></h6>
                        <h6 class="text-white" > {{trans('main.Admins')}}  </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('contacts.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-success text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\ContactUs::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-phone"></i></h6>
                        <h6 class="text-white" > {{trans('main.Messages')}} </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('adminRates.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-danger text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\Rate::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-calendar"></i></h6>
                        <h6 class="text-white" > {{trans('main.Rates')}} </h6>

                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('adminRates.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-info text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\Category::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-binoculars"></i></h6>
                        <h6 class="text-white" > {{trans('main.categories')}} </h6>

                    </div>
                </div>
            </a>

        </div>

    </div>
    <div class="row">



        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('cities.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-primary text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\City::where('country_id',1)->count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-book"></i></h6>
                        <h6 class="text-white" > المحافظات  </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('subcities.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-danger text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\SubCity::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-music"></i></h6>
                        <h6 class="text-white" > {{trans('main.Cities')}} </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('universities.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-success text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\University::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-university"></i></h6>
                        <h6 class="text-white" >الجامعات </h6>

                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('colleges.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-warning text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\College::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-address-book"></i></h6>
                        <h6 class="text-white" > الكليات </h6>

                    </div>
                </div>
            </a>

        </div>

    </div>
    <div class="row">



        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('schools.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-danger text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\School::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-school"></i></h6>
                        <h6 class="text-white" > المدارس  </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('contacts.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-primary text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\ContactUs::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-phone"></i></h6>
                        <h6 class="text-white" > {{trans('main.Messages')}} </h6>

                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('adminRates.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-danger text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\Rate::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-calendar"></i></h6>
                        <h6 class="text-white" > {{trans('main.Rates')}} </h6>

                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('adminRates.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-info text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Models\Category::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-binoculars"></i></h6>
                        <h6 class="text-white" > {{trans('main.categories')}} </h6>

                    </div>
                </div>
            </a>

        </div>

    </div>



      {{--  <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('allOrder.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-primary text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Order::where('status',array(0,1))->count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-address-card"></i></h6>
                        <h6 class="text-white" >  الطلبات الجديدة   </h6>

                    </div>
                </div>
            </a>

        </div>





    </div>--}}
{{--
    <div class="row">
        <!-- Column -->

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="{{route('allOrder.index')}}">
                <div class="card card-inverse card-info card-shadow">
                    <div class="box_dash bg-warning text-center">
                        <h1 class="font-light text-white" id="daly_advertisement">
                            {{  $count = \App\Order::count()}}
                        </h1>
                        <h6 class="text-white"><i class="fa fa-bookmark"></i></h6>
                        <h6 class="text-white" > {{trans('main.Orders')}} </h6>

                    </div>
                </div>
            </a>

        </div>








--}}



    </div>
    <div class="row">
        <!-- Column -->













    </div>





   {{-- <div class="row">
        <!-- Column -->
        <div class="col-sm-6">
            <div class="card card-block">
                <!-- Row -->
                <div class="row p-t-10 p-b-10">
                    <!-- Column -->
                    <div class="col p-r-0">
                        <h1 class="font-light">  {{  $count = \App\User::where('software_type',1)->count()}}</h1>
                        <h6 class="text-muted">{{trans('main.Android_Register_user')}}</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div data-label="100%" class="css-bar m-b-0 css-bar-primary css-bar-100"><i class="mdi mdi-account-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-sm-6">
            <div class="card card-block">
                <!-- Row -->
                <div class="row p-t-10 p-b-10">
                    <!-- Column -->
                    <div class="col p-r-0">
                        <h1 class="font-light"> {{  $count = \App\User::where('software_type',2)->count()}}</h1>
                        <h6 class="text-muted"> {{trans('main.Ios_Register_user')}}  </h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div data-label="100%" class="css-bar m-b-0 css-bar-danger css-bar-100"><i class="mdi mdi-briefcase-check"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-sm-6">
            <div class="card card-block">
                <!-- Row -->
                <div class="row p-t-10 p-b-10">
                    <!-- Column -->
                    <div class="col p-r-0">
                        <h1 class="font-light"> {{  $count = \App\Category::count()}} </h1>
                        <h6 class="text-muted">#{{trans('main.Categories')}}  </h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div data-label="40%" class="css-bar m-b-0 css-bar-warning css-bar-100"><i class="mdi mdi-star-circle"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-sm-6">
            <div class="card card-block">
                <!-- Row -->
                <div class="row p-t-10 p-b-10">
                    <!-- Column -->
                    <div class="col p-r-0">
                        <h1 class="font-light">{{  $count = \App\Service::count()}} </h1>
                        <h6 class="text-muted">#{{trans('main.Services')}}</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div data-label="60%" class="css-bar m-b-0 css-bar-info css-bar-100"><i class="mdi mdi-receipt"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}



@endsection

@section('footer')
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
