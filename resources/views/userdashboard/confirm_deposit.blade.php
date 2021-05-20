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
                                <h6 class="panel-title txt-dark">Make Deposit </h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                       <div class="col-lg-12">
                                            <div class="alert alert-warning">
                                                <p>Please deposit the total sum of <b>${{ number_format($transaction->deposited_amount ) }}</b> equivalent to <b>{{ $transaction->coin_eq}}</b> {{ $currency->name  }} to the following information</p> 
                                            </div>
                                       </div>
                                       <div class="col-lg-12">
                                            <div class="classable_wallet">
                                                <p class="text-center">Wallet Address:</p>
                                                <b class="text-center">{{ $currency->wallet_address }}</b>
                                            </div>
                                       </div>
                                        
                                        <div class="col-lg-6 col-lg-offset-3 col-6 col-offset-3">
                                            <p class="text-center bold_h">QR Code:</p>
                                            <img src="{{ asset('uploads/currency_qrCodes/'.$currency->qr_code) }}" alt="{{ $currency->name }}" style="width: 100%; height:100%">

                                            <p class="bold_h text-center text-{{ ($transaction->status === 'pending')?'danger':'success' }}">{{ $transaction->status }}</p>
                                        </div>

                                        <div class="col-lg-12">
                                            <form action="{{ route('depositProofUpload', $transaction->unique_id  ) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group @if($errors->has('image_proof')) has-error @endif mt-20">
                                                    <label class="control-label mb-10" for="image_proof">Image Proof</label>
                                                    <input name="image_proof" id="image_proof" value="{{old('image_proof')}}" type="file" class="form-control" required>
                                                    @if($errors->has('image_proof'))
                                                        <div class="er">
                                                            {!!  $errors->get('image_proof')[0] !!}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                   <button type="submit" class="btn btn-primary">Upload Proof</button>
                                                </div>
                                            </form>
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

