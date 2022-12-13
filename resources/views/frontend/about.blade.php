@extends('frontend.layouts.frontend_layouts')
@section('title','About | Tax Mall')
@section('content')
    <section class="pricing-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>About Us</h2>
                <div class="bar"></div>
                <p>We teach you to grow your Business
                    Tax mall Private Limited is a startup company which aims at providing Financial Literacy to each and
                    every corner of the Country. It aims at providing practical knowledge related to Business
                    Strategies, Taxation, Finance, Investment, Stock Market, Budget, Business and Finance Management in
                    an innovative manner. Our vision is to make India’s youth financially literate.
                    We aim at providing top quality content combined with animated videos for Young and Enthusiastic
                    Entrepreneurs, Solopreneurs, Small Businesses and Commerce Students..</p>
            </div>

        </div>
        <div class="default-shape">
            <div class="shape-1">
                <img src="{{asset('frontend/assets/img/shape/1.png')}}" alt="image">
            </div>
            <div class="shape-2 rotateme">
                <img src="{{asset('frontend/assets/img/shape/2.png')}}" alt="image">
            </div>
            <div class="shape-3">
                <img src="{{asset('frontend/assets/img/shape/3.svg')}}" alt="image">
            </div>
            <div class="shape-4">
                <img src="{{asset('frontend/assets/img/shape/4.svg')}}" alt="image">
            </div>
            <div class="shape-5">
                <img src="{{asset('frontend/assets/img/shape/5.png')}}" alt="image">
            </div>
        </div>
    </section>


@endsection
