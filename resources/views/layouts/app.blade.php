<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Fionca - HTML 5 Template Preview</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon-2.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    @yield('style')
</head>


<!-- page wrapper -->
<body class="boxed_wrapper ltr">

<!-- Preloader -->
<div class="loader-wrap">
    <div class="preloader style-two"><div class="preloader-close">Preloader Close</div></div>
    <div class="layer layer-one"><span class="overlay"></span></div>
    <div class="layer layer-two"><span class="overlay"></span></div>
    <div class="layer layer-three"><span class="overlay"></span></div>
</div>



<!-- main header -->
<header class="main-header style-two">
    <div class="header-upper">
        <div class="auto-container">
            <div class="upper-inner clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{route('home')}}"><img src="assets/images/logo-2.png" alt=""></a></figure>
                </div>
                <div class="info-box pull-right">
                    <ul class="info-list clearfix">
                        <li>
                            <i class="fas fa-phone-volume"></i>
                            <p>Call Our Support<br /><a href="tel:01005200369">0100 5200 369</a></p>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>838 Andy Street, Madison, <br />New Jersy 08003</p>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            <p>Our Working Hours <br />Mon - Sat: 8 am - 6 pm</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-lower">
        <div class="outer-box" @if(\Route::current()->uri != "/") style="background-color: #063c83 !important;" @endif>
            <div class="auto-container">
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('cooperate')}}">Corporate</a></li>
                                <li><a href="{{route('savings')}}">Savings</a></li>
                                <li><a href="{{route('deposit')}}">Deposit</a></li>
                                <li><a href="{{route('savingsGuide')}}">Saving Guide</a></li>
                                <li><a href="index-2.html">Account Management</a></li>
                                <li><a href="index-2.html">About Us</a></li>

                            </ul>
                        </div>
                    </nav>
                    <div class="menu-right-content clearfix">
                        <div class="btn-box">
                            <a href="{{route('register')}}" class="theme-btn style-two">Open an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{route('home')}}"><img src="assets/images/small-logo-2.png" alt=""></a></figure>
                </div>
                <div class="menu-area pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="assets/images/mobile-logo.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        {{--<div class="social-links">--}}
            {{--<ul class="clearfix">--}}
                {{--<li><a href="index.html"><span class="fab fa-twitter"></span></a></li>--}}
                {{--<li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>--}}
                {{--<li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>--}}
                {{--<li><a href="index.html"><span class="fab fa-instagram"></span></a></li>--}}
                {{--<li><a href="index.html"><span class="fab fa-youtube"></span></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </nav>
</div><!-- End Mobile Menu -->




@yield('content')




<!-- main-footer -->
<footer class="main-footer alternet-2">
    <div class="footer-top">
        <div class="auto-container">
            <div class="widget-section">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget logo-widget">
                            <figure class="footer-logo"><a href="index.html"><img src="assets/images/footer-logo-2.png" alt=""></a></figure>
                            <div class="text">
                                <p>{{settings()->about_site}}</p>
                            </div>
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{settings()->address}}</li>
                                <li><i class="fas fa-envelope"></i>Email <a href="mailto:{{settings()->contact_email}}">{{settings()->contact_email}}</a></li>
                                <li><i class="fas fa-headphones"></i>Support <a href="tel:{{settings()->phone}}">{{settings()->phone}}</a></li>
                            </ul>
                            {{--<ul class="social-links clearfix">--}}
                                {{--<li><a href="index.html"><i class="fab fa-twitter"></i></a></li>--}}
                                {{--<li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>--}}
                                {{--<li><a href="index.html"><i class="fab fa-instagram"></i></a></li>--}}
                                {{--<li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>--}}
                                {{--<li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-70">
                            <div class="widget-title">
                                <h4>Useful Links</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><a href="index.html">About Us</a></li>
                                    <li><a href="index.html">What We Offers</a></li>
                                    <li><a href="index.html">Testimonials</a></li>
                                    <li><a href="index.html">Our Projectss</a></li>
                                    <li><a href="index.html">Latest News</a></li>
                                    <li><a href="index.html">Privacy Policy</a></li>
                                    <li><a href="index.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h4>What We Do</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><a href="index.html">Financial Advice</a></li>
                                    <li><a href="index.html">Business Planning</a></li>
                                    <li><a href="index.html">Startup Help</a></li>
                                    <li><a href="index.html">Investment Strategy</a></li>
                                    <li><a href="index.html">Management Services</a></li>
                                    <li><a href="index.html">Market Research</a></li>
                                    <li><a href="index.html">SEO Optimization</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget newsletter-widget">
                            <div class="widget-title">
                                <h4>Newslette</h4>
                            </div>
                            <div class="widget-content">
                                <div class="text">
                                    <p>Get in your inbox the latest News</p>
                                </div>
                                <form action="http://azim.commonsupport.com/Fionca/contact.html" method="post" class="newsletter-form">
                                    <div class="form-group">
                                        <i class="far fa-user"></i>
                                        <input type="text" name="name" placeholder="Your Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" name="email" placeholder="Email address" required="">
                                    </div>
                                    <div class="form-group message-btn">
                                        <button class="theme-btn style-two" type="submit">subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright"><p>&copy; 2020 <a href="index.html">FIONCA</a> - Business & Consulting. All rights reserved.</p></div>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top style-two scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>


<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">X</a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="upper-box">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/sidebar-logo.png" alt="" /></a>
                            </div>
                            <div class="text">
                                <p>Exercitation ullamco laboris nis aliquip sed conseqrure dolorn repreh deris ptate velit ecepteur duis.</p>
                            </div>
                        </div>
                        <div class="side-menu-box">
                            <div class="side-menu">
                                <nav class="menu-box">
                                    <div class="menu-outer">

                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="info-box">
                            <h3>Get in touch</h3>
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>838 Andy Street, Madison, NJ</li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:support@my-domain.com">support@my-domain.com</a></li>
                                <li><i class="fas fa-headphones-alt"></i><a href="tel:101005200369">+1  0100 5200 369</a></li>
                                <li><i class="far fa-clock"></i>Monday to Friday: 9am - 6pm</li>
                            </ul>
                            <form action="http://azim.commonsupport.com/Fionca/contact.html" method="post" class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email address" required="">
                                    <button type="submit" class="theme-btn style-one">subscribe now</button>
                                </div>
                            </form>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->


<!-- jequery plugins -->
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.js')}}"></script>
<script src="{{asset('assets/js/wow.js')}}"></script>
<script src="{{asset('assets/js/validation.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assets/js/appear.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/scrollbar.js')}}"></script>
<script src="{{asset('assets/js/nav-tool.js')}}"></script>
<script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('assets/js/circle-progress.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>

<!-- main-js -->
<script src="{{asset('assets/js/script.js')}}"></script>
@yield('script')

</body><!-- End of .page_wrapper -->

</html>
