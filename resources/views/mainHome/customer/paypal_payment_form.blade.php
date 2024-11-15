@extends('mainHome.customer.cover')
@section('content')

<style>
    /* Adjust as needed */
</style>

<div class="pagetitle">
    <h1>Payment</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Payment method - Paypal</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-xxl-12 col-md-12 col-sm-12">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Payment method by PayPal</h5>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-xxl-6 col-md-6 col-sm-6">
                            <li>Student Range: <strong>{{ $student_range }}</strong></li>
                            <li>Subtotal: <strong>{{ number_format($amount) }} Frw</strong></li>
                            <li>Total (USD): <strong>{{ number_format($amount / 1400, 2) }} USD</strong></li>
                        </div>
                        <div class="col-xxl-6 col-md-6 col-sm-6">
                            <p>Click bellow button to pay</p>
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'sandbox',
        client: {
            sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: 'Aco85QiB9jk8Q3GdsidqKVCXuPAAVbnqm0agscHCL2-K2Lu2L6MxDU2AwTZa-ALMn_N0z-s2MXKJBxqJ'
        },
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '{{ number_format($amount / 1400, 2) }}', // Converted to USD
                        currency: 'USD'
                    }
                }]
            });
        },
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                document.querySelector('#paypal-button-container').innerText = 'Payment Complete!';
            });
        }
    }, '#paypal-button-container');
</script>

@endsection
