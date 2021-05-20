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
                                <h6 class="panel-title txt-dark">Exchange Coin </h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">

                                    <form class="digital_coin_div" action="{{route('coinExchange')}}" method="post">
                                        @csrf

                                        <div class="form-group @if($errors->has('coin')) has-error @endif">

                                            <label class="control-label mb-10" for="coin">From </label>
                                            <select name="coin" class="form-control" id="coin">
                                                <option selected value="bitcoin">Bitcoin</option>
                                                <option  value="ethereum">Ethereum</option>                                               
                                            </select>
                                            @if($errors->has('coin'))
                                                <div class="er">
                                                    {!!  $errors->get('coin')[0] !!}d
                                                </div>
                                            @endif

                                        </div>

                                        <div class="form-group @if($errors->has('t_coin')) has-error @endif">

                                            <label class="control-label mb-10" for="t_coin">To </label>
                                            <select name="t_coin" class="form-control" id="t_coin">
                                                <option  value="bitcoin">Bitcoin</option>
                                                <option selected  value="ethereum">Ethereum</option>                                               
                                            </select>
                                            @if($errors->has('t_coin'))
                                                <div class="er">
                                                    {!!  $errors->get('t_coin')[0] !!}d
                                                </div>
                                            @endif

                                        </div>

                                        <div class="form-group @if($errors->has('amount')) has-error @endif mt-20">
                                            <label class="control-label mb-10" for="amount">Amount in USD</label>
                                            <input placeholder="e.g 50" name="amount" value="{{old('amount')}}" id="amount" type="number" class="form-control">
                                            @if($errors->has('amount'))
                                                <div class="er">
                                                    {!!  $errors->get('amount')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="amount_in_usdd">
                                            You will be charge a service fee of {{ $settings->exchange_charge_fee  }}% - Transaction fee
                                        </div>

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

