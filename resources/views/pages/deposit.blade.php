@extends('layouts.app')

@section('content')

    <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Savings</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Savings</li>
                </ul>
            </div>
        </div>
    </section>
    @include('partials.quick-info')
    <div class="auto-container">
        <article class="cfix">
            <h5>Deposits</h5>
            <h4>Fix your investment return with our Euro or Sterling term deposits and benefit from higher guaranteed rates</h4>
            <p><span><b>Features and benefits at a glance</b></span></p>
            <ul class="main-content-list">
                <li>Know what return you’ll get with this fixed rate of interest</li>
                <li>Minimum deposit €2,000 or £5,000</li>
                <li>Interest calculated daily with flexible quarterly, half-yearly or annual payments</li>
                <li>No account opening or maintenance fees</li>
            </ul>
        </article>
    </div>
@endsection