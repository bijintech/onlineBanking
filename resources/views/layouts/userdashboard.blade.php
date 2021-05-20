<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Online Banking</title>
    <meta name="description" content="Jetson is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Jetson Admin, Jetsonadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Data table CSS -->
    <link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Data table CSS -->
	<link href="{{ asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Owl CSS -->
    <link href="{{ asset('vendors/bower_components/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/bower_components/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper pimary-color-silver theme-4-active">
@include('partials.userdashboard.nav')
@include('partials.userdashboard.sidebar')
@yield('content')
</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Data table JavaScript -->
<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>

<!-- Progressbar Animation JavaScript -->
<script src="{{asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{'vendors/bower_components/jquery.counterup/jquery.counterup.min.js'}}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>

<!-- Sparkline JavaScript -->
<script src="{{asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- Owl JavaScript -->
<script src="{{asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>

<!-- Switchery JavaScript -->
<script src="{{asset('vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>

<!-- EChartJS JavaScript -->
<script src="{{asset('vendors/bower_components/echarts/dist/echarts-en.min.js')}}"></script>
<script src="{{asset('vendors/echarts-liquidfill.min.js')}}"></script>

<!-- Toast JavaScript -->
<script src="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

<!-- Init JavaScript -->
<script src="{{asset('dist/js/init.js')}}"></script>
<script src="{{asset('dist/js/dashboard-data.js')}}"></script>

<!-- Owl JavaScript -->
<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<!-- Owl Init JavaScript -->
<script src="{{ asset('dist/js/owl-data.js') }}"></script>

<!-- Starrr JavaScript -->
@if(\Session::has('success'))
    <script>
        /*****Load function start*****/
        $(window).load(function(){
            window.setTimeout(function(){
                $.toast({
                    heading: 'Success',
                    text: "{{session()->get('success')}}",
                    position: 'bottom-left',
                    loaderBg:'#f8b32d',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                });
            }, 3000);
        });
        /*****Load function* end*****/
    </script>
@endif

@if($errors->count() > 0)
    <script>
        /*****Load function start*****/
        $(window).load(function(){
            window.setTimeout(function(){
                $.toast({
                    heading: 'Unable to submit',
                    text: "Unable to submit form, some inputs are incomplete",
                    position: 'bottom-left',
                    loaderBg:'red',
                    icon: 'error',
                    hideAfter: 3500,
                    stack: 6
                });
            }, 3000);
        });
        /*****Load function* end*****/
    </script>
@endif

@if(\Session::has('error'))
    <script>
        /*****Load function start*****/
        $(window).load(function(){
            window.setTimeout(function(){
                $.toast({
                    heading: 'Error',
                    text: "{{\Session::get('error')}}",
                    position: 'bottom-left',
                    loaderBg:'red',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 6
                });
            }, 3000);
        });
        /*****Load function* end*****/
    </script>
@endif
@yield('script')
</body>
</html>
