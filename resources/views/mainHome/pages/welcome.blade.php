@extends('mainHome.pages.cover')
@section('content')
<!-- Slider Area -->
	<style type="text/css">
		.section-title {
		    text-align: center; /* Center text */
		}

		.section-title img {
		    display: block; /* Ensure the image behaves like a block element */
		    margin: 0 auto; /* Center the image */
		    max-width: 100%; /* Make the image responsive */
		    height: auto; /* Maintain aspect ratio */
		}

	</style>
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{URL::to("/")}}/mainHomePage/img/bg_0.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Streamline Operations</h1>
									<p style="font-size:20px;">Revolutionize your school management with SchoolEdge — streamline operations, track performance, and automate administrative tasks effortlessly. </p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{URL::to("/")}}/mainHomePage/img/bg_1.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Real-Time Insights</h1>
									<p style="font-size:20px;">Empower your school with real-time insights, simplified payments, and seamless communication, all in one platform</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{URL::to("/")}}/mainHomePage/img/bg_2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Automate Administration</h1>
									<p style="font-size:20px;">Experience efficiency, transparency, and excellence in managing your school’s operations with {{ config('app.name','names') }}</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-cog"></i>
									</div>
									<div class="single-content">
										<h5 class="text-white">Boost Efficiency & Save Time</h5>
										<p>Simplify school management with our all-in-one platform. From managing student records and tracking performance to handling payments and communication, SchoolEdge automates essential tasks, reducing manual effort and freeing up valuable time for educators and administrators. Experience a seamless, efficient, and transparent way to manage your school’s operations.</p>
										<!-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-graduation-cap"></i>
									</div>
									<div class="single-content">
										<h5 class="text-white">Enhance Student Success & Retention</h5>
										<p>SchoolEdge not only tracks academic performance but also identifies students at risk of falling behind or dropping out. Our system provides real-time alerts and data-driven insights, enabling schools to intervene early and offer personalized support. By using SchoolEdge, your school can enhance student success and retention rates, ensuring every student reaches their full potential.</p>
										<!-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<i class="icofont-ui-clock"></i>
									</div>
									<div class="single-content">
										<span>Time is proportional to work</span>
										<h4>Opening Hours</h4>
										<ul class="time-sidual">
											<li class="day">Monday <span>00.00 am - 23.59 pm</span></li>
											<li class="day">Tuesday <span>00.00 am - 23.59 pm</span></li>
											<li class="day">Wednesday <span>00.00 am - 23.59 pm</span></li>
											<li class="day">Thursday <span>00:00 am - 23.59 pm</span></li>
											<li class="day">Friday <span>00.00 am - 23.59 pm</span></li>
											<li class="day">Saturday <span>00:00 am - 23.59 pm</span></li>
											<li class="day">Sunday <span>00:00 am - 23.59 pm</span></li>
											<li class="day mt-3 text-center">Means Opening hours 24/7<span></span></li>
										</ul>
										<!-- <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title text-center"> <!-- Added text-center class -->
					        <h2>We Are Always Ready to Help You</h2>
					        <img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" class="img-fluid"> <!-- Added img-fluid class for responsiveness -->
					        <p>At {{ config('app.name','school_name') }}, we prioritize your needs. Our dedicated support team is available 24/7 to assist with any inquiries, ensuring you have a smooth experience with our school management system.</p>
					    </div>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="fa-solid fa-headset"></i>
							</div>
							<h3>Support at Your Fingertips</h3>
							<p>Our dedicated support team is always available to assist you, ensuring your school management experience with SchoolEdge is smooth and hassle-free.</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="fa fa-handshake-o"></i>
							</div>
							<h3>Your Partner in Education</h3>
							<p>With SchoolEdge, you’re never alone. We provide continuous support and guidance to help you maximize the benefits of our system.</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features last">
							<div class="signle-icon">
								<i class="fa fa-clock-o"></i>
							</div>
							<h3>Reliable Assistance, Anytime</h3>
							<p>We are committed to being there whenever you need us. Our team is ready to offer expert help and solutions to keep your school running efficiently.</p>
						</div>
						<!-- End Single features -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->
		
		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="fa fa-university"></i>
							<div class="content">
								<span class="counter">{{ $school_count }}</span>
								<p>Schools</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="fa fa-users"></i>
							<div class="content">
								<span class="counter">{{ $sys_users_count }}</span>
								<p>system users</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="fas fa-user-graduate"></i>
							<div class="content">
								<span class="counter">{{ $students_count }}</span>
								<p>Students</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="fa fa-calendar"></i>
							<div class="content">
								<span class="counter">{{ date('Y') - 2023 }}</span>
								<p>Years of Experience</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->
		
		<!-- Start Why choose -->
		<section class="why-choose section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title" style="text-align: center;">
						    <h2>We Offer Different Services To Improve Your daily activities</h2>
						    <img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#" style="display: block; margin: 0 auto;">
						    <p>At SchoolEdge, we enhance your school's daily operations through streamlined administrative tools, efficient communication systems, and data management solutions. Our services include automated attendance tracking, grade management, and real-time reporting. We empower educators and administrators with resources that simplify processes, improve efficiency, and foster collaboration, allowing them to focus on what truly matters—student success.</p>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>Who We Are</h3>
							<p>SchoolEdge is an all-in-one educational management platform designed to revolutionize school operations. We provide tools for every school activity—finance, administration, secretarial tasks, library management, and more—enabling staff to efficiently manage their responsibilities within the system. Additionally, our platform offers real-time progress tracking and personalized support to prevent students from falling behind and reduce dropout rates, ensuring academic success for all. </p>

							<div class="row">
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Innovative Solutions. </li>
										<li><i class="fa fa-caret-right"></i>Streamlined Management.</li>
										<li><i class="fa fa-caret-right"></i>Data-Driven Insights.</li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Dedicated Support. </li>
										<li><i class="fa fa-caret-right"></i>User-Friendly Interface.</li>
										<li><i class="fa fa-caret-right"></i>Secure Environment.</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
								<!-- Video Animation -->
								<div class="promo-video">
									<div class="waves-block">
										<div class="waves wave-1"></div>
										<div class="waves wave-2"></div>
										<div class="waves wave-3"></div>
									</div>
								</div>
								<!--/ End Video Animation -->
								<a href="https://about-bikman-ntiruhungwa.my.canva.site/dagt7r9e9-g" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->
		
		<!-- Start Call to action -->
		<section class="call-action overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>Do you need Emergency support ? Call +250785389000</h2>
							<p>So ,if you need any emergency support , please feel free to contact with us.</p>
							<div class="button">
								<a href="{{ route('main.contact') }}" class="btn">Contact Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->
		
		<!-- Start portfolio -->
		<!-- <section class="portfolio section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Maintain Cleanliness Rules Inside Our Hospital</h2>
							<img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#">
							<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="owl-carousel portfolio-slider">
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf1.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf2.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf3.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf4.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf1.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf2.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf3.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
							<div class="single-pf">
								<img src="{{ URL::to('/') }}/mainHomePage/img/pf4.jpg" alt="#">
								<a href="portfolio-details.html" class="btn">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!--/ End portfolio -->
		
		<!-- Start service -->
		<section class="services section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Terms and conditions</h2>
							<img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#">
							<p>The SchoolEdge Terms and Conditions outline the rules and guidelines for using our school management platform. By subscribing to SchoolEdge, schools agree to comply with our policies, including payment terms, data privacy standards, and acceptable usage protocols. The document details responsibilities for both SchoolEdge and the customer, covering areas such as access management, user obligations, data security, payment requirements, and customer support. It also explains the conditions for terminating the service and how disputes are governed. This agreement ensures a transparent and secure partnership between SchoolEdge and its users</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fa fa-money"></i>
							<h4><a href="service-details.html">Payment terms</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fa-solid fa-bell"></i>
							<h4><a href="service-details.html">Services updates</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fa-solid fa-shield-alt"></i>
							<h4><a href="service-details.html">Security & privacy</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fa-solid fa-list-check"></i>
							<h4><a href="service-details.html">User responsibilities</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fa-solid fa-times"></i>
							<h4><a href="service-details.html">Terminations</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
								<i class="fa-solid fa-headset"></i>
							<h4><a href="service-details.html">Customer support</a></h4>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End service -->

@endsection