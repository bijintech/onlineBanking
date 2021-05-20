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
                            Open an Account
                        </div>


                        @if($errors->count() > 0)
                            <div class="alert_er">
                                @if ($errors->any())
                                    Sorry unable to continue, all fields are required
                                @endif
                            </div>
                        @endif

                        <form id="form" action="{{route('registerPost')}}" method="POST">
                            @csrf
                            <div id="stepper1" class="bs-stepper step_options">
                                <div class="bs-stepper-header control_step_header">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle fonticon-option">
                                        <i class="fas fa-bolt"></i>
                                      </span>
                                            <span class="bs-stepper-label">Personal <br> Information</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle fonticon-option">
                                        <i class="far fa-user"></i>
                                      </span>
                                            <span class="bs-stepper-label">Contact <br> Information</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="btn step-trigger">
                                      <span class="bs-stepper-circle fonticon-option">
                                        <i class="fas fa-shield-alt"></i>
                                      </span>
                                            <span class="bs-stepper-label">Authentication</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="test-l-1" class="content">

                                        <div class="form-group">
                                            <label> First Name</label>
                                            <input value="{{old('first_name')}}" id="first_name" name="first_name" type="text" class="form-control2" placeholder="First Name">
                                            @if($errors->has('first_name'))
                                                <div class="er">
                                                    {!!  $errors->get('first_name')[0] !!}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label> Last Name</label>
                                            <input id="last_name" value="{{old('last_name')}}" name="last_name" type="text" class="form-control2" placeholder="Last Name">
                                            @if($errors->has('last_name'))
                                                <div class="er">
                                                    {!!  $errors->get('last_name')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label> Gender </label>
                                            <div class="select-box">
                                                <select id="gender" name="gender" class="form-control2 selectwide ignore">
                                                    <option value=""> Select Gender </option>
                                                    <option value="male"> Male </option>
                                                    <option value="female"> Female </option>
                                                </select>
                                            </div>

                                            @if($errors->has('gender'))
                                                <div class="er">
                                                    {!!  $errors->get('gender')[0] !!}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label> Date of birth </label>
                                            <input value="{{old('dateofbirth')}}" id="dateofbirth" name="dateofbirth" type="date" class="form-control2 date">
                                            @if($errors->has('dateofbirth'))
                                                <div class="er">
                                                    {!!  $errors->get('dateofbirth')[0] !!}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="mt-5">
                                            <button type="button" class="theme-btn style-two display_block" onclick="goNext('1')">Next</button>
                                        </div>


                                    </div>
                                    <div id="test-l-2" class="content">

                                        <div class="form-group">
                                            <label> Address </label>
                                            <input value="{{old('address')}}" id="address" name="address" type="text" class="form-control2" placeholder="Address">
                                            @if($errors->has('address'))
                                                <div class="er">
                                                    {!!  $errors->get('address')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label> Phone Number </label>
                                            <input value="{{old('phone_number')}}" id="phone_number" name="phone_number" type="text" class="form-control2" placeholder="Phone number">
                                            @if($errors->has('phone_number'))
                                                <div class="er">
                                                    {!!  $errors->get('phone_number')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Nationality</label>
                                            <select class="form-control2 selectwide ignore" id="country" name="country">
                                                <option value="">Select Option</option>
                                                <?php
                                                    $country = \App\Models\countryList::all();
                                                    foreach ($country as $item){ ?>
                                                       <option value="{{$item->name}}">{{$item->name}}</option>
                                                    <?php }
                                                ?>
                                            </select>
                                            @if($errors->has('country'))
                                                <div class="er">
                                                    {!!  $errors->get('country')[0] !!}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label> State </label>
                                            <input value="{{old('country')}}" id="state" name="state" type="text" class="form-control2" placeholder="State">
                                            @if($errors->has('state'))
                                                <div class="er">
                                                    {!!  $errors->get('state')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <button type="button" class="theme-btn style-two display_block mt-5" onclick="goNext('2')">Next</button>
                                        <button type="button" class="theme-btn style-one-black display_block mt-3" onclick="stepper1.previous()">Previous</button>
                                    </div>
                                    <div id="test-l-3" class="content">

                                        <div class="form-group">
                                            <label> Email </label>
                                            <input value="@if($email) {{$email}} @else {{old('email')}} @endif" id="email" name="email" type="text" class="form-control2" placeholder="Email Address">
                                            @if($errors->has('email'))
                                                <div class="er">
                                                    {!!  $errors->get('email')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label> Username </label>
                                            <input value="{{old('username')}}" id="username" name="username" type="text" class="form-control2" placeholder="Username">
                                            @if($errors->has('username'))
                                                <div class="er">
                                                    {!!  $errors->get('username')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label> Password </label>
                                            <input id="password" name="password" type="password" class="form-control2" placeholder="password">
                                            @if($errors->has('password'))
                                                <div class="er">
                                                    {!!  $errors->get('password')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label> Confirm Password </label>
                                            <input id="confirm_password" name="confirm_password" type="password" class="form-control2" placeholder="Confirm Password">
                                            @if($errors->has('confirm_password'))
                                                <div class="er">
                                                    {!!  $errors->get('confirm_password')[0] !!}
                                                </div>
                                            @endif
                                        </div>


                                        <button type="button" class="theme-btn style-two-green display_block mt-5" onclick="goNext('3')">Submit</button>
                                        <button type="button" class="theme-btn style-one-black display_block mt-3" onclick="stepper1.previous()">Previous</button>
                                    </div>

                                    <div class="other_auth_option">
                                        Already have an account ? - <a href="{{route('login')}}"> Login</a> <br>
                                        Forgotten Password ? - <a href="{{route('resetPassword')}}"> Reset Password</a>
                                    </div>
                                </div>
                            </div>
                        </form>

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

        function goNext(position){


            if(position == "1"){
                let firstname = $('#first_name').val();
                let lastname = $('#last_name').val();
                let gender = $('#gender').val();
                let dateofbirth = $('#dateofbirth').val();

                if(!firstname.trim().length === 0 || !lastname.trim().length === 0 || gender.trim().length === 0 || dateofbirth.trim().length === 0){
                    Swal.fire({
                        title: 'Error!',
                        text: 'All fields & inputs are required',
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    })
                } else {
                    stepper1.next()
                }
            }


            if(position == "2"){
                let address = $('#address').val();
                let phone_number = $('#phone_number').val();
                let country = $('#country').val();
                let state = $('#state').val();

                if(!address.trim().length === 0 || !phone_number.trim().length === 0 || country.trim().length === 0 || state.trim().length === 0){
                    Swal.fire({
                        title: 'Error!',
                        text: 'All fields & inputs are required',
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    })
                } else {
                    stepper1.next()
                }
            }



            if(position == "3"){
                let email = $('#email').val();
                let username = $('#username').val();
                let password = $('#password').val();
                let confirm_password = $('#confirm_password').val();

                if(!email.trim().length === 0 || !username.trim().length === 0 || password.trim().length === 0 || confirm_password.trim().length === 0){
                    Swal.fire({
                        title: 'Error!',
                        text: 'All fields & inputs are required',
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    })
                } else {
                    if(isEmail(email)){
                        if(password.trim() !== confirm_password.trim()){
                            Swal.fire({
                                title: 'Error!',
                                text: 'Sorry password does not match',
                                icon: 'error',
                                confirmButtonText: 'Continue'
                            })
                        } else {
                            $("#form").submit();
                        }
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Please enter a valid email address, specifically with the @ symbol.',
                            icon: 'error',
                            confirmButtonText: 'Continue'
                        })
                    }
                }
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>
@endsection