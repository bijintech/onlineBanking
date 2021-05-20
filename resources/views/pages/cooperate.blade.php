@extends('layouts.app')

@section('content')

    <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Cooperate</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Cooperate</li>
                </ul>
            </div>
        </div>
    </section>
    @include('partials.quick-info')
    <div class="auto-container">
        <article class="cfix no-side-menu">
            <h5>Cooperate</h5>

            <p>Fiona Bank is a Maltese bank specialising in corporate financing solutions, individual/corporate deposit products and foreign exchange services. Main products and services include:</p>
            <div class="products">
                <div class="row">
                    <div class="col-md-6">
                        <div class="products__item">
                            <h4>Loans</h4>
                            <div class="divider divider-block"></div>
                            <ul class="main-content-list mb-1">
                                <li>Investment loan</li>
                                <li>Real estate loan</li>
                                <li>Project financing</li>
                                <li>Working capital loan</li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="products__item mr-0">
                            <h4>Foreign Exchange</h4>
                            <div class="divider divider-block"></div>
                            <ul class="main-content-list mb-1">
                                <li>128 currencies</li>
                                <li>International payment solution</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div></article>
    </div>
@endsection