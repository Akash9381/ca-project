@extends('frontend.layouts.frontend_layouts')
@section('title','Price Details | Tax Mall')
@section('content')
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
@endsection
