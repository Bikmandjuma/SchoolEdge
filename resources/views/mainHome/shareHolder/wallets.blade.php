@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Wallets</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          
          <div class="card">
              <div class="card-body" style="overflow: auto;">
                  <h5 class="card-title text-center"><i class="fa fa-money"></i> <span class="badge  text-white bg-primary badge-number"></span> Wallet (All school/customers payments history)</h5>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          <b>N</b>o
                        </th>
                        <th>School_name</th>
                        <th>Pyment_plan</th>
                        <th>student_range</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="5" class="text-center">
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