@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark">My Account</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="user_profile_image">
                                        <img src="{{asset('uploads/images/'.auth()->user()->avatar)}}">
                                    </div>

                                    <hr class="light-grey-hr row mt-10 mb-15"/>

                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="mr-10 pull-left">
                                                <b>Name:</b>
                                            </div>
                                            <div class="pull-left">
                                                {{auth()->user()->first_name}}  {{auth()->user()->last_name}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr class="light-grey-hr row mt-10 mb-15"/>
                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="mr-10 pull-left">
                                                <b>Gender:</b>
                                            </div>
                                            <div class="pull-left">
                                                {{auth()->user()->gender}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr class="light-grey-hr row mt-10 mb-15"/>

                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="mr-10 pull-left">
                                                <b>Email:</b>
                                            </div>
                                            <div class="pull-left">
                                                {{auth()->user()->email}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr class="light-grey-hr row mt-10 mb-15"/>

                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="mr-10 pull-left">
                                                <b>Country:</b>
                                            </div>
                                            <div class="pull-left">
                                                {{auth()->user()->country}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <hr class="light-grey-hr row mt-10 mb-15"/>
                                    <div class="label-chatrs">
                                        <div class="">
                                            <div class="mr-10 pull-left">
                                                <b>Date of birth:</b>
                                            </div>
                                            <div class="pull-left">
                                                {{\Carbon\carbon::parse(auth()->user()->dateofbirth)->format('d, M Y')}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark">Edit Account</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                   <div class="user_profile_form">

                                      <div class="ml-45">
                                          <div class="panel-wrapper collapse in">
                                              <div  class="panel-body">
                                                  <div  class="tab-struct custom-tab-1">
                                                      <ul role="tablist" class="nav nav-tabs ver-nav-tab" id="myTabs_8">
                                                          <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_8" href="#home_8">Account</a></li>
                                                          <li role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_9" href="#home_9">Other Information</a></li>
                                                          <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_9" role="tab" href="#profile_9" aria-expanded="false">Security</a></li>
                                                      </ul>
                                                      <div class="tab-content" id="myTabContent_8">
                                                          <div id="home_8" class="tab-pane fade active in" role="tabpanel">
                                                              <div class="form-wrap">
                                                                  <form method="post" action="{{route('customerAccountPost')}}">
                                                                      @csrf
                                                                      <input type="hidden" name="action_type" value="update_account">
                                                                      <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                                                          <label class="control-label mb-10">First Name</label>
                                                                          <input name="first_name" value="{{auth()->user()->first_name}}" type="text" class="form-control">
                                                                          @if($errors->has('first_name'))
                                                                              <div class="er">
                                                                                  {!!  $errors->get('first_name')[0] !!}
                                                                              </div>
                                                                          @endif
                                                                      </div>
                                                                      <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                                                          <label class="control-label mb-10">Last Name</label>
                                                                          <input name="last_name" value="{{auth()->user()->last_name}}" type="text" class="form-control">
                                                                          @if($errors->has('last_name'))
                                                                              <div class="er">
                                                                                  {!!  $errors->get('last_name')[0] !!}
                                                                              </div>
                                                                          @endif
                                                                      </div>
                                                                      <div class="form-group @if($errors->has('username')) has-error @endif">
                                                                          <label class="control-label mb-10">Username</label>
                                                                          <input name="username" value="{{auth()->user()->username}}" type="text" class="form-control">
                                                                          @if($errors->has('username'))
                                                                              <div class="er">
                                                                                  {!!  $errors->get('username')[0] !!}
                                                                              </div>
                                                                          @endif
                                                                      </div>
                                                                      <div class="form-group @if($errors->has('email')) has-error @endif">
                                                                          <label class="control-label mb-10">Email address</label>
                                                                          <input name="email" disabled="disabled" value="{{auth()->user()->email}}" type="email" class="form-control">
                                                                          @if($errors->has('email'))
                                                                              <div class="er">
                                                                                  {!!  $errors->get('email')[0] !!}
                                                                              </div>
                                                                          @endif
                                                                      </div>

                                                                      <button type="submit" class="btn btn-success mr-10 mt-30 display_block_1">Submit</button>
                                                                  </form>
                                                              </div>
                                                          </div>
                                                          <div  id="home_9" class="tab-pane fade" role="tabpanel">
                                                              <form method="post" action="{{route('customerAccountPost')}}">
                                                                  @csrf
                                                                  <input type="hidden" name="action_type" value="update_info">
                                                                  <div class="form-group @if($errors->has('address')) has-error @endif">
                                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Address</label>
                                                                      <input name="address" value="{{auth()->user()->address}}" type="text" class="form-control">
                                                                      @if($errors->has('address'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('address')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('country')) has-error @endif">
                                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Country</label>
                                                                      <select name="country" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                          <?php
                                                                          $country = \App\Models\countryList::all();
                                                                          foreach ($country as $item){ ?>
                                                                          <option value="{{$item->name}}" {{auth()->user()->country == $item->name ? "selected" : ""}}>{{$item->name}}</option>
                                                                          <?php }
                                                                          ?>
                                                                      </select>
                                                                      @if($errors->has('country'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('country')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('state')) has-error @endif">
                                                                      <label class="control-label mb-10" for="exampleInputEmail_1">State</label>
                                                                      <input name="state" value="{{auth()->user()->state}}" type="text" class="form-control">
                                                                      @if($errors->has('state'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('state')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('dateofbirth')) has-error @endif">
                                                                      <label class="control-label mb-10" for="exampleInputEmail_1">Date of birth</label>
                                                                      <input name="dateofbirth" disabled="disabled" value="{{auth()->user()->dateofbirth}}" type="date" class="form-control">
                                                                      @if($errors->has('dateofbirth'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('dateofbirth')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('gender')) has-error @endif">
                                                                      <label class="control-label mb-10">Gender</label>
                                                                      <div>
                                                                          <div class="radio">
                                                                              <input name="gender" type="radio" id="radio_1" value="Male" {{auth()->user()->gender == "Male" ? "checked" : ""}}>
                                                                              <label for="radio_1">
                                                                                  Male
                                                                              </label>
                                                                          </div>
                                                                          <div class="radio">
                                                                              <input type="radio" name="gender" id="radio_2" value="Female" {{auth()->user()->gender == "Female" ? "checked" : ""}}>
                                                                              <label for="radio_2">
                                                                                  Female
                                                                              </label>
                                                                          </div>
                                                                      </div>
                                                                  </div>

                                                                  <button type="submit" class="btn btn-success mr-10 mt-30 display_block_1">Submit</button>
                                                              </form>
                                                          </div>
                                                          <div  id="profile_9" class="tab-pane fade" role="tabpanel">
                                                              <form method="post" action="{{route('customerAccountPost')}}">
                                                                  @csrf
                                                                  <input type="hidden" name="action_type" value="update_password">
                                                                  <div class="form-group @if($errors->has('current_password')) has-error @endif">
                                                                      <label class="control-label mb-10">Current Password</label>
                                                                      <input name="current_password" type="password" class="form-control">
                                                                      @if($errors->has('current_password'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('current_password')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('new_password')) has-error @endif">
                                                                      <label class="control-label mb-10">New Password</label>
                                                                      <input name="new_password"  type="password" class="form-control">
                                                                      @if($errors->has('new_password'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('new_password')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>
                                                                  <div class="form-group @if($errors->has('new_password_confirmation')) has-error @endif">
                                                                      <label class="control-label mb-10">New Password Confirmation</label>
                                                                      <input name="new_password_confirmation" type="password" class="form-control">
                                                                      @if($errors->has('new_password_confirmation'))
                                                                          <div class="er">
                                                                              {!!  $errors->get('new_password_confirmation')[0] !!}
                                                                          </div>
                                                                      @endif
                                                                  </div>

                                                                  <button type="submit" class="btn btn-success mr-10 mt-30 display_block_1">Submit</button>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                @include('partials.userdashboard.footer')
            </div>
        @include('partials.userdashboard.footer')
        </div>
    <!-- /Main Content -->
@endsection

@section('script')

@stop

