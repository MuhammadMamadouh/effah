
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"><img src="{{admin()->user()->image!=null?asset('upload').'/'.admin()->user()->image:asset('admin/images/admin-avatar.png')}}" alt="user"/></div>
            <!-- User profile text-->
            <div class="profile-text">
                <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown"
                                         role="button" aria-haspopup="true"
                                         aria-expanded="true">{{Auth::guard('admin')->user()->name}} <span
                            class="caret"></span>
                </a>
                <div class="dropdown-menu animated flipInY">
                    <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="تسجيل خروج">


                        <i class="mdi mdi-power">تسجيل خروج</i>


                    </a>

                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li><a href="{{route('home.index')}}"><i class="mdi mdi-gauge"></i><span class="hide-menu">{{trans('main.main')}}</span></a></li>


                <li><a href="{{route('theme.index')}}"><i class="fa fa-coffee"></i><span class="hide-menu">{{trans('main.ColorsController')}}</span></a></li>



                <li><a href="{{route('choseCountry.index')}}"><i class="fa fa-flag"></i><span class="hide-menu">إختر الدين</span></a></li>

                <li><a href="{{route('setting.index')}}"><i class="mdi mdi-settings"></i><span class="hide-menu">{{trans('main.Setting')}}</span></a></li>
                <li><a href="{{route('admins.index')}}"><i class="mdi mdi-contrast-box"></i><span class="hide-menu">{{trans('main.Admins')}}</span></a></li>
                <li><a href="{{route('categories.index')}}"><i class=" fa fa-caret-square-o-down"></i><span class="hide-menu"> {{trans('main.Categories')}}</span></a></li>
                <li><a href="{{route('question.index')}}"><i class="fa fa-film"></i><span class="hide-menu"> الأسئلة</span></a></li>
                <li><a href="{{route('answers.index')}}"><i class="fa fa-bars"></i><span class="hide-menu"> الإجابات</span></a></li>
                <li><a href="{{route('suggestion.index')}}"><i class="fa fa-modx"></i><span class="hide-menu"> الإجابات المقترحة</span></a></li>

                <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i><span class="hide-menu"> {{trans('main.Users')}}</span></a></li>
                    <li><a href="{{route('universities.index')}}"><i class="fa fa-address-book"></i><span class="hide-menu"> الجامعات</span></a></li>
                    <li><a href="{{route('colleges.index')}}"><i class="fa fa-file-code-o"></i><span class="hide-menu"> الكليات</span></a></li>
                    <li><a href="{{route('schools.index')}}"><i class="fa fa-sitemap"></i><span class="hide-menu"> </span> المدارس</a></li>
                    <li><a href="{{route('careers.index')}}"><i class="fa fa-suitcase"></i><span class="hide-menu"> </span> المهن</a></li>

                <li><a href="{{route('nationality.index')}}"><i class=" fa fa-flag"></i><span class="hide-menu"> الجنسية</span></a></li>

                <li><a href="{{route('cities.index')}}"><i class="fa fa-book"></i><span class="hide-menu"> المحافظات</span></a></li>
                <li><a href="{{route('subcities.index')}}"><i class="fa fa-university"></i><span class="hide-menu"> المدن</span></a></li>
                <li><a href="{{route('bank.index')}}"><i class="fa fa-bullhorn"></i><span class="hide-menu"> {{trans('main.BankAccounts')}}</span></a></li>
                <li><a href="{{route('payments.index')}}"><i class="fa fa-barcode"></i><span class="hide-menu"> {{trans('main.Payments')}}</span></a></li>

 <li><a href="{{route('messages.index')}}"><i class="fa fa-envelope-o"></i><span class="hide-menu"> {{trans('main.Messages')}} </span></a></li>


                <li><a href="{{route('siteTexts.index')}}"><i class="fa fa-text-width"></i><span class="hide-menu">{{trans('main.AboutApp')}}</span></a></li>
                <li><a href="{{route('contacts.index')}}"><i class="fa fa-phone-square"></i><span class="hide-menu">{{trans('main.CallUs')}}</span></a></li>




            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{route('setting.index')}}" class="link" data-toggle="tooltip" title="الاعدادت"><i class="ti-settings"></i></a>
        <!-- item-->
{{--
        <a href="{{route('profile.edit',admin()->user()->id)}}" class="link" data-toggle="tooltip" title="{{trans('main.Profile')}}"><i class="mdi mdi-pencil-off"></i></a>
--}}
        <!-- item-->
        <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="تسجيل خروج">


            <i class="mdi mdi-power"></i>


        </a>
    </div>
    <!-- End Bottom points-->
</aside>


