<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home.index')}}">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset('upload'.'/'.$settings['logo'])}}" alt="homepage"
                         width="120px" height="70px"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
{{--
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <li class="nav-item"><a
                        class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a></li>

                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('main.lang')}} <i class="mdi mdi-arrange-bring-to-front"></i>
                        <div class="notify">  </div>
                    </a>
                     <div class="dropdown-menu mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="dropdown-menu dropdown-primary mt-2">
                                    <a class="dropdown-item" href="{{url('lang/ar')}}"> <i class="saudi arabia flag"></i> العربية </a>
                                    <a class="dropdown-item" href="{{url('lang/en')}}"> <i class="united kingdom flag"></i> english</a>

                                </div>
                            </li>
                            <li>
                                <div class="message-center">



                                        <a class="dropdown-item" href="{{url('lang/ar')}}"> <i class="saudi arabia flag"></i> العربية </a>
                                        <a class="dropdown-item" href="{{url('lang/en')}}"> <i class="united kingdom flag"></i> english</a>



                                </div>
                            </li>

                        </ul>
                    </div>               </li>
                <!-- ============================================================== -->
            </ul>
--}}
            <!-- ============================================================== -->
            <!-- User profile notification -->


            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{--<img
                            src="{{admin()->user()->image!=null?asset('upload').'/'.admin()->user()->image:asset('admin/images/admin-avatar.png')}}" alt="user" class="profile-pic"/></a>--}}
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <a href="{{route('profile.edit',admin()->user()->id)}}">
                                    {{trans('main.Profile_edit')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/profile/password').'/'.admin()->user()->id}}">
                                    {{trans('main.Profile_pass')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>  {{trans('main.Logout')}}
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</header>
