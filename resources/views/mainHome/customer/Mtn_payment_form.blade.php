@extends('mainHome.customer.cover')
@section('content')

<div class="pagetitle">
    <h1>MTN MoMo Payment</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Payment method - MTN MoMo</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-xxl-12 col-md-12 col-sm-12">
            <div class="card info-card sales-card">
                <div class="card-body">

                    <h5 class="card-title">MTN MoMo Payment</h5>

                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-xxl-6 col-md-6 col-sm-6">
                            <li>Student Range: <strong>{{ $student_range }}</strong></li>
                            <li>Subtotal: <strong>{{ number_format($amount) }} Frw</strong></li>
                            <li>Total (USD): <strong>{{ number_format($amount / 1400, 2) }} USD</strong></li>
                        </div>
                        <div class="col-xxl-6 col-md-6 col-sm-6">
                            <div class="card" style="padding:15px;box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.2);">

                                <form method="POST" action="{{ route('main.process_mtn_payment',['student_range' => $student_range, 'amount' => $amount]) }}">
                                    @csrf
                                    
                                    <!-- Phone Number Input -->
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="e.g., 0781234567" required>
                                    </div>
                                    <!-- Amount Input -->
                                    <div class="form-group mb-3">
                                        <label for="amount">Amount (USD)</label>
                                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount in RWF" value="{{ number_format($amount / 1400, 2) }}" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary w-100">Pay with MTN MoMo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
