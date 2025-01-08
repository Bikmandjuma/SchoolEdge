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
                                    <label class="form-label">New academic year ex:2020-2021</label>
                                    <input type="text" name="academic_year_name" class="form-control" value="{{ old('academic_name') }}">
                                </div>

                                @error('academic_year_name')
                                    <span class="error-message text-danger">{{ $message }}</span>
                                    <br>
                                    <br>
                                @enderror

                                <button class="btn btn-info mx-auto block">
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
                                <h6 class="text-white text-capitalize mb-0" style="margin-left: 5px;">Acad_year: {{ $academic_year->academic_year_name }}</h6>
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

                    <br>

                    @if( $academic_term_count  == 0)
                        <p class="text-center justify-center items-center ">No data of terms found</p>
                    @else

                        

                        @foreach($fetch_academic_term as $term)
                            
                            <div class="max-w-3xl rounded-lg overflow-hidden shadow-lg bg-white mt-3">
                              <div class="px-2 py-2 mb-2">
                               <p class="float-left"><b>{{ $term->term_name }}</b> &nbsp;<i class="fa fa-edit text-info hover:cursor-pointer " title="edit {{ $term->term_name }}"></i> </p>
                            <!--   </div>
                              <div class="px-6 pt-4 pb-2"> -->
                                <button class="bg-blue-500 m-2 px-4 text-white rounded-full hover:bg-blue-300 float-right hover:cursor-pointer"><i class="fa fa-eye text-white" title="view {{ $term->term_name }} info"></i>&nbsp;view</button>
                              </div>
                            </div>
                        @endforeach

                    @endif

                </div>
                <div class="card-body p-3 pt-2" id="card_body_id">
                </div>
               </div>
        </div>
        <div class="col-xl-1 mb-xl-0 mb-4">
            
        </div>
    </div>
</div>


<!-- <script>
    // Display success message
    @if(session('info'))
        toastr.success("{{ session('info') }}");
    @endif

    // Display validation error messages
    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script> -->

<!-- Edit term Modal -->
    <div class="modal fade" id="addTermModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title" id="editRoleModalLabel" style="text-align: center;align-items: center;">Add term</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @if($academic_year)

                <form id="editRoleForm" method="POST" action="{{ url('school/school_add_term') }}/{{ Crypt::encrypt($academic_year->id) }}/{{ Crypt::encrypt($school_id) }}">
                  
                    @csrf

                    <div class="mb-3">
                        <label for="roleName" class="form-label">Term Name</label>
                        <input type="text" class="form-control" id="roleName" name="term_names" placeholder="Enter term_name ex : Term 1 ,Term 2 ..." autofocus required>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="roleName" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="roleName" name="start_date" autofocus required>
                            </div>
                            <div class="col-md-6">
                                <label for="roleName" class="form-label">End date</label>
                                <input type="date" class="form-control" id="roleName" name="end_date" autofocus required>
                            </div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                    </div>

                </form>
            @endif
          </div>
        </div>
      </div>
    </div>
<!-- Edit term Modal end-->

@endsection