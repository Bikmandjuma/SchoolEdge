@extends('mainHome.shareHolder.cover')
@section('content')
    
    <div class="pagetitle">
      <h1>School</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">school</li>
          <li class="breadcrumb-item active">View_school_info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
           <!--  <div class="col-xl-4">
                <div class="card">
                    @include('mainHome.shareHolder.school_name_and_image')
                </div>
            </div> -->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        @include('mainHome.shareHolder.main_tabs_links_info')
                        
                        <h5 class="mt-4 mb-4">School - {{ $school_data->school_name }}</h5>

                        <ul class="nav nav-tabs mt-2">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#employee_tab">Employees <span class="badge bg-primary">{{ $employees_count }}</span> </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#student_tab">Students <span class="badge bg-primary">{{ $students_count }}</span> </button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active" id="employee_tab" style="overflow: auto;">
                                <table class="table datatable">
                                    <thead>
                                      <tr>
                                        <th>
                                          <b>N</b>o
                                        </th>
                                        <th>Image</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($employees as $data)
                                        
                                        @if($data->firstname == '' and $data->lastname == '')
                                            
                                            <tr>
                                                <td colspan="7" class="text-center">No data found in database !</td>
                                              </tr>

                                        @else
                                              
                                              <tr>
                                                <td>{{ $count++ }}</td>
                                                <td><img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}" width="40" height="40" style="border-radius: 50px;border: 1px solid gray;"> </td>
                                                <td>{{ $data->firstname }}</td>
                                                <td>{{ $data->lastname }}</td>
                                                <td>{{ $data->gender }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->phone }}</td>
                                              </tr>
                                            
                                            @endif

                                      @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="student_tab">
                                <table class="table datatable">
                                    <thead>
                                      <tr>
                                        <th>
                                          <b>N</b>o
                                        </th>
                                        <th>Image</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Gender</th>
                                        <th>Province</th>
                                        <th>District</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($students as $data)
                                        @if($students_count == 0)
                                            <tr>
                                                <td colspan="7" class="text-center">No data found in our database</td>
                                              </tr>
                                        @else

                                              <tr>
                                                <td>{{ $count++ }}</td>
                                                <td><img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $data->image }}" width="80" height="50px" style="border-radius: 50px;"> </td>
                                                <td>{{ $data->firstname }}</td>
                                                <td>{{ $data->lastname }}</td>
                                                <td>{{ $data->gender }}</td>
                                                <td>{{ $data->province }}</td>
                                                <td>{{ $data->district }}</td>
                                              </tr>
                                            
                                        @endif
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
