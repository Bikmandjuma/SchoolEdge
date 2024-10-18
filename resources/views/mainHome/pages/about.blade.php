@extends('mainHome.pages.cover')
@section('content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>About Us</h2>
						<ul class="bread-list">
							<li><a href="{{ route('main.home') }}">Home</a></li>
							<li><i class="icofont-simple-right"></i></li>
							<li class="active">About Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
					    <h3 class="mt-3">Transforming Education with Innovative Management</h3>
					    <img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px; display: block; margin: 0 auto;" class="img-fluid">
					</div>
				</div>
				<!-- <br> -->
				<div class="row">
					<div class="col-lg-12 col-12">
							<p class="mt-2">
								SchoolEdge is an innovative school management system designed to revolutionize education management. Our platform equips schools with cutting-edge tools to streamline administrative tasks, monitor student progress, and improve communication, ensuring a smooth and efficient management experience. Featuring a user-friendly interface, real-time analytics, and detailed reporting capabilities, SchoolEdge enables schools to identify and support at-risk students, enhancing overall performance. We prioritize transparency, reliability, and exceptional customer support, providing a solution that fosters accountability and efficiency. Our dedicated team delivers customizable solutions tailored to each school’s unique requirements, offering an affordable, modern approach to school management. Choose SchoolEdge for trusted, exceptional educational excellence.
							</p>
					
					</div>
					
				</div>
			</div>
		</section>
	
@endsection