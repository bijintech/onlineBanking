@extends('layouts.app')

@section('style')
    <link href="{{asset('assets/css/bt-stepper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
@endsection

@section('content')
    <section class="feature-section sec-pad more_padding">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="col-md-6 offset-md-3">
                    <div class="login_section_form">
                        <div class="login_section_header">
                            Login to continue
                        </div>
                        <p class="small_login_talk"> If you are a registered user of this service, please enter your User ID and Password below. </p>

                        @if(\Session::has('info'))
                            <div class="alert_er"> {{\Session::get('info')}}</div>
                        @endif


                        @if(\Session::has('success'))
                            <div class="info_timed_inner">
                                <div class="alert_su"> {{\Session::get('success')}}</div>
                            </div>
                        @endif


                        <form id="form" action="{{route('loginPost')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label> Account Username</label>
                                <input id="username" name="username" type="text" class="form-control2" placeholder="Username" {{old('username')}}>
                                @if($errors->has('username'))
                                    <div class="er">
                                        {!!  $errors->get('username')[0] !!}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label> Account Password </label>
                                <input id="password" name="password" type="password" class="form-control2" placeholder="Password">

                                @if($errors->has('password'))
                                    <div class="er">
                                        {!!  $errors->get('password')[0] !!}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-5">
                                <button class="theme-btn style-two display_block" type="button" onclick="goNext()">Login</button>
                            </div>
                        </form>


                        <div class="other_auth_option">
                            Don't have an account ? - <a href="{{route('register')}}"> Register</a> <br>
                            Forgotten Password ? - <a href="{{route('resetPassword')}}"> Reset Password</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('script')
    <script src="{{asset('assets/js/bt-stepper.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script>
        // reset form fields and inputs

        $('form').each(function() { this.reset() });

        var stepper1 = new Stepper(document.querySelector('#stepper1'), {
            animation: true
        })

        function goNext(){

            let username = $('#username').val();
            let password = $('#password').val();

            if(!username.trim().length === 0 || password.trim().length === 0){
                Swal.fire({
                    title: 'Error!',
                    text: 'All fields & inputs are required',
                    icon: 'error',
                    confirmButtonText: 'Continue'
                })
            } else {
                $("#form").submit();
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>
@endsection