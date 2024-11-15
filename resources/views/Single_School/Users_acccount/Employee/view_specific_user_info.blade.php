@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
    
    @php
        $user = auth()->guard('school_employee')->user();
    @endphp

    <span>

    <div class="container-fluid px-2 px-md-4">
      
      <div class="card card-body mx-3 mx-md-4 mt-4">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $school_employees->image }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ $school_employees->firstname }} {{ $school_employees->lastname }}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Role : {{ $school_employees->role ? $school_employees->role->role_name : 'No Role Assigned' }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="fa fa-file text-lg position-relative"></i>
                    <span class="ms-1">My documents</span>
                  </a>
                </li>
               <!--  <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">email</i>
                    <span class="ms-1">Messages</span>
                  </a>
                </li> -->
                
              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Information</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Names:</strong> &nbsp; {{ $school_employees->firstname }} {{ $school_employees->middle_name }} {{ $school_employees->lastname }}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; {{ $school_employees->gender }}</li>

                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Phone:</strong> &nbsp; {{ $school_employees->phone }}</li>

                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $school_employees->email }}</li>

                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">DoB:</strong> &nbsp; {{ $school_employees->dob }}</li>

                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Joined:</strong> &nbsp; {{ $joined }}</li>
                    
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-linkedin fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-whatsapp fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fa fa-envelope fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                  @if($school_employees->role->role_name != 'Admin')
                    <!-- <button class="btn btn-info mt-3"><i class="fa fa-lock"></i>&nbsp;Block account</button> -->
                  @endif
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Permissions/Tasks</h6>
                </div>
                <div class="card-body p-3">
                    <div style="flex-direction: row-reverse; max-height: 200px; overflow: auto;">

                        @if($school_employees->role->role_name === "Admin")
                          <li>As the admin, you have unrestricted access to all system functions. You can manage tasks independently, including setting and resetting them at your discretion !</li>
                        @else
                            @if($count_permission == 0)
                                <li>No permission !</li>
                            @else
                                @foreach($user_permission as $permissionName)
                                    <li style="margin: 0 5px; list-style: asterisks;padding:4px;">{{ $permissionName }}</li>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>

              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Classes to teach</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                        <h>No class</h5>                      
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
       </div>
      </div>
    </div>



@endsection

