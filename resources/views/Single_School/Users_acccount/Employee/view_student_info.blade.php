@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

    @php
        $user = auth()->guard('school_employee')->user();
    @endphp

<style type="text/css">
  #search_student_data {
    position: relative;
    float: right;
    margin-top: -3.5%;
    margin-right: 20px;
  }

  #search_student_data input {
    border-radius: 10px;
    border: none;
    font-size: 22px;
    background-color: white;
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);
  }

  /* Responsive styling */
  @media (max-width: 768px) {
    #search_student_data {
      float: none;
      margin-top: 10px;
    }
  }
</style>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3 text-center">All Students Info</h6>
            <form id="search_student_data" class="d-flex justify-content-center">
              <input type="text" name="search_data" class="form-control w-75 w-md-50" placeholder="Search..." aria-label="Search">
            </form>
          </div>
        </div>

        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="student_table">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">N<sub>o</sub></th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image, Names, Gender</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dob</th>
                  @if(auth()->guard('school_employee')->user()->hasPermission('View_student_info') || auth()->guard('school_employee')->user()->hasPermission('Edit_student') || $user->role->role_name === 'Admin')
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>

                @if($students_count == 0)
                  <tr>
                    <td colspan="5" class="text-center">No data found in our database</td>
                  </tr>
                @else

                  @foreach($school_students as $index => $data)
                    <tr class="student_row">
                      <td class="align-middle text-center text-sm">{{ $index + 1 }}</td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ URL::to('/') }}/mainHomePage/img/school/students/{{ $data->image }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $data->firstname }} {{ $data->middle_name }} {{ $data->lastname }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $data->gender }}</p>
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
                        @if(auth()->guard('school_employee')->user()->hasPermission('Edit_student') || $user->role->role_name === 'Admin')
                          <a href="#" class="badge badge-sm bg-gradient-success">
                            <i class="fa fa-edit"></i>&nbsp;Edit
                          </a>
                        @endif
                        @if(auth()->guard('school_employee')->user()->hasPermission('View_student') || $user->role->role_name === 'Admin')
                        <a href="#" class="badge badge-sm bg-gradient-info">
                          <i class="fa fa-eye"></i>&nbsp;View
                        </a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7U4t3yO2FzV3B5ZyI2UkZ+2eoaFtmF6fZDl" crossorigin="anonymous"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#search_student_data input[name="search_data"]').on('input', function() {
      var searchTerm = $(this).val().toLowerCase();

      // Filter each student row based on search term
      $('#student_table .student_row').each(function() {
        var studentName = $(this).find('td:nth-child(2)').text().toLowerCase();

        // Show or hide the row if it matches the search term
        if (studentName.includes(searchTerm)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
  });
</script>
@endsection
