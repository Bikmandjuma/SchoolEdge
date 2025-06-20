@extends('mainHome.customer.cover')
@section('content')

    <div class="pagetitle">
      <h1>Payment plan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">payment-plan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          
          <div class="row">
              <!-- Single Table -->
              <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-12 col-12">
                <div class="card text-center" style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.2);">
        
                  <div class="card-body">
                      <i class="icofont-money" style="font-size:50px;"></i>
                      <h5 class="card-header text-center">Choose payment method</h5>

                      <div style="display: flex; margin-top: 15px; text-align: center; justify-content: center; align-items: center;font-family: sans-serif;font-style: italic;">
                          .Student Range: <strong>{{ $student_range }}</strong>&nbsp;,&nbsp;
                          
                          .Subtotal: <strong>{{ number_format($amount) }} Frw</strong>&nbsp;,&nbsp;
                          
                          .Total (USD): <strong>{{ number_format($amount / 1400, 2) }} USD</strong>
                      </div>

                      <hr>

                      <div class="row">
                          <div class="col-xl-4 col-sm-6">
                            <img src="{{ URL::to('/') }}/mainHomePage/img/mtn.png" style="margin-top:10px;height: 50px;width: 120px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.4);" onclick="window.location.href='{{ route("main.mtn_payment_form", ["student_range" => $student_range, "amount" => $amount]) }}'">
                          </div>

                          <div class="col-xl-4 col-sm-6">
                            <img src="https://easyaffiliate.com/wp-content/uploads/2017/10/PayPal@2x.png" style="margin-top:10px;height: 45px;width: 120px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.4);" onclick="window.location.href='{{ route("main.paypal_payment_form", ["student_range" => $student_range, "amount" => $amount]) }}'">
                          </div>

                          <div class="col-xl-4 col-sm-6">
                            <img src="{{ URL::to('/') }}/mainHomePage/img/visa-mastercard-logos.jpg" style="margin-top:10px;height: 50px;width: 120px;box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.4);" onclick="window.location.href='{{ route("main.visa_payment_form", ["student_range" => $student_range, "amount" => $amount]) }}'" alt="visa card" title="pay by visa card">
                          </div>
                      </div>

                  </div>
        
              </div>
              </div>
                                
              </div>
              <div class="col-lg-1"></div>
          </div>   

        </div>
      </div>
    </section>

@endsection