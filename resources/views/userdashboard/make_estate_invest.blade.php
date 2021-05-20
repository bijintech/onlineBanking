@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <div class="alert alert-warning">
                            Investment amount would be deducted from the account balance of any of your account, please ensure to have a funds before selecting either of the accounts  
                        </div>

                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark text-center">Real Estate Investment</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">

                                    <form class="digital_coin_div" action="{{route('add-investment')}}" method="post">
                                        @csrf
                                        <div class="form-group @if($errors->has('account')) has-error @endif">
                                            <label class="control-label mb-10" for="account">Select Preffered Account</label>
                                            <select name="account" class="form-control" data-placeholder="Choose an Account" id="account" required>
                                               <option value="">Select Option</option>
                                               <option selected value="savings">Savings Account ({{ number_format($accounts->savings_balance) }})</option>
                                               <option value="current">Current Account ({{ number_format($accounts->current_balance) }})</option>
                                               <option value="fixed">Fixed Account ({{ number_format($accounts->fixed_balance) }})</option>
                                               
                                            </select>
                                            @if($errors->has('coin'))
                                                <div class="er">
                                                    {!!  $errors->get('coin')[0] !!}
                                                </div>
                                            @endif
                                        </div>

                                        <input type="hidden" name="uniqueId" value="{{ Request::segment(2) }}" class="form-control">

                                        <div class="form-group @if($errors->has('amount')) has-error @endif mt-20">
                                            <label class="control-label mb-10" for="amount">Amount in USD</label>
                                            <input placeholder="e.g 50" id="amount" name="amount" value="{{old('amount')}}" type="number" class="form-control" required>
                                            @if($errors->has('amount'))
                                                <div class="er">
                                                    {!!  $errors->get('amount')[0] !!}
                                                </div>
                                            @endif
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

