@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-2 mb-xl-0 mb-4"></div>
        <div class="col-xl-8 col-sm-4 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2 text-center">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg  pb-1 pt-1">
                        <h6 class="text-white text-capitalize">Add new academic year</h6>
                    </div>
                </div>
                <div class="card-body p-3 pt-2">
                    <form role="form" class="text-start" action="{{ route('school_add_academic_year',Crypt::encrypt($school_id)) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">New academic name year</label>
                                    <input type="text" name="academic_year_name" class="form-control" value="{{ old('academic_name') }}">                                 
                                    
                                </div>

                                @error('academic_year_name')
                                    <span class="error-message text-danger">{{ $message }}</span>
                                    <br>
                                    <br>
                                @enderror

                                <button class="btn btn-info">
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-1 mb-xl-0 mb-4"></div>
        <div class="col-xl-10 col-sm-4 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-3 pt-2 text-center">
                    <div class="bg-gradient-secondary shadow-secondary border-radius-lg  pb-1 pt-1">

                        @if($academic_year)
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h6 class="text-white text-capitalize mb-0" style="margin-left: 5px;">Academic year: {{ $academic_year->academic_year_name }}</h6>
                                <button class="btn btn-light" style="margin-right: 10px;margin:3px;" data-bs-toggle="modal" 
                                        data-bs-target="#addTermModal">
                                    <i class="fa fa-plus"></i>&nbsp; Add term
                                </button>
                            </div>
                        @else
                            <p class="text-white mt-2">No academic year found for this school.</p>

                            <style type="text/css">
                                #card_body_id{
                                    display: none;
                                }
                            </style>
                        @endif

                    </div>
                </div>
                <div class="card-body p-3 pt-2" id="card_body_id">
                </div>
               </div>
        </div>
        <div class="col-xl-1 mb-xl-0 mb-4"></div>
    </div>
</div>

<!-- Edit term Modal -->
    <div class="modal fade" id="addTermModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title" id="editRoleModalLabel">Add term</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editRoleForm" method="POST" action="{{ route('school_employee_update_role') }}">
              @csrf
              <!-- Hidden input to hold the role ID -->
              <input type="hidden" id="roleId" name="role_id">
              
              <div class="mb-3">
                <label for="roleName" class="form-label">Term Name</label>
                <input type="text" class="form-control" id="roleName" name="role_name" placeholder="Enter term_name ex : Term 1 or First term" autofocus required>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Edit term Modal end-->

@endsection