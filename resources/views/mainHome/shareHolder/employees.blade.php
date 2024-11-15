@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Employees</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          
          <div class="card">
              <div class="card-body" style="overflow: auto;">
                  <h5 class="card-title text-center"><i class="fa fa-money"></i> <span class="badge  text-white bg-primary badge-number"></span>All employees list</h5>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          <b>N</b><sup>o</sup>
                        </th>
                        <th>Image</th>
                        <th>firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <!-- <th>Phone</th>
                        <th>Email</th>
                        <th>DoB</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="6" class="text-center">
                          No data found yet 
                        </td>
                        
                      </tr>
                      
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>

@endsection