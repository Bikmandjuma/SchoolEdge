@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">School</li>
          <li class="breadcrumb-item active">Permission</li>
        </ol>

      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
    
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                      <button class="nav-link {{ Request::segment(2) == 'school_user_permission' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.show.profile') }}'">Permissions</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link {{ Request::segment(2) == 'school_user_permission_groupBy' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.show.myInformation') }}'">Permission_groupBy</button>
                  </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">All permission</h5>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 label ">
                      <table class="table datatable">
                          <thead>
                            <tr>
                              <th>
                                <b>N</b>o
                              </th>
                              <th>Image</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($permission_data as $data)
                            <tr>
                              <td>{{ $count++ }}</td>
                              <td><img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $data->image }}" style="border-radius:50px;width: 50px;height: 50px;" alt="logo image"> </td>
                              <td>{{ $data->school_code }}</td>
                              <td>{{ $data->school_name }}</td>
                              <td><button class="btn btn-primary" onclick="window.location.href='{{ route("main.view_single_school_info",Crypt::encrypt($data->id)) }}'" ><i class="fas fa-eye"></i> View</button> </td>
                            </tr>
                            @endforeach  
                        </tbody>
                      </table>
                    </div>
                    
                  </div>

                  
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection