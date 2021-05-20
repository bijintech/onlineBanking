@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            @if($data->status == 0)
                            <div class="panel-heading">
                                <h6 class="panel-title txt-dark text-center">Processing Deposit</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body transaction_body_section">



                                        <p class="transaction_ini_type"><b>Transaction initiated successfully</b> <br> in other to complete your fund deposit please follow the instructions below, then upload proof of payment in the upload section below.</p>
                                        <br>
                                        <div class="text-center"> Transfer a total of : {{$data->final_amount}} </div>
                                        {!! $info->payment_description !!}
                                        <!-- sample modal content -->
                                        <form enctype="multipart/form-data" action="{{route('transactionsSinglePost', $data->id)}}" method="post">
                                            @csrf
                                            <div class="form-group @if($errors->has('proof')) has-error @endif">
                                                <label class="control-label mb-10" for="exampleInputEmail_1">Upload deposit proof (Max. filesize: 5mb)</label>
                                                <input name="proof" value="{{old('proof')}}" type="file" class="form-control">
                                                @if($errors->has('proof'))
                                                    <div class="er">
                                                        {!!  $errors->get('proof')[0] !!}
                                                    </div>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-success mb-30 display_block_1">Submit</button>
                                        </form>


                                </div>
                            </div>

                            @endif

                            @if($data->status == 1)
                                <div class="panel-heading">
                                    <h6 class="panel-title txt-dark text-center">Processing Deposit</h6>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body transaction_body_section">

                                    <div class="text-center mb-15">
                                        <button class="case_stats processing" type="button">In-progress</button>
                                    </div>

                                    <div class="transaction_ini_type"> Processing deposit please check again in few minutes time
                                        <br> Typically, it takes 24hours to less to confirm deposit <br>
                                        <br> Final amount deposited : {!! $data->final_amount !!}
                                    </div>

                                    </div>
                                </div>
                            @endif


                            @if($data->status == 2)
                                <div class="panel-heading">
                                    <h6 class="panel-title txt-dark text-center">Deposit Confirmed</h6>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body transaction_body_section">

                                        <div class="text-center mb-15">
                                            <button class="case_stats confirmed" type="button">Confirmed</button>
                                        </div>

                                        <div class="transaction_ini_type"> Your deposit of {{$data->final_amount}} has been confirmed, a total of {{$data->final_amount}}
                                            has been credited into your {{$data->transaction_type}} wallet.
                                            <br> Finalized amount : {!! $data->final_amount !!}
                                        </div>

                                    </div>
                                </div>
                            @endif


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

