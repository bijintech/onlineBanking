@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <div class="alert alert-warning">

                            Due to COVID-19 pandamic, our Bank deposit option has been disabled, deposit can now be made with our cryptocurrency option. 
                        </div>

                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark">Digital Wallet Topup </h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">

                                    <form class="digital_coin_div" action="{{route('fundWallet')}}" method="post">
                                        @csrf

                                        <div class="form-group @if($errors->has('coin')) has-error @endif">
                                            @php $action = Request::segment(2); @endphp
                                            <label class="control-label mb-10" for="coin">Crypto Currency</label>
                                            <select name="coin" class="form-control" id="coin">

                                                @if ($action  == 'BTC')
                                                    <option value="bitcoin">Bitcoin</option>
                                                @elseif ($action  == 'ETH')
                                                    <option  value="ethereum">Ethereum</option>
                                                @endif
                                               
                                            </select>
                                            @if($errors->has('coin'))
                                                <div class="er">
                                                    {!!  $errors->get('coin')[0] !!}d
                                                </div>
                                            @endif

                                        </div>

                                        <div class="form-group @if($errors->has('amount')) has-error @endif mt-20">
                                            <label class="control-label mb-10" for="exampleInputEmail_1">Amount in USD</label>
                                            <input placeholder="e.g 50" name="amount" value="{{old('amount')}}" type="text" class="form-control">
                                            @if($errors->has('amount'))
                                                <div class="er">
                                                    {!!  $errors->get('amount')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <input type="hidden" class="form-control" name="action_type" value="{{ $action  }}">

                                        <button href="javascript:void(0)" class="recover_action_btn">Proceed</button>
                                    </form>


                                    {{--<hr class="light-grey-hr row mt-10 mb-15"/>--}}

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

