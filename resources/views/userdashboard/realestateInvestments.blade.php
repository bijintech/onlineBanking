@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="row">
                    
                    <!-- Product Row One -->
                    @if(count($estateInvestmentsModel) > 0)
                    <div class="row">
                        @foreach ($estateInvestmentsModel as $each_investments)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                <div class="panel panel-default card-view pa-0">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body pa-0">
                                            <article class="col-item">
                                                <div class="photo">
                                                    <a href="#"> 
                                                        <img src="{{ asset('storage/investments/'.$each_investments->invest_image) }}" class="img-responsive image_size" alt="{{ $each_investments->location }}" /> 
                                                        <p>{{ $each_investments->description }}</p>
                                                    </a>
                                                </div>
                                                
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <h6>{{ $each_investments->location }}</h6>
                                                            <span class="head-font block text-warning font-16">ROI: {{ $each_investments->investment_roi }}%</span>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <a href="{{ route('make-investment', $each_investments->unique_id ) }}">
                                                                <button class="btn btn-danger">Invest ({{ $each_investments->investment_roi }}% roi)</button>
                                                            </a>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </article>
                                        </div>
                                    </div>	
                                </div>	
                            </div>	
                        @endforeach				
                    </div>	
                    @else
                    <div class="row">
                        <div class="alert alert-success">No record is found</div>
                    </div>
                    @endif
                    <!-- /Product Row Four -->

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

