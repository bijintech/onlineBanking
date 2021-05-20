@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark">Deposit digital currency</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <p>Exchange your digital currency into another</p>

                                    <form class="digital_coin_div" action="{{route('customerDepositPost')}}" method="post">
                                        @csrf

                                        <div class="form-group @if($errors->has('coin')) has-error @endif">
                                            <label class="control-label mb-10" for="exampleInputEmail_1">Exchange</label>
                                            <select name="coin" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                               <option value="">Select Option</option>
                                               <option value="bitcoin">Bitcoin</option>
                                               <option value="ethereum">Ethereum</option>
                                               <option value="litecoin">Litecoin</option>
                                               <option value="tron">Tron</option>
                                               <option value="dogecoin">Dogecoin</option>
                                               <option value="usdt">Usdt</option>
                                               <option value="binance_usd">Binance Usd</option>
                                               <option value="bitcoin_cash">Bitcoin Cash</option>
                                               <option value="ripple">Ripple</option>
                                               <option value="perfect_money">Perfect Money</option>
                                            </select>
                                            @if($errors->has('coin'))
                                                <div class="er">
                                                    {!!  $errors->get('coin')[0] !!}
                                                </div>
                                            @endif

                                        </div>

                                        <label class="control-label mb-10" for="exampleInputEmail_1">For</label>
                                        <select name="coin" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="">Select Option</option>
                                            <option value="bitcoin">Bitcoin</option>
                                            <option value="ethereum">Ethereum</option>
                                            <option value="litecoin">Litecoin</option>
                                            <option value="tron">Tron</option>
                                            <option value="dogecoin">Dogecoin</option>
                                            <option value="usdt">Usdt</option>
                                            <option value="binance_usd">Binance Usd</option>
                                            <option value="bitcoin_cash">Bitcoin Cash</option>
                                            <option value="ripple">Ripple</option>
                                            <option value="perfect_money">Perfect Money</option>
                                        </select>


                                        <div class="form-group @if($errors->has('amount')) has-error @endif mt-20">
                                            <label class="control-label mb-10" for="exampleInputEmail_1">Amount in USD</label>
                                            <input placeholder="e.g 50" name="amount" value="{{old('amount')}}" type="text" class="form-control">
                                            @if($errors->has('amount'))
                                                <div class="er">
                                                    {!!  $errors->get('amount')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="amount_in_usdd">
                                            Amount +1% Flat Fee - Transaction fee
                                        </div>

                                        <button href="javascript:void(0)" class="recover_action_btn">Deposit</button>
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

