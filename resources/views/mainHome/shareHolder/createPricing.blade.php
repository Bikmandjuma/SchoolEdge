@extends('mainHome.shareHolder.cover')
@section('content')
<style type="text/css">
  .my_add_btn:hover{
    cursor: pointer;
  }
</style>
    <div class="pagetitle">
      <h1>Manage pricing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Pricing</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card text-center">
              <div class="card-header">Payment plan &nbsp;<span class="badge bg-primary my_add_btn" data-bs-toggle="modal" data-bs-target="#add_payment_plan" style="display:flex;float: right"><i class="fa fa-plus"></i>&nbsp;Add new </span> </div>
              <div class="card-body">
                <table class="table table-bordered table-striped mt-3">
                  <tr class="bg-info text-white">
                    <th>No</th>
                    <th>Plan</th>
                    <th>Action</th>
                  </tr>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>plan name</td>
                        <td><span class="badge bg-primary"><i class="fa fa-edit"></i>&nbsp;Edit</span></td>
                      </tr>

                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>

    </section>

    <!-- start of add new payment plan model-->
      <div class="modal fade" id="add_payment_plan" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"style="display: flex; flex-direction: column; align-items:center;">
                  <h5 class="modal-title">Add new payment plan</h5>
                </div>
                <div class="modal-body align-items-center justify-content-center" style="display: flex; flex-direction: column; align-items:center;">
                        <form class="form-group text-center" action="" method="POST">
                          <input type="text" name="plan_name" placeholder="Enter payment plan" class="form-control">
                          <button class="btn btn-primary mt-2"><i class="fa fa-plus"></i>&nbspAdd</button>
                        </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cancel&nbsp;<i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of addnew payment plan model-->
@endsection