@extends('Single_School.Landing_pages.Cover')
@section('content')

<!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item mx-auto">
                <div class="header-carousel-item-img-2">
                    <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_2.jpg" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-center p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">Welcome to {{ $school_name }}</h1>
                        <p class="mb-5 fs-5">Skills for better destiny
                        </p>
                       
                    </div>
                </div>
            </div>
            <div class="header-carousel-item mx-auto">
                <div class="header-carousel-item-img-2">
                    <img src="{{ URL::to('/') }}/Single_school_pages/img//hints/bg_7.jpg" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-center p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">Welcome to {{ $school_name }}</h1>
                        <p class="mb-5 fs-5">Skills for better destiny
                        </p>
                       
                    </div>
                </div>
            </div>
            <div class="header-carousel-item mx-auto">
                <div class="header-carousel-item-img-2">
                    <img src="{{ URL::to('/') }}/Single_school_pages/img//hints/bg_0.jpeg" class="img-fluid w-100" alt="Image">
                </div>
                <div class="carousel-caption">
                    <div class="carousel-caption-inner text-center p-3">
                        <h1 class="display-1 text-capitalize text-white mb-4">Welcome to {{ $school_name }}</h1>
                        <p class="mb-5 fs-5">Skills for better destiny
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-fluid about bg-light py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="about-img">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_6.jpeg" class="img-fluid w-100 rounded-top bg-white" alt="Image">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_5.jpeg" class="img-fluid w-100 rounded-bottom" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                        <h4 class="text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">{{ $school_name }}</h1>
                        <p class="text ps-4 mb-4">
                            Welcome to {{ $school_name }}, a place where excellence meets opportunity! Established in 2024, we are committed to nurturing the academic, social, and personal growth of every student. With a dedicated team of educators, a vibrant learning environment, and a focus on holistic development, we aim to inspire a lifelong love for learning. At {{ $school_name }}, we believe every child has the potential to achieve greatness, and we are here to guide them every step of the way.
                        </p>
                        <div class="row g-4 justify-content-between mb-5">
                            <div class="col-lg-6 col-xl-5">
                                <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i>Innovative Learning Environment</p>
                                <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i>Extracurricular Opportunities</p>
                            </div>
                            <div class="col-lg-6 col-xl-7">
                                <p class="text-dark"><i class="fas fa-check-circle text-primary me-1"></i> Supportive Community</p>
                                <p class="text-dark mb-0"><i class="fas fa-check-circle text-primary me-1"></i> Unique Programs and Resources</p>
                            </div>
                        </div>
                        
                        <div class="row g-4 text-center align-items-center justify-content-center">
                            <div class="col-sm-4">
                                <div class="bg-primary rounded p-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">0</span>
                                        <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;"><!--k+--></h4>
                                    </div>
                                    <div class="w-100 d-flex align-items-center justify-content-center">
                                        <p class="text-white mb-0">School_employees</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="bg-dark rounded p-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="counter-value fs-1 fw-bold text-white" data-toggle="counter-up">0</span>
                                        <h4 class="text-white fs-1 mb-0" style="font-weight: 600; font-size: 20px;"></h4>
                                    </div>
                                    <div class="w-100 d-flex align-items-center justify-content-center">
                                        <p class="mb-0">Years Of Experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="bg-primary rounded p-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="counter-value fs-1 fw-bold text-dark" data-toggle="counter-up">0</span>
                                        <h4 class="text-dark fs-1 mb-0" style="font-weight: 600; font-size: 25px;"></h4>
                                    </div>
                                    <div class="w-100 d-flex align-items-center justify-content-center">
                                        <p class="text-white mb-0">Students</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Services Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Our News</h4>
                    <h1 class="display-4"> News and events</h1>
                </div>
                <div class="row g-4 justify-content-center text-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_3.jpg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Strong academic programs with skilled teachers</a>
                                    <p class="mb-4">content
                                    </p>
                                    <!-- <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_4.jpeg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Modern facilities and technology for learning.</a>
                                    <p class="mb-4">content
                                    </p>
                                    <!-- <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_5.jpeg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Engaging extracurricular activities.</a>
                                    <p class="mb-4">content
                                    </p>
                                    <!-- <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item bg-light rounded">
                            <div class="service-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_6.jpeg" class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="h4 mb-4 d-inline-flex text-start"><i class="fas fa-donate fa-2x me-2"></i> Safe and inclusive environment</a>
                                    <p class="mb-4">content
                                    </p>
                                    <!-- <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="#">Services More</a>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Services End -->


        <!-- Project Start -->
        <div class="container-fluid project">
            <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Students studies</h4>
                    <h1 class="display-4">student studies in classes</h1>
                </div>
                <div class="project-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="project-img">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_5.jpeg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <!-- <div class="project-icon mb-3"><i class="fas fa-chart-line fa-4x text-primary"></i></div> -->
                                <p class="text-dark fs-5 mb-3">Business Growth</p>
                                <a href="#" class="h4">Business Strategy And Investment Planning Growth Consulting</a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item h-100 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="project-img">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_6.jpeg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <!-- <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div> -->
                                <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                                <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item h-100">
                        <div class="project-img">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_4.jpeg" class="img-fluid w-100 rounded" alt="Image">
                        </div>
                        <div class="project-content bg-light rounded p-4">
                            <div class="project-content-inner">
                                <!-- <div class="project-icon mb-3"><i class="fas fa-signal fa-4x text-primary"></i></div> -->
                                <p class="text-dark fs-5 mb-3">Marketing Strategy</p>
                                <a href="#" class="h4">Product Sailing Marketing Strategy For Improve Business</a>
                                <div class="pt-4">
                                    <a class="btn btn-light rounded-pill py-3 px-5" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project End -->


        <!-- Blog Start -->
        <div class="container-fluid blog pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Student living</h4>
                    <h1 class="display-4">Students livings (domitories)</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url("{{ URL::to('/') }}/Single_school_pages/img/bg.png");">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Investment</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_8.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_8.jpg" data-lightbox="blog-1" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Revisiting Your Investment & Distribution Goals</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url("{{ URL::to('/') }}/Single_school_pages/img/bg.png");">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Business</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_2.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_2.jpg" data-lightbox="blog-2" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Dimensional Fund Advisors Interview with Director</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="blog-item bg-light rounded p-4" style="background-image: url("{{ URL::to('/') }}/Single_school_pages/img/bg.png");">
                            <div class="mb-4">
                                <h4 class="text-primary mb-2">Consulting</h4>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0"><span class="text-dark fw-bold">On</span> Mar 14, 2024</p>
                                    <p class="mb-0"><span class="text-dark fw-bold">By</span> Mark D. Brock</p>
                                </div>
                            </div>
                            <div class="project-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_0.jpeg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="blog-plus-icon">
                                    <a href="{{ URL::to('/') }}/Single_school_pages/img/hints/bg_0.jpeg" data-lightbox="blog-3" class="btn btn-primary btn-md-square rounded-pill"><i class="fas fa-plus fa-1x"></i></a>
                                </div>
                            </div>
                            <div class="my-4">
                                <a href="#" class="h4">Interested in Giving Back this year? Here are some tips</a>
                            </div>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <!-- Team Start -->
        <div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Employees</h4>
                    <h1 class="display-4">All schools' employees</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach($school_employee_data as $data)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded">
                            <div class="team-img">
                                <img src="{{ URL::to('/') }}/Single_school_pages/img/users_profiles_pictures/{{ $data->image }}" class="img-fluid w-100 rounded-top" alt="Image">
                                <div class="team-icon">
                                    <!-- <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fas fa-share-alt"></i></a> -->
                                    <div class="team-icon-share">
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-primary btn-sm-square text-white rounded-circle mb-0" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content bg-dark text-center rounded-bottom p-4">
                                <div class="team-content-inner rounded-bottom">
                                    <h4 class="text-white">
                                        {{ $data->firstname }} {{ $data->lastname }}
                                    </h4>
                                    <p class="text-muted mb-0">
                                        {{ $data->role ? $data->role->role_name : 'No Role Assigned' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-fluid testimonial bg-light py-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="h-100 rounded">
                            <h4 class="text-primary">Our Feedbacks </h4>
                            <h1 class="display-4 mb-4">Parents are Talking</h1>
                            <p class="mb-4">What parent talikings about our education's system.</p>
                            <!-- <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Read All Reviews <i class="fas fa-arrow-right ms-2"></i></a> -->
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonial-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam eos impedit eveniet dolorem culpa ullam incidunt vero quo recusandae nemo? Molestiae doloribus iure,
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Person Name</h5>
                                        <p class="mb-0">Profession</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="{{ URL::to('/') }}/Single_school_pages/img/testimonial-1.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam eos impedit eveniet dolorem culpa ullam incidunt vero quo recusandae nemo? Molestiae doloribus iure,
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Person Name</h5>
                                        <p class="mb-0">Profession</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="{{ URL::to('/') }}/Single_school_pages/img/testimonial-2.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-white rounded p-4 wow fadeInUp" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <div><i class="fas fa-quote-left fa-3x text-dark me-3"></i></div>
                                    <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam eos impedit eveniet dolorem culpa ullam incidunt vero quo recusandae nemo? Molestiae doloribus iure,
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="my-auto text-end">
                                        <h5>Person Name</h5>
                                        <p class="mb-0">Profession</p>
                                    </div>
                                    <div class="bg-white rounded-circle ms-3">
                                        <img src="{{ URL::to('/') }}/Single_school_pages/img/testimonial-3.jpg" class="rounded-circle p-2" style="width: 80px; height: 80px; border: 1px solid; border-color: var(--bs-primary);" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- FAQ Start -->
        <div class="container-fluid faq py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="pb-5">
                            <h4 class="text-primary">FAQs</h4>
                            <h1 class="display-4">Get the Answers to Common Questions</h1>
                        </div>
                       <div class="accordion bg-light rounded p-4" id="accordionExample">
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseTOne">
                                        What Does a Financial Advisor Do?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit, sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum consequatur, sit, delectus exercitationem odit officiis maiores! Neque, quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What industries do you specialize in? 
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit, sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum consequatur, sit, delectus exercitationem odit officiis maiores! Neque, quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-4">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can you guarantee for growth?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit, sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum consequatur, sit, delectus exercitationem odit officiis maiores! Neque, quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-0">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed text-dark fs-5 fw-bold rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        What makes your business plans so special?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body my-2">
                                        <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit, sapiente quis illo quia nulla atque maxime fuga minima ipsa quae cum consequatur, sit, delectus exercitationem odit officiis maiores! Neque, quidem corrupti modi architecto eos saepe incidunt dignissimos rerum.</p>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="faq-img RotateMoveRight rounded">
                            <img src="{{ URL::to('/') }}/Single_school_pages/img/faq-img.jpg" class="img-fluid rounded w-100" alt="Image">
                            <a class="faq-btn btn btn-primary rounded-pill text-white py-3 px-5" href="#">Read More Q & A <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ End -->
@endsection