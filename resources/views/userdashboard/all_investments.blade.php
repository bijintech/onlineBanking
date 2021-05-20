@extends('layouts.userdashboard')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <!-- Row -->
                <div class="col-md-12">
                    <div class="panel panel-default card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <h6 class="panel-title txt-dark text-left">Estate Investment Transactions</h6>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body transaction_body_section">


                                <div class="table-wrap">
                                    <div class="table-responsive">

                                        @if($investments->count() > 0)
                                            @php $count = 1; @endphp
                                            <table class="table table-responsive table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <td> S / N </td>
                                                    <td> Amount (USD) </td>
                                                    <td> Final Amount </td>
                                                    <td> Transaction Type </td>
                                                    <td> Investment Roi </td>
                                                    <td> Investment Duration </td>
                                                    <td> Status </td>
                                                    <td> Date </td>
                                                    {{-- <td> Action </td> --}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($investments as $item)
                                                    <tr>
                                                        <td class="border-none">{{ $count }}</td>
                                                        <td class="border-none">{{number_format($item->amount)}}</td>
                                                        <td class="border-none">{{number_format($item->final_amount)}}</td>
                                                        <td class="border-none">{{$item->account_type}}</td>
                                                        <td class="border-none">{{$item->investment_roi}}%</td>
                                                        <td class="border-none">{{$item->investment_duration}} Days</td>
                                                        <td class="border-none">
                                                        @if($item->status == 'pending')
                                                            <button class="case_stats in_progress" type="button">In-progress</button>
                                                        @else
                                                            <button class="case_stats confirmed" type="button">Completed</button>
                                                        @endif
                                                        </td>
                                                        <td class="border-none">{{$item->created_at->diffForHumans()}}</td>
                                                        {{-- <td class="border-none"><a class="the_actional_link" href="{{route('transactionsSingle', $item->id)}}">View details</a> </td> --}}
                                                    </tr>
                                                    @php $count++ @endphp
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else

                                            <div class="user-has_no_case">
                                                Sorry you have not submitted any case thus far.
                                            </div>
                                        @endif


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

