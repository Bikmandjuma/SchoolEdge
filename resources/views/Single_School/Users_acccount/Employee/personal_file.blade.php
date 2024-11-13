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
              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item" onclick="window.location.href='{{ route('my_document', ['school_id' => Crypt::encrypt($school_id)]) }}'">                   
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" aria-selected="true">                     
                        <i class="fa fa-file text-lg position-relative"></i>                     
                        <span class="ms-1">My documents</span>                   
                    </a>                 
                </li>

                <li class="nav-item" onclick="window.location.href='{{ route('my_personal_file', ['school_id' => Crypt::encrypt($school_id)]) }}'">
                    <a class="nav-link mb-0 px-0 py-1 {{ request()->segment(2) === 'my_personal_file' ? 'bg-info text-white' : '' }}" data-bs-toggle="tab" role="tab" aria-selected="true">
                        <i class="fa fa-file text-lg position-relative"></i>
                        <span class="ms-1">Personal files</span>
                    </a>
                </li>


                
              </ul>
            </div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="row">
            
            <div class="col-12 col-xl-12 text-center">
              <div class="card card-plain h-100">
                <div class="card-body pb-0 p-3 text-center">
                  <h6 class="mb-4 mt-4 text-center">Personal stuff !</h6>
                </div>
              </div>
            </div>
            
        </div>
       </div>

      </div>
    </div>

@endsection