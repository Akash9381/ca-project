@extends('frontend.layouts.frontend_layouts')
@section('title','Refund Policy | Tax Mall')
@section('content')
    <section class="pricing-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Refund policy</h2>
                <div class="bar"></div>

            </div>
            <p>Returns and Refunds Policy. Thank you for shopping at www.mytaxmall.com</p>
            <p>Non-tangible irrevocable goods ("Digital products")</p>
            <p>We do not issue refunds for non-tangible irrevocable goods ("digital products") once the order is
                confirmed and the product is sent.We recommend contacting us for assistance if you experience any issues
                receiving or downloading our products.</p>

            <p>Contact us for any issues</p>
            <p>If you have any questions about our Returns and Refunds Policy, please contact us:
                - By email:<strong> taxmall.online@gmail.com</strong>
            </p>
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
