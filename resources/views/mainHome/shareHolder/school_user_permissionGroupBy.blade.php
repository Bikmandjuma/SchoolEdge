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
    
        <div class="col-xl-2"></div>
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                      <button class="nav-link {{ Request::segment(2) == 'school_user_permission' ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="window.location.href='{{ route('main.school_user_permission') }}'">Permissions</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link {{ Request::segment(2) == 'school_user_permission_groupBy' ? 'active' : '' }}" onclick="window.location.href='{{ route('main.school_user_permission_groupBy') }}'">Permission_groupBy</button>
                  </li>
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  &nbsp;
                  <li>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddPermissionGroupByModal"><i class="fa fa-plus"></i> new permission_GoupBy</button>
                  </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">All permission_group_By</h5>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 label ">
                      <table class="table datatable">
                          <thead>
                            <tr>
                              <th>
                                <b>N</b>o
                              </th>
                              <th>Permission_name</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($permission_data as $data)
                            <tr>
                              <td>{{ $count++ }}</td>
                              <td>{{ $data->name }}</td>
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
        <div class="col-xl-2"></div>

      </div>
    </section>


  <div class="modal fade" id="AddPermissionGroupByModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                <h5 class="modal-title">Add new permission&nbsp;&nbsp;<i class="fa fa-pencil"></i> </h5>
              </div>
              <div class="modal-body align-items-center justify-content-center" style="display: flex; flex-direction: column; align-items:center;">
                <form action="{{ route('main.post_new_permission_groupBy') }}" method="POST">
                  @csrf
                  <label>Permission_GroupBy_name</label>
                  <input name="name" placeholder="Enter name ex:dashboard" class="form-control">
                  <br>
                  <button type="submit" class="btn btn-primary text-center mt-2">Submit&nbsp;<i class="fa fa-save"></i></button>
                </form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close&nbsp;<i class="fa fa-times"></i></button>
              </div>
          </div>
      </div>
  </div>

@endsection