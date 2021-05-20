@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark">Your Digital Wallet</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="user_profile_form">
                                        <div class="ml-10 mr-10">
                                            <div class="panel-wrapper collapse in">
                                                <?php $wallet = App\Models\userWallets::where('user_id', auth()->user()->id)->first(); ?>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-heading">
                                                                    <div class="pull-left">
                                                                        <h6 class="panel-title txt-dark">Bitcoin Wallet</h6>
                                                                    </div> 
                                                                    <div class="pull-right">
                                                                        <a href="{{ route('fund-wallet', 'BTC') }}">
                                                                            <button class="btn btn-danger" style="background: green !important">Deposit BTC</button>
                                                                        </a>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div  class="panel-wrapper collapse in">
                                                                    <div  class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 text-center">
                                                                                <p>Coin Balance : <h4><span class="txt-dark block counter">{{ $wallet->bitcoin }}</span></h4></p>
                                                                            </div> 
                                                                            <div class="col-lg-6 text-center">
                                                                                <?php $new_amount = $wallet->bitcoin * $settings->btc_exchage_rate ?>
                                                                                <p>Currency Equivalent: <h4><span class="txt-dark block counter">$<span class="counter-anim">{{number_format($new_amount, 8)}}</span></span></h4> </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-heading">
                                                                    <div class="pull-left">
                                                                        <h6 class="panel-title txt-dark">Ethereum Wallet</h6>
                                                                    </div> 
                                                                    <div class="pull-right">
                                                                        <a href="{{ route('fund-wallet', 'ETH') }}">
                                                                            <button class="btn btn-danger" style="background: green !important">Deposit ETH</button>
                                                                        </a>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div  class="panel-wrapper collapse in">
                                                                    <div  class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 text-center">
                                                                                <p>Coin Balance : <h4><span class="txt-dark block counter">{{ $wallet->ethereum }}</span></h4></p>
                                                                            </div> 
                                                                            <div class="col-lg-6 text-center">
                                                                                <?php $newAmount = $wallet->ethereum * $settings->eth_exchage_rate ?>
                                                                                <p>Currency Equivalent: <h4><span class="txt-dark block counter">$<span class="counter-anim">{{number_format($newAmount, 8)}}</span></span></h4> </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                        {{-- <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Lite coin
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->litecoin}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Tron
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->tron}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Dogecoin
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->dogecoin}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    USDT
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->usdt}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Binance USD
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->binance_usd}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Bitcoin Cash
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->bitcoin_cash}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Ripple
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->ripple}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="small_pan_wallet_info">
                                                                <div class="small_pen_pan_name">
                                                                    Perfect Money
                                                                </div>
                                                                <div class="small_pen_pen_details">
                                                                    Balance : {{$wallet->perfect_money}}
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="panel panel-default card-view">
                                                                <div class="panel-heading">
                                                                    <div class="pull-left">
                                                                        <h6 class="panel-title txt-dark">Transaction History</h6>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body">
                                                                        <div class="table-wrap">
                                                                            <div class="table-responsive">
                                                                                <table id="datable_1" class="table table-hover display  pb-30" >
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>S / N</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Coin Equivalent</th>
                                                                                            <th>Coin Type</th>
                                                                                            <th>Transaction Type</th>
                                                                                            <th>Status</th>
                                                                                            <th>Proof Status</th>
                                                                                            <th>Date Created</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @if (count($transactions) > 0)
                                                                                            @php $count = 1; @endphp
                                                                                            @foreach ($transactions as $each_transactions)
                                                                                                <tr>
                                                                                                    <td>{{ $count }}</td>
                                                                                                    <td>${{ number_format($each_transactions->amount) }}</td>
                                                                                                    <td>{{ $each_transactions->coin_equivalent }}</td>
                                                                                                    <td>{{ $each_transactions->coin_type }}</td>
                                                                                                    <td>{{ $each_transactions->transaction_type }}</td>
                                                                                                    <td>
                                                                                                        <button class="btn btn-{{ ($each_transactions->status === 'pending')?'default':'success' }}">{{ $each_transactions->status }}</button>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <button class="btn btn-{{ ($each_transactions->proof_status === 'pending')?'danger':'primary' }}">{{ ($each_transactions->proof_status === 'pending')?'No':'Yes' }}</button>
                                                                                                    </td>
                                                                                                    <td>{{ $each_transactions->created_at->diffForHumans() }}</td>
                                                                                                    <td>
                                                                                                        <a href="{{ route('comfirm-topup', $each_transactions->unique_id) }}">
                                                                                                            <button class="btn btn-info">View</button>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @php $count++ @endphp
                                                                                            @endforeach
                                        
                                                                                        @else
                                                                                            <tr>
                                                                                                <td>No transaction available at this time</td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    </tbody>
                                                                                </table>
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

