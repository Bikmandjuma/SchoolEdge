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

          <div class="card text-center">
            
            <div class="card-header">
              <h4>Pricing and Payment Instructions</h4>
            </div>
            <div class="card-body" style="font-family: sans-serif;">
                <p>At {{ config('app.name','laravel') }}, we believe in providing schools with flexible pricing options that scale with your needs. Our pricing is determined by the number of students enrolled in your school, ensuring that you only pay for what you need.
                
                  We offer two types of payment plans to fit your budget and scheduling preferences.

                </p>
            </div>
          </div>
          
          <div class="row">
              <!-- Single Table -->
              <div class="col-lg-1"></div>
              <div class="col-lg-5 col-md-12 col-12">
                <div class="card text-center">
                  <div class="card-body">
                      <i class="icofont-university" style="font-size:50px;"></i>
                      <h5 class="card-header text-center">Termly Plan</h5>
                      <ul style="list-style-type: none;">
                          <br>
                          <li><i class="icofont icofont-users"></i>&nbsp;Number of Students: <span id="min-termly">0</span> - <span id="max-termly">200</span></li>
                          <br>
                          <li><i class="icofont icofont-money"></i>&nbsp;Amount: <span id="amount-termly">300,000 FRW</span></li>
                      </ul>
                      <input type="range" id="student-progress-termly" min="0" max="3000" value="500">
                      <p id="output-termly"></p>
                  </div>
                  <div class="card-body">
                      <a class="btn btn-primary" href="#" id="choose-termly">Choose</a>
                  </div>
              </div>
              </div>
              <div class="col-lg-5 col-md-12 col-12">
                <div class="card text-center">
                  <div class="card-body">
                      <i class="icofont-university" style="font-size:50px;"></i>
                      <h5 class="card-header text-center">Annually Plan</h5>
                      <ul style="list-style-type: none;">
                          <br>
                          <li><i class="icofont icofont-users"></i>&nbsp;Number of Students: <span id="min-annually">0</span> - <span id="max-annually">200</span></li>
                          <br>
                          <li><i class="icofont icofont-money"></i>&nbsp;Amount: <span id="amount-annually">300,000 FRW</span></li>
                      </ul>
                      <input type="range" id="student-progress-annually" min="0" max="3000" value="500">
                      <p id="output-annually"></p>
                  </div>
                  <div class="card-body">
                      <a class="btn btn-primary" href="#" id="choose-annually">Choose</a>
                  </div>
              </div>                  
              </div>
              <div class="col-lg-1"></div>
          </div>   

        </div>
      </div>
    </section>

<script type="text/javascript">
     const progressBarTermly = document.getElementById('student-progress-termly');
      const minDisplayTermly = document.getElementById('min-termly');
      const maxDisplayTermly = document.getElementById('max-termly');
      const amountDisplayTermly = document.getElementById('amount-termly');
      const chooseButtonTermly = document.getElementById('choose-termly');

      const pricingRangesTermly = [
          { min: 0, max: 200, price: 300000 },
          { min: 201, max: 450, price: 350000 },
          { min: 451, max: 600, price: 400000 },
          { min: 601, max: 800, price: 450000 },
          { min: 801, max: 1000, price: 500000 },
          { min: 1001, max: 1200, price: 550000 },
          { min: 1201, max: 1400, price: 600000 },
          { min: 1401, max: 1600, price: 650000 },
          { min: 1601, max: 1800, price: 700000 },
          { min: 1801, max: 2000, price: 750000 },
          { min: 2001, max: 2200, price: 800000 },
          { min: 2201, max: 2400, price: 850000 },
          { min: 2401, max: 2600, price: 900000 },
          { min: 2601, max: 2800, price: 950000 },
          { min: 2801, max: 3000, price: 1000000 }
      ];

      function getPriceTermly(students) {
          let price = 0;
          let minRange = 0;
          let maxRange = 0;

          for (const range of pricingRangesTermly) {
              if (students >= range.min && students <= range.max) {
                  price = range.price;
                  minRange = range.min;
                  maxRange = range.max;
                  break;
              }
          }

          if (price === 0) {
              price = "Pricing not available";
              minRange = 0;
              maxRange = 3000;
          }

          return { price, minRange, maxRange };
      }

      function updateAmountTermly() {
          const students = parseInt(progressBarTermly.value);
          const { price, minRange, maxRange } = getPriceTermly(students);

          minDisplayTermly.textContent = minRange;
          maxDisplayTermly.textContent = maxRange;
          amountDisplayTermly.textContent = typeof price === 'number' ? `${price.toLocaleString()} FRW` : price;

          // Update the button link with the dynamically generated values
          chooseButtonTermly.href = `/127.0.0.1:8000/${minRange}-${maxRange}/amount/${price}`;
      }

      // Initialize the display
      updateAmountTermly();

      // Add event listener to update the display when the progress bar changes
      progressBarTermly.addEventListener('input', updateAmountTermly);
    //======================================================================
    const progressBarAnnually = document.getElementById('student-progress-annually');
    const minDisplayAnnually = document.getElementById('min-annually');
    const maxDisplayAnnually = document.getElementById('max-annually');
    const amountDisplayAnnually = document.getElementById('amount-annually');
    const chooseButtonAnnually = document.getElementById('choose-annually');

    const pricingRangesAnnually = [
        { min: 0, max: 200, price: 300000 },
        { min: 201, max: 450, price: 350000 },
        { min: 451, max: 600, price: 400000 },
        { min: 601, max: 800, price: 450000 },
        { min: 801, max: 1000, price: 500000 },
        { min: 1001, max: 1200, price: 550000 },
        { min: 1201, max: 1400, price: 600000 },
        { min: 1401, max: 1600, price: 650000 },
        { min: 1601, max: 1800, price: 700000 },
        { min: 1801, max: 2000, price: 750000 },
        { min: 2001, max: 2200, price: 800000 },
        { min: 2201, max: 2400, price: 850000 },
        { min: 2401, max: 2600, price: 900000 },
        { min: 2601, max: 2800, price: 950000 },
        { min: 2801, max: 3000, price: 1000000 }
    ];

    function getPriceAnnually(students) {
        let price = 0;
        let minRange = 0;
        let maxRange = 0;

        for (const range of pricingRangesAnnually) {
            if (students >= range.min && students <= range.max) {
                price = range.price;
                minRange = range.min;
                maxRange = range.max;
                break;
            }
        }

        if (price === 0) {
            price = "Pricing not available";
            minRange = 0;
            maxRange = 3000;
        }

        return { price, minRange, maxRange };
    }

    function updateAmountAnnually() {
        const students = parseInt(progressBarAnnually.value);
        const { price, minRange, maxRange } = getPriceAnnually(students);

        minDisplayAnnually.textContent = minRange;
        maxDisplayAnnually.textContent = maxRange;
        amountDisplayAnnually.textContent = typeof price === 'number' ? `${price.toLocaleString()} FRW` : price;

        // Update the button link with the dynamically generated values
        chooseButtonAnnually.href = `/127.0.0.1:8000/${minRange}-${maxRange}/amount/${price}`;
    }

    // Initialize the display
    updateAmountAnnually();

    // Add event listener to update the display when the progress bar changes
    progressBarAnnually.addEventListener('input', updateAmountAnnually);
</script>

@endsection