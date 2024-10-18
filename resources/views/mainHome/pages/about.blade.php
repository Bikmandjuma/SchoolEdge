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

				<img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px;padding: 10px 0px 10px 0px; display: block; margin: 0 auto;" class="img-fluid">

				<div class="row">
					<div class="col-lg-6 col-12">
						<h5 class="text-dark">Our Mission</h5>
						
							<li class="mt-2">Our mission is to empower educational institutions by providing an all-in-one platform that enhances efficiency, improves student outcomes, and supports educators in their essential work. We aim to create a seamless experience that integrates technology into school management, making education more effective and accessible for everyone involved</li>
					
					</div>
					<div class="col-lg-6 col-12">
						<h5 class="text-dark">Our Vision</h5>
							<li class="mt-2">We envision a world where every school, regardless of size, has access to cutting-edge technology that enables them to optimize operations and enhance student success. By offering powerful insights and tools through SchoolEdge, we strive to support schools in creating an environment where students can reach their full potential.</li>						
					</div>
				</div>

				<img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px;padding: 10px 0px 10px 0px; display: block; margin: 0 auto;" class="img-fluid">

				<div class="row">
					<div class="col-lg-12 col-12">
						<h5 class="text-dark">Our Values:</h5>
						<li class="mt-2"><b class="text-primary">Innovation:</b> We are committed to continuous innovation, integrating machine learning and advanced technology to provide smarter solutions for school management.</li>

						<li class="mt-2"><b class="text-primary">Accessibility:</b> We believe every school, big or small, should have access to top-quality management tools at an affordable price.</li>

						<li class="mt-2"><b class="text-primary">User-Focused Design:</b> We prioritize ease of use and reliability, ensuring that every user, from administrators to teachers and parents, has an intuitive and effective experience with our system.</li>

						<li class="mt-2"><b class="text-primary">Integrity:</b> We uphold the highest standards of data security and privacy, ensuring that all information is safe, confidential, and protected.</li>
					</div>
				</div>

				<img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px;padding: 10px 0px 10px 0px; display: block; margin: 0 auto;" class="img-fluid">

				<div class="row">
					<div class="col-lg-12 col-12">
						<h5 class="text-dark">Our Story:</h5>
						<li class="mt-2">
							SchoolEdge was founded with the belief that education deserves the best technology solutions. After years of experience in the education and technology sectors, our team realized the need for a comprehensive system that could address the challenges schools face today, from student data management to real-time performance tracking and early intervention for students at risk. Our journey has been shaped by collaboration with educators, administrators, and experts to ensure that SchoolEdge meets the needs of schools effectively
						</li>
					</div>
				</div>

			</div>
		</section>
	
@endsection