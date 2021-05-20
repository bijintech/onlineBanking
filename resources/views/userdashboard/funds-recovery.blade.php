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
                                <h6 class="panel-title txt-dark">Recover Funds</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <p>In other to initiate the funds recovery process, you have to provide the following details, which would help our invtigative team carry out there research in a legal way.</p>

                                    <div class="recover_headline">Be sure you have the following details</div>
                                    <div class="recover_outline">
                                        <ul>
                                            <li>Platform at which you lost your fund</li>
                                            <li>Exact amount that was lost</li>
                                            <li>Currency stolen or lost</li>
                                            <li>Proof (Image /  Screenshots or Email) affirming you lost the stipulated fund</li>
                                        </ul>
                                    </div>


                                    <!-- sample modal content -->
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="myModalLabel">Recover Lost Or Stolen Funds</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data" action="{{route('fundsRecoveryPost2')}}" method="post">
                                                        @csrf
                                                        <div class="form-group @if($errors->has('name_of_platform')) has-error @endif">
                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Name of platform </label>
                                                            <input name="name_of_platform" value="{{old('name_of_platform')}}" type="text" class="form-control">
                                                            @if($errors->has('name_of_platform'))
                                                                <div class="er">
                                                                    {!!  $errors->get('name_of_platform')[0] !!}
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group @if($errors->has('amount_lost')) has-error @endif">
                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Amount lost </label>
                                                            <input name="amount_lost" value="{{old('amount_lost')}}" type="text" class="form-control">
                                                            @if($errors->has('amount_lost'))
                                                                <div class="er">
                                                                    {!!  $errors->get('amount_lost')[0] !!}
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group @if($errors->has('currency')) has-error @endif">
                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Currency</label>
                                                            <select name="currency" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="">Select Option</option>
                                                                <option value="Crypto">Crypto</option>
                                                                <option value="WellsFargos">Dollar</option>
                                                                <option value="WellsFargos">Pound</option>
                                                                <option value="WellsFargos">Euro</option>
                                                            </select>
                                                            @if($errors->has('currency'))
                                                                <div class="er">
                                                                    {!!  $errors->get('currency')[0] !!}
                                                                </div>
                                                            @endif
                                                        </div>



                                                        <div class="form-group @if($errors->has('proof')) has-error @endif">
                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Proof of claims (Max. filesize: 5mb)</label>
                                                            <input name="proof" value="{{old('proof')}}" type="file" class="form-control">
                                                            @if($errors->has('proof'))
                                                                <div class="er">
                                                                    {!!  $errors->get('proof')[0] !!}
                                                                </div>
                                                            @endif
                                                        </div>


                                                        <div class="form-group @if($errors->has('lost_date')) has-error @endif">
                                                            <label class="control-label mb-10" for="exampleInputEmail_1">Date of loss </label>
                                                            <input name="lost_date" value="{{old('lost_date')}}" type="date" class="form-control">
                                                            @if($errors->has('lost_date'))
                                                                <div class="er">
                                                                    {!!  $errors->get('lost_date')[0] !!}
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success mb-30 display_block_1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <!-- Button trigger modal -->
                                    <button href="javascript:void(0)" class="recover_action_btn" data-toggle="modal" data-target="#myModal">Recover Funds</button>


                                    {{--<hr class="light-grey-hr row mt-10 mb-15"/>--}}

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
                                <h6 class="panel-title txt-dark">Recover lost or stolen funds</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="user_profile_form">
                                        <div class="ml-10 mr-10">
                                            <div class="panel-wrapper collapse in">
                                                <div  class="panel-body">
                                                    <div  class="tab-struct custom-tab-1 product-desc-tab">

                                                        <div class="alert alert-warning">

                                                            Our team of professionally trained cyber fraud security expert can help you recover lost or stolen funds back to your account, we have the best lawyers and cyber crime investigators who are trained to help recover
                                                            lost or stolen funds, funds recovery takes at least 30days for the investigation / and funds recovery process to be carried out successfully
                                                        </div>


                                                        <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_7">
                                                            <li role="presentation">
                                                                <a aria-expanded="false"  data-toggle="tab" role="tab" id="adi_tab" href="#adi_tab_detail">
                                                                    <span>Cases
                                                                        <span class="inline-block">(<span class="review-count">0</span>)</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="active" role="presentation">
                                                                <a aria-expanded="true"  data-toggle="tab" role="tab" id="descri_tab" href="#descri_tab_detail">
                                                                    <span>Reviews
                                                                        <span class="inline-block">(<span class="review-count">0</span>)</span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li role="presentation" class=""><a  data-toggle="tab" id="review_tab" role="tab" href="#review_tab_detail" aria-expanded="false"><span>Submit review</span></a></li>
                                                        </ul>
                                                        @php
                                                            $review = \App\Models\reviews::get();
                                                        @endphp
                                                        <div class="tab-content" id="myTabContent_7">
                                                            <div  id="descri_tab_detail" class="tab-pane fade active in pt-0 descri_tab_detail_22" role="tabpanel">
                                                                <div class="pt-15">
                                                                    @foreach($review as $item)
                                                                        <div class="customer_review_sections clearfix">
                                                                            <div class="col-md-1">
                                                                                <div class="customer_review_avatar">
                                                                                    <img src="{{asset('uploads/images/'.$item->avatar)}}" alt="user_auth" class="user-auth-img img-circle">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                <div class="customer_review_details">
                                                                                    <div class="customer_review-date">
                                                                                        <div class="reviewed_name">
                                                                                            <span class="reviewed-data-name">
                                                                                                {{$item->name}}
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="product-rating inline-block mb-10">
                                                                                            @if($item->rating == 1)
                                                                                                <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                                <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                                <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                                <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                                <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                            @endif

                                                                                            @if($item->rating == 2)
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                            @endif

                                                                                            @if($item->rating == 3)
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                            @endif

                                                                                            @if($item->rating == 4)
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star-outline"></a>
                                                                                            @endif

                                                                                            @if($item->rating == 5)
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                               <a href="javascript:void(0);" class="zmdi zmdi-star"></a>
                                                                                            @endif
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="customer_review_msg">
                                                                                        {{$item->comment}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div  id="adi_tab_detail" class="tab-pane pt-0 fade" role="tabpanel">
                                                                <div class="table-wrap">
                                                                    <div class="table-responsive">
                                                                     @php
                                                                         $cases = \App\Models\recoverFundsCases::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
                                                                     @endphp
                                                                     @if($cases->count() > 0)
                                                                         <table class="table table-responsive table-striped mb-0">
                                                                         <thead>
                                                                         <tr>
                                                                             <td> Name of Platform </td>
                                                                             <td> Amount Lost </td>
                                                                             <td> Currency </td>
                                                                             <td> Status </td>
                                                                             <td> Date of loss </td>
                                                                             <td> Case created at </td>
                                                                         </tr>
                                                                         </thead>
                                                                         <tbody>
                                                                         @foreach($cases as $item)
                                                                             <tr>
                                                                                 <td class="border-none">{{$item->name_of_platform}}</td>
                                                                                 <td class="border-none">{{$item->amount_lost}}</td>
                                                                                 <td class="border-none">{{$item->currency}}</td>
                                                                                 <td class="border-none"><button class="case_stats {{$item->status == "1" ? "in_progress" : "completed"}}" type="button">{{$item->status == "1" ? "In-progress" : "Completed"}}</button></td>
                                                                                 <td class="border-none">{{$item->lost_date}}</td>
                                                                                 <td class="border-none">{{$item->created_at->diffForHumans()}}</td>
                                                                             </tr>
                                                                         @endforeach

                                                                         </tbody>
                                                                         </table>
                                                                     @else

                                                                         <div class="user-has_no_case">
                                                                             Sorry you have not submitted any case thus far.
                                                                         </div>
                                                                     @endif


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div  id="review_tab_detail" class="tab-pane pt-0 fade" role="tabpanel">
                                                                <div class="row mt-40">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-wrap">
                                                                            <form action="{{route('fundsRecoveryPost')}}" method="post">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10" for="review">Your rating</label>
                                                                                    <div class='product-rating starrr' id='star1'></div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label mb-10" for="review">Your review</label>
                                                                                    <textarea class="form-control" id="review" placeholder="add review"></textarea>
                                                                                </div>


                                                                                <div class="form-group mb-0">
                                                                                    <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                                                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                @include('partials.userdashboard.footer')
            </div>
        </div>
    <!-- /Main Content -->
@endsection

@section('script')

    <!-- Starrr JavaScript -->
    <script src="{{asset('dist/js/starrr.js')}}"></script>

    <!-- Product Detail Data JavaScript -->
    <script src="{{asset('dist/js/product-detail-data.js')}}"></script>


@stop

