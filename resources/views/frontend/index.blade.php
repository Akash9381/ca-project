

@extends('frontend.layouts.frontend_layouts')
@section('title','Tax Mall - All in one Platform - ITR | GST | TDS | ROC | OTHER')
@section('content')
    <div id="home" class="main-banner">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner-content">
                                <h1>Welcome to<br> Tax Mall </h1>
                                <p>All in one Platform<br>
                                    ITR | GST | TDS | ROC | OTHER</p>
                                <!--<div class="banner-holder">
<a href="#">
<img src="assets/img/store/1.png" alt="image">
</a>
<a href="#">
<img src="assets/img/store/2.png" alt="image">
</a>
</div>-->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner-image">
                                <img src="{{asset('frontend/assets/img/mobile.png')}}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
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
    </div>


    <section id="features" class="features-area">
        <div class="container">
            <div class="section-title" style="visibility: hidden;">
                <h2>Awsome Features</h2>
                <div class="bar"></div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fa fa-sun"></i>
                        </div>
                        <h3>ITR</h3>
                        <p>Income Tax Return is the form in which assessee files information about his Income and tax
                            thereon to Income Tax Department. Various forms are ITR 1, ITR 2, ITR 3, ITR 4, ITR 5, ITR 6
                            and ITR 7. When you file a belated return, you are not allowed to carry forward certain
                            losses.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fa fa-lightbulb"></i>
                        </div>
                        <h3>GST</h3>
                        <p>The proposed goods and services tax (GST) regime, slated to be introduced from April 1, 2016
                            will be a paradigm shift from the present taxation model to an advanced one. While GST is
                            flaunted as the single largest indirect tax reform that will boost India’s GDP, its impact
                            on the consumer is less talked about.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <h3>TDS</h3>
                        <p>The concept of TDS was introduced with an aim to collect tax from the very source of income.
                            As per this concept, a person (deductor) who is liable to make payment of specified nature
                            to any other person (deductee) shall deduct tax at source and remit the same into the
                            account of the Central Government. </p>
                    </div>
                </div>
                <!--<div class="col-lg-4 col-md-6">
<div class="single-features">
<div class="icon">
<i class="fa fa-code"></i>
</div>
<h3>Clean Codes</h3>
<p>Lorem ipsum dolor sit amet, con se ctetur adipiscing elit. In sagittis eg esta ante, sed viverra nunc tinci dunt nec elei fend et tiram.</p>
</div>
</div>-->
                <!--<div class="col-lg-4 col-md-6">
<div class="single-features">
<div class="icon">
<i class="fa fa-eye"></i>
</div>
<h3>Retina Ready</h3>
<p>Lorem ipsum dolor sit amet, con se ctetur adipiscing elit. In sagittis eg esta ante, sed viverra nunc tinci dunt nec elei fend et tiram.</p>
</div>
</div>-->
                <!--<div class="col-lg-4 col-md-6">
<div class="single-features">
<div class="icon">
<i class="fa fa-camera"></i>
</div>
<h3>Unlimited Features</h3>
<p>Lorem ipsum dolor sit amet, con se ctetur adipiscing elit. In sagittis eg esta ante, sed viverra nunc tinci dunt nec elei fend et tiram.</p>
</div>
</div>-->
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




    <section class="overview-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="overview-content">
                        <h3>Overall 2000+ Happy Users</h3>
                        <div class="bar"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip commodo.</p>
                        <div class="overview-btn">
                            <a href="#" class="default-btn">
                                Get It Now
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="overview-image">
                        <img src="{{asset('frontend/assets/img/overview.png')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pricing-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Pricing Plan</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt labore et
                    dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            </div>
            <div class="tab pricing-list-tab">

                <div class="tab_content">
                    <div class="tabs_item">
                        <div class="row">

                            <div class="col-lg-4 col-md-6 ">
                                <div class="single-pricing-table">

                                    <div class="price">
                                        <sup>₹</sup>100 <sub>/ 72 Hours</sub>
                                    </div>
                                    <ul class="pricing-features">
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Extra features
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Lifetime free support
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Download/Share
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Full access
                                        </li>



                                    </ul>
                                    <div class="pricing-btn">
                                        <a href="#" class="default-btn">
                                            Purchase
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tabs_item">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-pricing-table">
                                    <div class="pricing-header">
                                        <h3>Standard</h3>
                                    </div>
                                    <div class="price">
                                        <sup>$</sup>133 <sub>/ yearly</sub>
                                    </div>
                                    <ul class="pricing-features">
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Extra features
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Lifetime free support
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Upgrate options
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Full access
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            Web Design
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            App Design
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            Web Developement
                                        </li>
                                    </ul>
                                    <div class="pricing-btn">
                                        <a href="#" class="default-btn">
                                            Purchase
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-pricing-table">
                                    <div class="pricing-header">
                                        <h3>Personal</h3>
                                    </div>
                                    <div class="price">
                                        <sup>$</sup>169 <sub>/ yearly</sub>
                                    </div>
                                    <ul class="pricing-features">
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Extra features
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Lifetime free support
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Upgrate options
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Full access
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Web Design
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            App Design
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            Web Developement
                                        </li>
                                    </ul>
                                    <div class="pricing-btn">
                                        <a href="#" class="default-btn">
                                            Purchase
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-pricing-table">
                                    <div class="pricing-header">
                                        <h3>Business</h3>
                                    </div>
                                    <div class="price">
                                        <sup>$</sup>199 <sub>/ yearly</sub>
                                    </div>
                                    <ul class="pricing-features">
                                        <li>
                                            <i class="fas fa-check"></i>
                                            Extra features
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Lifetime free support
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Upgrate options
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Full access
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            Web Design
                                        </li>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            App Design
                                        </li>
                                        <li>
                                            <i class="fa fa-times"></i>
                                            Web Developement
                                        </li>
                                    </ul>
                                    <div class="pricing-btn">
                                        <a href="#" class="default-btn">
                                            Purchase
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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



    <div class="copy-right">
        <div class="container">
            <div class="copy-right-content">
                <p>
                    Copyright @2022 Tax Mall. All Rights Reserved Developed by
                    <a href="#" target="_blank">
                        Design 2Creative
                    </a>
                </p>
            </div>
        </div>
    </div>

@endsection
