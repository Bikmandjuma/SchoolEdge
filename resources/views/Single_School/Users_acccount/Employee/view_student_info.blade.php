@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
<style type="text/css">
  #search_student_data{
    position: relative;
    float: right;
    margin-top: -3.5%;
    margin-right: 20px;
  }

  #search_student_data input{
    border-radius:10px;
    border:none;
    font-size:22px;
    background-color: white;
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);
  }

  @media(){
    #search_student_data{
     position: relative;
    }
  }

</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All students info</h6>
                <form id="search_student_data">
                  <input name="search_data" placeholder="Search...">
                </form>
              </div>
            </div> -->
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3 text-center">All students info</h6>
                  <form id="search_student_data" class="d-flex justify-content-center">
                    <input name="search_data" class="form-control w-75 w-md-50" placeholder="Search..." aria-label="Search">
                  </form>
                </div>
              </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        N<sub>o</sub>
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image,Names,gender</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dob</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($school_students as $data)
                      
                        @if($students_count == 0)
                          
                          <tr>
                              <td colspan="4" class="text-center">No data found in our database</td>
                          </tr>

                        @endif

                          <tr>
                            <td class="align-middle text-center text-sm">
                              1
                            </td>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="{{ URL::to('/') }}/mainHomePage/img/school/students/{{ $data->image }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $data->firstname }} {{ $data->middle_name }} {{ $data->lastname }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $data->gender }} </p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0">{{ $data->province }}-{{ $data->district }}-{{ $data->sector }}</p>
                              <p class="text-xs text-secondary mb-0">{{ $data->cell }}-{{ $data->village }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="text-xs text-center">{{ $data->dob }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <a href="#" class="badge badge-sm bg-gradient-success" data-original-title="Edit user">
                                <i class="fa fa-edit"></i>&nbsp;Edit
                              </a>&nbsp;<a href="#" class="badge badge-sm bg-gradient-info">
                                <i class="fa fa-eye"></i>&nbsp;View
                              </a>
                            </td>
                        
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