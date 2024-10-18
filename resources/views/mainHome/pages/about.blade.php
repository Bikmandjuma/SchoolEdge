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

	<!-- Start Feautes -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<img src="{{ URL::to('/') }}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px; display: block; margin: 0 auto;">
			<div class="card" style="box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);padding: 8px;">
				<p>SchoolEdge is an innovative school management system designed to transform education. Our platform empowers schools with advanced tools to streamline administrative tasks, track student progress, and enhance communication, ensuring smooth and efficient management. With a user-friendly interface, real-time analytics, and comprehensive reporting, SchoolEdge helps schools identify and support at-risk students, boosting overall performance. We prioritize transparency, reliability, and exceptional customer support, offering a system that promotes accountability and efficiency. Our dedicated team delivers customizable solutions tailored to each school’s unique needs, providing an affordable and modern approach to school management, making SchoolEdge the trusted choice for educational excellence.</p>		        
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<br>
	
@endsection