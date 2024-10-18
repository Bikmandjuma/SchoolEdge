@extends('mainHome.pages.cover')
@section('content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Services</h2>
						<ul class="bread-list">
							<li><a href="{{ route('main.home') }}">Home</a></li>
							<li><i class="icofont-simple-right"></i></li>
							<li class="active">Services</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
					    <h3 class="mt-2">Our Services: Enhancing School Management with Us</h3>
					    <img src="{{URL::to('/')}}/mainHomePage/img/section-img.png" alt="#" style="margin-top:5px; display: block; margin: 0 auto;" class="img-fluid">
					</div>
				</div>
				<br>
				<div class="card" style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.4);padding: 10px;">
				<div class="row">
					<div class="col-lg-4 col-12">
						<h5>Comprehensive Student Information Management</h5>
					
						
							<li class="mt-2"><b class="text-primary">Effortlessly manage student data:</b> Store and manage detailed student information, including enrollment records, academic performance, attendance, and disciplinary records, all in one secure place.</li>

							<li class="mt-2"><b class="text-primary">Automated updates:</b> SchoolEdge automatically updates records in real-time, ensuring that your data is always accurate and accessible when you need it.</li>
					
					</div>
					<div class="col-lg-4 col-12">
						<h5>Academic Performance Tracking and Analysis</h5>
						
							<li class="mt-2"><b class="text-primary">Real-time performance tracking:</b> Monitor student performance with up-to-date scores and assessments. Teachers and administrators can quickly generate detailed reports to review individual or group performance metrics.</li>
							
							<li class="mt-2"><b class="text-primary">Automated grading and reporting:</b> Save time with our automated grading system and customizable report generation tools, providing clear insights for parents, teachers, and students.</li>
						
					</div>
					<div class="col-lg-4 col-12">
						<h5>AI-Powered Insights for Student Success</h5>
						
						<li class="mt-2"><b class="text-primary">Predictive analytics:</b> Our advanced machine learning algorithms analyze student data to identify students who may be at risk of falling behind or dropping out.</li>

						<li class="mt-2"><b class="text-primary">Early intervention alerts:</b> Receive automated alerts that allow teachers and administrators to intervene early and provide personalized support to help students stay on track and succeed.</li>
					</div>
				</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-4 col-12">
						<h5>Multi-Role Access and Permissions</h5>
						
							<li class="mt-2"><b class="text-primary">Role-based access:</b> SchoolEdge provides tailored access for administrators, teachers, parents, and students, ensuring each user only sees what they need. This improves security and helps streamline operations.</li>

							<li class="mt-2"><b class="text-primary">Parental and student portals:</b> Parents and students can access performance reports, attendance records, and school updates, enhancing transparency and communication between the school and the community.</li>
					
					</div>
					<div class="col-lg-4 col-12">
						<h5>Powerful Reporting and Analytics Tools</h5>
						
							<li class="mt-2"><b class="text-primary">Customizable reports:</b> Generate various reports, including academic performance, attendance, teacher efficiency, and more, with just a few clicks.</li>
							
							<li class="mt-2"><b class="text-primary">Visual data analytics:</b> Gain insights through graphs and charts that illustrate trends and help school leaders make informed decisions to improve overall school performance.</li>
						
					</div>
					<div class="col-lg-4 col-12">
						<h5>Flexible Payment Management</h5>
						
						<li class="mt-2"><b class="text-primary">Simplified billing and payments:</b> SchoolEdge offers flexible billing options, including termly and annual plans. Schools can easily manage payments and subscriptions directly through the system.</li>

						<li class="mt-2"><b class="text-primary">Multiple payment options:</b> Schools can pay using various methods, such as bank transfers, mobile money, or credit cards, making the process simple and convenient.</li>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-lg-4 col-12">
						<h5>Automated System Updates and Enhancements</h5>
						
							<li class="mt-2"><b class="text-primary">Continuous improvements:</b> We regularly update SchoolEdge to enhance functionality, performance, and security. Updates are automatically applied without disrupting your school’s operations.</li>

							<li class="mt-2"><b class="text-primary">Timely notifications:</b> Administrators receive notifications when significant updates occur, ensuring they stay informed about the latest features and improvements.</li>
					
					</div>
					<div class="col-lg-4 col-12">
						<h5>Advanced Data Security and Privacy Measures</h5>
						
							<li class="mt-2"><b class="text-primary">Secure data storage:</b> SchoolEdge employs industry-standard encryption protocols to ensure that all student and school data is securely stored and protected from unauthorized access.</li>
							
							<li class="mt-2"><b class="text-primary">Privacy-focused:</b> We prioritize user privacy and guarantee that no personal information is shared with third parties without explicit consent from the school.</li>
						
					</div>
					<div class="col-lg-4 col-12">
						<h5>Dedicated Customer Support</h5>
						
						<li class="mt-2"><b class="text-primary">24/7 support services:</b> Our support team is available around the clock to assist schools with any technical issues or questions. Whether by phone or email, our experts are ready to help.</li>

						<li class="mt-2"><b class="text-primary">Comprehensive resources:</b> Schools have access to a knowledge base and training materials to help them make the most out of SchoolEdge.</li>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-lg-4 col-12">
						<h5>Performance and System Reliability</h5>
						
							<li class="mt-2"><b class="text-primary">High uptime guarantee:</b> SchoolEdge ensures 99.9% uptime, providing schools with consistent and reliable access to their data and tools.</li>

							<li class="mt-2"><b class="text-primary">Scalable solution:</b> As your school grows, SchoolEdge scales effortlessly to accommodate more students, records, and data without compromising system performance.</li>
					
					</div>
					<div class="col-lg-4 col-12">
						<h5>Advanced Data Security and Privacy Measures</h5>
						
							<li class="mt-2"><b class="text-primary">Secure data storage:</b> SchoolEdge employs industry-standard encryption protocols to ensure that all student and school data is securely stored and protected from unauthorized access.</li>
							
							<li class="mt-2"><b class="text-primary">Privacy-focused:</b> We prioritize user privacy and guarantee that no personal information is shared with third parties without explicit consent from the school.</li>
						
					</div>
					
				</div>

				<br>
				
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="card" style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.3);padding: 5px;">
							<h5 class="text-center p-2">Why Choose SchoolEdge?</h5>
						
							<li class="mt-2"><b class=" text-primary">Efficient and User-Friendly:</b> Designed for ease of use, SchoolEdge automates everyday tasks, reducing manual effort and allowing educators to focus on what matters most—teaching.</li>

							<li class="mt-2"><b class=" text-primary">Empowering Schools Through Technology:</b> By integrating AI and machine learning technology, SchoolEdge enhances the decision-making process, supports students at risk, and promotes a culture of academic excellence.</li>

							<li class="mt-2"><b class=" text-primary">Transparent and Reliable:</b> From payment management to performance tracking, SchoolEdge offers transparent, data-driven insights that empower schools to make informed, impactful decisions.</li>
						</div>
					
					</div>
				</div>

			</div>
		</section>
		<!--/ End Feautes -->
@endsection