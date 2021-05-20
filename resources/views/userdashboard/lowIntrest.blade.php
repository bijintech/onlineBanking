@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid pt-25">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Savings Account </h6>
                            </div> 
                            <div class="pull-right">
                                <a href="{{ route('account-topup', 'savings') }}">
                                    <button class="btn btn-danger" style="background: green !important">Deposit</button>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Account Number : <h3><span class="txt-dark block counter">{{ $account->savings_acct }}</span></h3></p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>Balance : <h3><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->savings_balance) }}</span></span></h3> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Current Account </h6>
                            </div> 
                            <div class="pull-right">
                                <a href="{{ route('account-topup', 'current') }}">
                                    <button class="btn btn-danger" style="background: green !important">Deposit</button>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Account Number : <h3><span class="txt-dark block counter">{{ $account->current_acct }}</span></h3></p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>Balance : <h3><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->current_balance) }}</span></span></h3> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Fixed Account </h6>
                            </div> 
                            <div class="pull-right">
                                <a href="{{ route('account-topup', 'fixed') }}">
                                    <button class="btn btn-danger" style="background: green !important">Deposit</button>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Account Number : <h3><span class="txt-dark block counter">{{ $account->fixed_acct }}</span></h3></p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>Balance : <h3><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->fixed_balance) }}</span></span></h3> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading" style="background: #84c284;">
                            <h6 class="text-white">Savings Account ROI is {{ $settings->savings_acct_roi }}% after a duration of {{ $settings->savings_acct_roi_days }}days </h6>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Last Deposit : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ ($savings_last_deposit === 0)?0:number_format($savings_last_deposit->deposited_amount) }}</span></span></h4> </p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>ROI : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->savings_roi_balance) }}</span></span></h4> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading" style="background: #84c284;">
                            <h6 class="text-white">Current Account ROI is {{ $settings->current_acct_roi }}% after a duration of {{ $settings->curren_acctt_roi_days }}days </h6>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Last Deposit : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ ($current_last_deposit === 0)?0:number_format($current_last_deposit->deposited_amount) }}</span></span></h4> </p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>ROI : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->current_roi_balance) }}</span></span></h4> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading" style="background: #84c284;">
                            <h6 class="text-white">Fixed Account ROI is {{ $settings->fixed_acct_roi }}% after a duration of {{ $settings->fixed_acct_roi_days }}days </h6>
                            <div class="clearfix"></div>
                        </div>
                        <div  class="panel-wrapper collapse in">
                            <div  class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <p>Last Deposit : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ ($fixed_last_deposit === 0)?0:number_format($fixed_last_deposit->deposited_amount) }}</span></span></h4> </p>
                                    </div> 
                                    <div class="col-lg-6 text-center">
                                        <p>ROI : <h4><span class="txt-dark block counter">$<span class="counter-anim">{{ number_format($account->fixed_roi_balance) }}</span></span></h4> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

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
                                                    <th>Coin Name</th>
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
                                                            <td>${{ number_format($each_transactions->deposited_amount) }}</td>
                                                            <td>{{ $each_transactions->coin_eq }}</td>
                                                            <td>Bitcoin</td>
                                                            <td>{{ $each_transactions->transaction_type }}</td>
                                                            <td>
                                                                <button class="btn btn-{{ ($each_transactions->status === 'pending')?'default':'success' }}">{{ $each_transactions->status }}</button>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-{{ ($each_transactions->payment_proof === null)?'danger':'primary' }}">{{ ($each_transactions->payment_proof === null)?'No':'Yes' }}</button>
                                                            </td>
                                                            <td>{{ $each_transactions->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <a href="{{ route('comfrim-deposit', $each_transactions->unique_id) }}">
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
            <!-- /Row -->

            <!-- /Row -->
            @include('partials.userdashboard.footer')
        </div>
        @include('partials.userdashboard.footer')
        </div>
    <!-- /Main Content -->
@endsection

@section('script')
<!-- Data table JavaScript -->
<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
@stop

