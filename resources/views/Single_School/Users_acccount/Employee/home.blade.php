@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
    
    @php
        $user = auth()->guard('school_employee')->user();
    @endphp

    @if(auth()->guard('school_employee')->user()->hasPermission('Dashboard') || $user->role->role_name === 'Admin')

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-users"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">School employees</p>
                <h4 class="mb-0">{{ $school_employees_count }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span>All employees</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-home"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">All classes</p>
                <h4 class="mb-0">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>All classes of our school</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-user-graduate"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Students</p>
                <h4 class="mb-0">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> All our school's students</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-user-circle"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Online users</p>
                <h4 class="mb-0">0</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>online's employees</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 0 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-4 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Peformance </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in terms. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 0 min ago </p>
              </div>
            </div>
          </div>
        </div>
        @else

      <div class="container-fluid py-4">

        <div class="row mt-4">
          <!-- <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4"></div> -->
          <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="card-body text-center">
                  <h2>Not authorized yet to view school's dashboard !</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4"></div> -->
        </div>
      </div>
        @endif
@endsection
