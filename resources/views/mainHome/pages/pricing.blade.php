@extends('mainHome.pages.cover')
@section('content')
	<style type="text/css">

	input[type="range"] {
	    width: 100%;
	    margin: 20px 0;
	}

	.progress-info {
	    font-size: 1.2em;
	}

	</style>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Pricing</h2>
							<ul class="bread-list">
								<li><a href="{{ route('main.home') }}">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Pricing</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	<!-- Pricing Table -->
		<section class="pricing-table section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
						    <h2>Pricing and Payment Instructions</h2>
						    <img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#" style="display: block; margin: 0 auto;">
						   
						    <p>At {{ config('app.name','laravel') }}, SchoolEdge, we believe in providing schools with flexible pricing options that scale with your needs. Our pricing is determined by the number of students enrolled in your school, ensuring that you only pay for what you need.
						    </p>

						    <p>
						    	We offer three types of payment plans to fit your budget and scheduling preferences:
						    </p>

						</div>

					</div>
				</div>

          <div class="row">
                <!-- Single Table -->
                <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-12 col-12">
                  <div class="card text-center">
                    <div class="card-body">
                        <i class="icofont-university text-primary" style="font-size:50px;"></i>
                        <h5 class="card-body text-center">Termly Plan</h5>
                        <ul style="list-style-type: none;">
                            <br>
                            <li><i class="fa fa-user-graduate"></i>&nbsp;Students range: <span id="min-termly">0</span> - <span id="max-termly">200</span></li>
                            <br>
                            <li><i class="icofont icofont-money"></i>&nbsp;Amount per term: <span id="amount-termly">300,000 FRW</span></li>
                        </ul>
                        <input type="range" id="student-progress-termly" min="0" max="3000" value="500">
                        <p id="output-termly"></p>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="#" data-target="#loginfirstModal" data-toggle="modal">Choose</a>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                  <div class="card text-center">
                    <div class="card-body">
                        <i class="icofont-university text-primary" style="font-size:50px;"></i>
                        <h5 class="card-body text-center">Annually Plan</h5>
                        <ul style="list-style-type: none;">
                            <br>
                            <li><i class="fa fa-user-graduate"></i>&nbsp;Students range : <span id="min-annually">0</span> - <span id="max-annually">200</span></li>
                            <br>
                            <li><i class="icofont icofont-money"></i>&nbsp;Amount per year: <span id="amount-annually">300,000 FRW</span></li>
                        </ul>
                        <input type="range" id="student-progress-annually" min="0" max="3000" value="500">
                        <p id="output-annually"></p>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="#" data-target="#loginfirstModal" data-toggle="modal">Choose</a>
                    </div>
                </div>                  
                </div>
                <div class="col-lg-2"></div>
            </div>   

          </div>

          <br>
				
        <div class="row">
					<!-- Single Table -->
          <div class="col-lg-1"></div>
					<div class="col-lg-10 col-md-12 col-12">
						<div class="card">
							<div class="card-header text-center">Why Choose SchoolEdge?</h2></div>
							<div class="card-body">
								<ul>
									<ol>

										<li style="padding-bottom: 5px;"><b>Flexible Pricing:</b> Our plans are designed to scale with your school's size, ensuring that you pay according to your needs and usage.</li>
										
										<li style="padding-bottom: 5px;"><b>High-Quality Solutions:</b> We provide top-notch data management solutions that offer exceptional value and support for schools of all sizes.</li>
										
										<li style="padding-bottom: 5px;"><b>Customizable Payment Options:</b> Choose a payment plan that best suits your budget and administrative preferences.</li>
									</ol> 
								</ul>
							</div>
						</div>
					</div>
          <div class="col-lg-1"></div>
				</div>

			</div>	
		</section>	

    <!--Start of login first model-->
      <div class="modal fade" id="loginfirstModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                <h5 class="modal-title">Notification&nbsp;&nbsp;<i class="fa fa-bell"></i> </h5>
              </div>
              <div class="modal-body align-items-center justify-content-center" style="display: flex; flex-direction: column; align-items:center;">
                      To choose payment you have to create account first !
              </div>
              <div class="modal-footer">
                  <button class="btn btn-primary" onclick="window.location.href='{{ url("/login") }} '">Account&nbsp;<i class="fa fa-user"></i></button>
                
                 <button class="btn" style="background-color:indianred;" data-dismiss="modal" aria-label="Close">Cancel&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>
    <!--End of login first model-->


		<!--/ End Pricing Table -->
	<script type="text/javascript">
		const progressBarTermly = document.getElementById('student-progress-termly');
      const minDisplayTermly = document.getElementById('min-termly');
      const maxDisplayTermly = document.getElementById('max-termly');
      const amountDisplayTermly = document.getElementById('amount-termly');

      const pricingRangesTermly = [
          { min: 0, max: 200, price: 100000 },
          { min: 201, max: 450, price: 200000 },
          { min: 451, max: 500, price: 300000 },
          { min: 501, max: 600, price: 320000 },
          { min: 601, max: 700, price: 420000 },
          { min: 701, max: 800, price: 520000 },
          { min: 801, max: 900, price: 620000 },
          { min: 901, max: 1000, price: 720000 },
          { min: 1001, max: 1100, price: 820000 },
          { min: 1101, max: 1200, price: 920000 },
          { min: 1201, max: 1300, price: 1000000 },
          { min: 1301, max: 1400, price: 1200000 },
          { min: 1401, max: 1500, price: 1300000 },
          { min: 1501, max: 1600, price: 1400000 },
          { min: 1601, max: 1700, price: 1500000 },
          { min: 1701, max: 1800, price: 1600000 },
          { min: 1801, max: 1900, price: 1700000 },
          { min: 1901, max: 2000, price: 1800000 },
          { min: 2001, max: 2100, price: 1900000 },
          { min: 2101, max: 2200, price: 2000000 },
          { min: 2201, max: 2300, price: 2100000 },
          { min: 2301, max: 2400, price: 2200000 },
          { min: 2401, max: 2500, price: 2300000 },
          { min: 2501, max: 2600, price: 2400000 },
          { min: 2601, max: 2700, price: 2500000 },
          { min: 2701, max: 2800, price: 2600000 },
          { min: 2801, max: 2900, price: 2700000 },
          { min: 2901, max: 3000, price: 2800000 }
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

    const pricingRangesAnnually = [
        { min: 0, max: 200, price: 300000 },
        { min: 201, max: 450, price: 400000 },
        { min: 451, max: 500, price: 500000 },
        { min: 501, max: 600, price: 520000 },
        { min: 601, max: 700, price: 620000 },
        { min: 701, max: 800, price: 720000 },
        { min: 801, max: 900, price: 820000 },
        { min: 901, max: 1000, price: 920000 },
        { min: 1001, max: 1100, price: 1020000 },
        { min: 1101, max: 1200, price: 1120000 },
        { min: 1201, max: 1300, price: 1220000 },
        { min: 1301, max: 1400, price: 1320000 },
        { min: 1401, max: 1500, price: 1420000 },
        { min: 1501, max: 1600, price: 1520000 },
        { min: 1601, max: 1700, price: 1620000 },
        { min: 1701, max: 1800, price: 1720000 },
        { min: 1801, max: 1900, price: 1820000 },
        { min: 1901, max: 2000, price: 1920000 },
        { min: 2001, max: 2100, price: 2020000 },
        { min: 2101, max: 2200, price: 2120000 },
        { min: 2201, max: 2300, price: 2220000 },
        { min: 2301, max: 2400, price: 2320000 },
        { min: 2401, max: 2500, price: 2420000 },
        { min: 2501, max: 2600, price: 2520000 },
        { min: 2601, max: 2700, price: 2620000 },
        { min: 2701, max: 2800, price: 2720000 },
        { min: 2801, max: 2900, price: 2820000 },
        { min: 2901, max: 3000, price: 2920000 }
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
    }

    // Initialize the display
    updateAmountAnnually();

    // Add event listener to update the display when the progress bar changes
    progressBarAnnually.addEventListener('input', updateAmountAnnually);
	</script>
@endsection