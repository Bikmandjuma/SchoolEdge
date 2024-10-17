@extends('mainHome.shareHolder.cover')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style type="text/css">
  .my_add_btn:hover,#my_add_btn:hover{
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
                @error('plan_name')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <table class="table table-bordered table-striped mt-3">
                  <tr class="bg-info text-white">
                    <th>N<sup>o</sup></th>
                    <th>Plan</th>
                    <th>Action</th>
                  </tr>
                  <tbody>
                    @foreach($payment_plan as $data)
                       <tr>
                          <td>{{ $count++ }}</td>
                          <td>{{ $data->period }}</td>
                          <td>
                              <span class="badge bg-primary edit-badge" 
                                    data-id="{{ $data->id }}"
                                    id="my_add_btn" 
                                    data-period="{{ $data->period }}">
                                  <i class="fa fa-edit"></i>&nbsp;Edit
                              </span>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                  @if($count_payment_plan == 0)
                      <tr>
                        <td colspan="3">No data found !</td>
                      </tr>
                  @endif
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
                      @if($count_payment_plan == 2)
                        <p>Already have two payment plan , no need to add the third one !</p>
                      @else
                        <form class="form-group text-center" action="{{ route('main.add_new_payment_plan') }}" method="POST">
                          @csrf
                          <input type="text" name="plan_name" placeholder="Enter payment plan" class="form-control">
                          <button class="btn btn-primary mt-2"><i class="fa fa-plus"></i>&nbspAdd</button>
                        </form>
                      @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cancel&nbsp;<i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of addnew payment plan model-->

    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Payment plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('main.update_payment_plan') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="periodId">
                    <div class="mb-3">
                        <label for="period" class="form-label">Plan name</label>
                        <input type="text" class="form-control" id="period" name="period" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Open modal and fill in data specific to the clicked row
    $('.edit-badge').on('click', function() {
        var periodId = $(this).data('id');
        var period = $(this).data('period');

        // Set values in the modal form fields
        $('#periodId').val(periodId);
        $('#period').val(period);
        
        // Show the modal
        $('#editModal').modal('show');
    });

    // Handle form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        var formData = $(this).serialize(); // Serialize form data
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                // Handle success response (e.g., update table row, close modal)
                $('#editModal').modal('hide');
                location.href = '/shareHolder/create_price'; // Redirect to the desired page
            },
            error: function(xhr) {
                // Handle error response
                alert('An error occurred while updating the data.');
            }
        });
    });
});

</script>
@endsection