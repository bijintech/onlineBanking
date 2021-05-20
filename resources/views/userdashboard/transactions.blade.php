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
                                <h6 class="panel-title txt-dark text-left">Transactions</h6>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body transaction_body_section">


                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            @php
                                                $cases = \App\Models\recoverFundsCases::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
                                            @endphp

                                            @if($cases->count() > 0)
                                                <table class="table table-responsive table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <td> Amount (USD) </td>
                                                        <td> Final Amount </td>
                                                        <td> Transaction Type </td>
                                                        <td> Rate </td>
                                                        <td> Status </td>
                                                        <td> Date </td>
                                                        <td>  </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $item)
                                                        <tr>
                                                            <td class="border-none">{{$item->deposited_amount}}</td>
                                                            <td class="border-none">{{$item->final_amount}}</td>
                                                            <td class="border-none">{{$item->transaction_type}}</td>
                                                            <td class="border-none">{{$item->transaction_rate}}</td>
                                                            <td class="border-none">
                                                            @if($item->status == 0)
                                                                <button class="case_stats in_progress" type="button">Pending</button>
                                                            @elseif($item->status == 1)
                                                                <button class="case_stats processing" type="button">In-progress</button>
                                                            @else
                                                                <button class="case_stats confirmed" type="button">Confirmed</button>
                                                            @endif
                                                            </td>
                                                            <td class="border-none">{{$item->created_at->diffForHumans()}}</td>
                                                            <td class="border-none"><a class="the_actional_link" href="{{route('transactionsSingle', $item->id)}}">View details</a> </td>
                                                        </tr>
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

