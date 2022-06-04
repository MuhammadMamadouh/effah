<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> عفة </title>
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/site/img/fav.svg')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/site/css/bootstrap-rtl.css')}}">
    <!-- MDBootstrap -->
    <link rel="stylesheet" href="{{asset('/site/css/mdb.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/site/css/all.css')}}">
    <!-- flatIcon -->
    <link rel="stylesheet" href="{{asset('/site/css/flaticon.css')}}">
    <!-- swiper -->
    <link rel="stylesheet" href="{{asset('/site/css/swiper.css')}}">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('/site/css/aos.css')}}">
    <!-- img gallery -->
    <link rel="stylesheet" href="{{asset('/site/css/jquery.fancybox.min.css')}}">
    <!-- Custom style  -->
    <link rel="stylesheet" href="{{asset('/site/css/style.css')}}">
    <!-- fonts  -->
    @toastr_css
</head>

<body>
<!-- ================ spinner ================= -->
<!-- <div class="spinner"></div> -->
<!-- ================ spinner ================= -->
<!--======================= start nav =================================-->
<div class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('/site/img/logo.svg')}}">
                <!-- <h1>ZELZ</h1> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav index-navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="#">الرئيسية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#Features"> مميزات التطبيق</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#appImg"> صور التطبيق</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#download-app"> تحميل التطبيق</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#contact">تواصل معنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--======================= end nav =================================-->
<!-- =============== Main section ================== -->
<!-- =============== /Main section ================== -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<!-- ================ content ================= -->
<content>







    <section class="top-BG">

        <svg class="wave-primary" width="100%" height="100vh" viewBox="0 0 1920 761" fill="none">
            <path class="wave-path wave-path-3"
                  d="M1920 0C1868.64 28.7312 1767 105.232 1695.1 215.862C1605.14 354.271 1419.02 474.469 1280.98 388.267C1142.94 302.064 961.469 319.062 882.367 459.899C803.265 600.737 677.632 585.659 497.714 507.956C334.904 437.641 257.19 626.164 214 761H1920V0Z">
            </path>
            <path class="wave-path wave-path-2"
                  d="M1920 287C1862.19 304.896 1747.81 352.545 1666.89 421.453C1565.65 507.663 1356.18 542.53 1200.82 488.838C1045.46 435.145 841.231 445.732 752.206 533.455C663.182 621.178 521.79 689.158 319.303 640.76C136.071 596.963 48.6073 677.016 0 761H1920V287Z">
            </path>
            <path class="wave-path wave-path-1"
                  d="M0 761V673.062C17.2169 674.438 35.2639 676.42 54.1873 679.064C273.969 709.775 432 617.316 536.497 556.18C544.219 551.661 551.649 547.314 558.79 543.201C723.453 463.081 840.092 497.29 966.341 534.318C1005.86 545.91 1046.33 557.777 1089.5 566.5C1230.41 594.97 1308.84 548.102 1392.3 498.225C1416.11 484.002 1440.32 469.535 1466.5 456.5C1624.43 377.88 1748.84 433.944 1832.78 471.772C1870.02 488.554 1899.29 501.748 1920 498V761H0Z">
            </path>
        </svg>

        <div class="text-center text-light  pt-5 container-fluid">
            <div class="row ">
                <!-- <div class="col-lg-6 p-1 col-md-6 col-sm-6 col-12 mobile-img wow fadeInLeft"> -->
                <div class="col-lg-6 p-1 col-md-6 col-sm-6 col-12  wow fadeInLeft">
                    <!-- <img src="{{asset('/site/img/top.png')}}"> -->
                    <img class="iPhone_animated" src="{{asset('/site/img/iPhone_animated.gif')}}" alt="">

                </div>
                <div class="col-lg-6 p-1 col-md-6 col-sm-6 col-12 ">
                    <div class=" title" data-aos="fade-up">
                        <h1> تطبيق <span> عفة </span> </h1>
                    </div>
                    <p> التطبيق الاكبر في مصر والوطن العربي للتوصل الي الزواج بين الشباب والفتيات  بشكل ملائم  </p>
                    <a href="{{$settings->ios_app}}" target="_blank" class="btn btn-white "><span>app store </span> <i class="fab fa-apple  mr-2"></i></a>
                    <a href="{{$settings->android_app}}" target="_blank" class="btn btn-white "><span>google play </span> <i class="fab fa-google-play mr-2"></i></a>
                </div>
            </div>
        </div>
    </section>





    <!-- ======================  -->
    <section class="  Features" id="Features">
        <div class="container">
            <div class=" title" data-aos="fade-up">
                <h1>مميزات <span>التطبيق</span> </h1>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-5 mt-3 mt-md-5 p-1">
                    <div class="py-3" data-aos="fade-up">
                        <div class="row">
                            <div class="col-3 d-flex justify-content-center p-1">
                                <i class="fas fa-star  fa-2x"></i>
                            </div>
                            <div class="col-9 p-1 pl-0">
                                <h5>التميز عن الاخرين</h5>
                                <p>نسعي دائما الي الاختلاف والتميز في كل شي عن الاخرين ... </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3" data-aos="fade-up">
                        <div class=" row">
                            <div class="col-3 d-flex justify-content-center p-1">
                                <i class="fas fa-rocket  fa-2x"></i>
                            </div>
                            <div class="col-9 p-1">
                                <h5>السرعة في الاستخدام</h5>
                                <p> سهوله التتنقل بين صفحات التطبيق تجعل استخدامه سريع ...</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3" data-aos="fade-up">
                        <div class=" row">
                            <div class="col-3 d-flex justify-content-center p-1">
                                <i class="fas fa-cog  fa-2x"></i>
                            </div>
                            <div class="col-9 p-1">
                                <h5>التحكم في الاعدادات </h5>
                                <p>يمكنك ضبط الاعدادات التي تناسبك من داخل التطبيق ... </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-3" data-aos="fade-up">
                        <div class=" row">
                            <div class="col-3 d-flex justify-content-center p-1">
                                <i class="fas fa-users  fa-2x"></i>
                            </div>
                            <div class="col-9 p-1">
                                <h5>التواصل</h5>
                                <p>نهتم دائما بالتواصل مع العملاء عن طريق مواقع التواصل الاجتماعي ... </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7">
                    <img src="{{asset('/site/img/mob1.png')}}" class=" mt-4  w-100">
                </div>
            </div>
        </div>
    </section>
    <!-- ================== pic===============  -->
    <section class="app-Pic" id="appImg">
        <div class="container">
            <div class=" title" data-aos="fade-up">
                <h1>صور <span>التطبيق</span> </h1>
            </div>
            <div class="swiper-container app-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{asset('/site/img/1.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/2.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/3.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/4.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/5.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/6.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/7.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/8.png')}}"></div>
                    <div class="swiper-slide"><img src="{{asset('/site/img/9.png')}}"></div>

                </div>
            </div>
        </div>
    </section>
    <!--======================= start download =================================-->
    <section class="download-app" id="download-app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 p-1">
                    <div class="download-app-txt">
                        <div class=" title" data-aos="fade-up">
                            <h1>تحميل <span>التطبيق</span> </h1>
                        </div>
                        <p>يمكنك الان تحميل التطبيق الي جوالك من خلال google play او app store بادر الان بالتحميل من خلال منصات
                            التحميل الرسمية
                            واستمتع بسهوله استخدام التطبيق</p>
                        <a href="{{$settings->android_app}}" target="_blank"  class="btn">GOOGLE PLAY<img src="{{asset('/site/img/google-play.svg')}}" data-aos="fade-up"></a>
                        <a href="{{$settings->ios_app}}" target="_blank" class="btn"> APP STORE<img src="{{asset('/site/img/brand.svg')}}" data-aos="fade-up"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-1">
                    <div class="download-app-img">
                        <img class="down" src="{{asset('/site/img/download.png')}}" data-aos="fade-up">
                        <img src="{{asset('/site/img/download.png')}}" data-aos="fade-up" data-aos-delay="500">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--======================= end download =================================-->
    <!-- ================ contact us ================= -->
    <section class="contact" id="contact">
        <div class="container">
            <div class=" title" data-aos="fade-up">
                <h1>تواصل <span>معنا</span> </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-0">
                    <form action="{{route('messages.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class=" col-lg-12 p-1">
                                <input required type="text" name="name" class=" form-control" placeholder=" الاسم" data-aos="fade-up">
                            </div>
                            <div class=" col-lg-12 p-1">
                                <input required type="email" name="email" class=" form-control" placeholder="  البريد الالكتروني" data-aos="fade-up">
                            </div>
                            <div class=" col-lg-12 p-1">
                                <input type="text" name="phone" class=" form-control" placeholder=" رقم الهاتف" data-aos="fade-up">
                            </div>
                            <div class=" col-lg-8 p-1">
                                <textarea required name="text" rows="5" class=" form-control" placeholder=" الرساله " data-aos="fade-up"></textarea>
                            </div>
                            <div class=" col-lg-4 p-1 btnDiv">
                                <button type="submit" class=" btn " data-aos="fade-up">ارسال <i
                                        class="fas fa-paper-plane mx-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ /contact us ================= -->
