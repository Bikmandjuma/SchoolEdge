@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
    
    @php
        $user = auth()->guard('school_employee')->user();
    @endphp

<style type="text/css">
	#permission_id:hover{
		cursor: pointer;
		color: black;
	}

</style>
	<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All school's employees</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee,role</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">contact</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DoB,Sex</th>
                      @if(auth()->guard('school_employee')->user()->hasPermission('Manage_user_permission') || $user->role->role_name === 'Admin')
                      <th colspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-secondary opacity-7"></th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($all_users_data as $data)
	                    <tr>
	                      <td>
	                        <div class="d-flex px-2 py-1">
	                          <div>
	                            <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
	                          </div>
	                          <div class="d-flex flex-column justify-content-center">
	                            <h6 class="mb-0 text-sm">{{ $data->firstname." ".$data->middle_name." ".$data->lastname }}</h6>
	                            <p class="text-xs text-secondary mb-0">{{ $data->role ? $data->role->role_name : 'No Role Assigned' }}</p>

	                          </div>
	                        </div>
	                      </td>
	                      <td>
	                        <p class="text-xs font-weight-bold mb-0">{{ $data->email }}</p>
	                        <p class="text-xs text-secondary mb-0">{{ $data->phone }}</p>
	                      </td>
	                      <td>
	                      	<div class="d-flex flex-column justify-content-center">
	                            <h6 class="mb-0 text-sm">{{ $data->dob }}</h6>
	                            <p class="text-xs text-secondary mb-0">{{ $data->gender }}</p>

	                          </div>
	                      </td>

	                      @if(auth()->guard('school_employee')->user()->hasPermission('Manage_user_permission') || $user->role->role_name === 'Admin')
	                      <td class="align-middle text-center text-sm">

	                        <!-- <span class="badge badge-sm bg-gradient-danger">Offline</span>
	                      &nbsp; -->
	                        <span id="permission_id" class="badge badge-sm bg-gradient-success p-2" onclick="window.location.href='{{ route('user_permission_form', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($data->id)]) }}'">Permission</span>

	                      </td>
	                      @endif
	                    </tr>
	                @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection 