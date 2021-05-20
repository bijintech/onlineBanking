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
            <h5>Savings</h5>
            <h4>Everyone is better off with the Fiona Bank Bonus Savings Account.</h4>
            <p><span style="font-size: medium;">&nbsp;</span></p>
            <p><b>Features and benefits at a glance</b></p>

            <ul class="main-content-list">
                <li>
                    <p>A variable interest rate of <strong>0.50%</strong> plus a bonus of <strong>0.25%</strong> p.a. if no withdrawals for 12 consecutive months</p>
                </li>
                <li>
                    <p>Minimum deposit €2,000</p>
                </li>
                <li>
                    <p>Interest paid annually</p>
                </li>
                <li>
                    <p>No account opening or maintenance fees</p>
                </li>
            </ul>

            <p>Finally, a savings account which rewards you for good saving habits!</p>
            <p><span style="font-size: medium;">&nbsp;</span></p>
        </article>
    </div>
@endsection