</content>
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ /content ================= -->
<!-- ================ Footer ================= -->
<footer class="footer">
    <div class="container">
        <div class="logo">
            <img src="{{asset('/site/img/logo.svg')}}" alt="">
        </div>
        <div class="links">
            <ul>
                <li>
                    <a href="#"> الرئيسية </a>
                </li>
                <li>
                    <a href="#Features"> مميزات التطبيق </a>
                </li>
                <li>
                    <a href="#appImg"> صور التطبيق </a>
                </li>
                <li>
                    <a href="#download-app"> تحميل التطبيق </a>
                </li>
                <li>
                    <a href="#contact"> تواصل معنا </a>
                </li>
            </ul>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 p-2">
                <div class="social ">
                    <ul>
                        <li>
                            <a target="_blank" href="#!"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="#!"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="#!"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="#!"><i class="fab fa-snapchat-ghost"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 p-2">
                <p> كل الحقوق محفوظة <a href="#"> عفة </a></p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- ================ /Footer ================= -->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<script src="{{asset('/site/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/site/js/popper.min.js')}}"></script>
<script src="{{asset('/site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/site/js/mdb.min.js')}}"></script>
<script src="{{asset('/site/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('/site/js/swiper.js')}}"></script>
<script src="{{asset('/site/js/aos.js')}}"></script>
<script src="{{asset('/site/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('/site/js/Custom.js')}}"></script>
<script>
    var swiper = new Swiper('.app-slider', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
        spaceBetween: -40,
        loop: true,
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });
</script>
@jquery
@toastr_js
@toastr_render
</body>

</html>
