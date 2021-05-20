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
                                <h6 class="panel-title txt-dark">Crypto Deposit </h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">

                                    <form class="digital_coin_div" action="{{route('accountTopup')}}" method="post">
                                        @csrf

                                        <div class="form-group @if($errors->has('coin')) has-error @endif">
                                            <label class="control-label mb-10" for="exampleInputEmail_1">Crypto Currency</label>
                                            <select name="coin" class="form-control" data-placeholder="Choose a Currency" tabindex="1">
                                               <option value="">Select Option</option>
                                               @if (count($currency) > 0)
                                                @foreach ($currency as $each_currency)
                                                    <option value="{{ $each_currency->unique_id }}">{{ $each_currency->name }}</option>
                                                @endforeach
                                               @endif
                                            </select>
                                            @if($errors->has('coin'))
                                                <div class="er">
                                                    {!!  $errors->get('coin')[0] !!}
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

                                        <input type="hidden" class="form-control" name="action_type" value="{{ Request::segment(2) }}">

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

