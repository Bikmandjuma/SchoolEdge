@extends('mainHome.shareHolder.cover')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style type="text/css">
  .my_add_btn:hover,#my_add_btn:hover{
    cursor: pointer;
  }

        table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        caption {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination button {
            padding: 8px 16px;
            margin: 0 5px;
            cursor: pointer;
            background-color: steelblue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .pagination button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
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
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table id="paymentTableTermly">
                  
                  <thead>
                      <tr>
                          <th colspan="2">Termly Payment Plan</th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr><td>Student_range</td><td>Price</td> </tr>
                      <tr><td>0-100</td><td>100,000</td></tr>
                      <tr><td>101-200</td><td>200,000</td></tr>
                      <tr><td>201-300</td><td>300,000</td></tr>
                      <tr><td>301-400</td><td>400,000</td></tr>
                      <tr><td>401-500</td><td>500,000</td></tr>
                      <tr><td>501-600</td><td>600,000</td></tr>
                      <tr><td>601-700</td><td>700,000</td></tr>
                      <tr><td>701-800</td><td>800,000</td></tr>
                      <tr><td>801-900</td><td>900,000</td></tr>
                      <tr><td>901-1000</td><td>1,000,000</td></tr>
                      <tr><td>1001-1100</td><td>1,100,000</td></tr>
                      <tr><td>1101-1200</td><td>1,200,000</td></tr>
                      <tr><td>1201-1300</td><td>1,300,000</td></tr>
                      <tr><td>1301-1400</td><td>1,400,000</td></tr>
                      <tr><td>1401-1500</td><td>1,500,000</td></tr>
                      <tr><td>1501-1600</td><td>1,600,000</td></tr>
                      <tr><td>1601-1700</td><td>1,700,000</td></tr>
                      <tr><td>1701-1800</td><td>1,800,000</td></tr>
                      <tr><td>1801-1900</td><td>1,900,000</td></tr>
                      <tr><td>1901-2000</td><td>2,000,000</td></tr>
                      <tr><td>2001-2100</td><td>2,100,000</td></tr>
                      <tr><td>2101-2200</td><td>2,200,000</td></tr>
                      <tr><td>2201-2300</td><td>2,300,000</td></tr>
                      <tr><td>2301-2400</td><td>2,400,000</td></tr>
                      <tr><td>2401-2500</td><td>2,500,000</td></tr>
                      <tr><td>2501-2600</td><td>2,600,000</td></tr>
                      <tr><td>2601-2700</td><td>2,700,000</td></tr>
                      <tr><td>2701-2800</td><td>2,800,000</td></tr>
                      <tr><td>2801-2900</td><td>2,900,000</td></tr>
                      <tr><td>2901-3000</td><td>3,000,000</td></tr>
                  </tbody>
              </table>
              <div class="pagination">
                  <button onclick="changePageTermly(-1)">Previous</button>
                  <button onclick="changePageTermly(1)">Next</button>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <table id="paymentTableAnnually">
                  
                  <thead>
                      <tr>
                          <th colspan="2">Annually Payment Plan</th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr><td>Student_range</td><td>Price</td> </tr>
                      <tr><td>0-100</td><td>150,000</td></tr>
                      <tr><td>101-200</td><td>300,000</td></tr>
                      <tr><td>201-300</td><td>450,000</td></tr>
                      <tr><td>301-400</td><td>600,000</td></tr>
                      <tr><td>401-500</td><td>750,000</td></tr>
                      <tr><td>501-600</td><td>900,000</td></tr>
                      <tr><td>601-700</td><td>1,050,000</td></tr>
                      <tr><td>701-800</td><td>1,200,000</td></tr>
                      <tr><td>801-900</td><td>1,350,000</td></tr>
                      <tr><td>901-1000</td><td>1,500,000</td></tr>
                      <tr><td>1001-1100</td><td>1,650,000</td></tr>
                      <tr><td>1101-1200</td><td>1,800,000</td></tr>
                      <tr><td>1201-1300</td><td>1,950,000</td></tr>
                      <tr><td>1301-1400</td><td>2,100,000</td></tr>
                      <tr><td>1401-1500</td><td>2,250,000</td></tr>
                      <tr><td>1501-1600</td><td>2,400,000</td></tr>
                      <tr><td>1601-1700</td><td>2,550,000</td></tr>
                      <tr><td>1701-1800</td><td>2,700,000</td></tr>
                      <tr><td>1801-1900</td><td>2,850,000</td></tr>
                      <tr><td>1901-2000</td><td>3,000,000</td></tr>
                      <tr><td>2001-2100</td><td>3,150,000</td></tr>
                      <tr><td>2101-2200</td><td>3,300,000</td></tr>
                      <tr><td>2201-2300</td><td>3,450,000</td></tr>
                      <tr><td>2301-2400</td><td>3,600,000</td></tr>
                      <tr><td>2401-2500</td><td>3,750,000</td></tr>
                      <tr><td>2501-2600</td><td>3,900,000</td></tr>
                      <tr><td>2601-2700</td><td>4,050,000</td></tr>
                      <tr><td>2701-2800</td><td>4,200,000</td></tr>
                      <tr><td>2801-2900</td><td>4,350,000</td></tr>
                      <tr><td>2901-3000</td><td>4,500,000</td></tr>


                  </tbody>
              </table>
              <div class="pagination">
                  <button onclick="changePageAnnually(-1)">Previous</button>
                  <button onclick="changePageAnnually(1)">Next</button>
              </div>

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

        const rowsPerPageTermly = 5;
        let currentPageTermly = 1;
        const rowsTermly = document.querySelectorAll("#paymentTableTermly tbody tr");
        const totalPagesTermly = Math.ceil(rowsTermly.length / rowsPerPageTermly);

        function renderPageTermly(page) {
            const start = (page - 1) * rowsPerPageTermly;
            const end = page * rowsPerPageTermly;

            rowsTermly.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function changePageTermly(direction) {
            currentPageTermly += direction;
            if (currentPageTermly < 1) currentPageTermly = 1;
            if (currentPageTermly > totalPagesTermly) currentPageTermly = totalPagesTermly;
            renderPageTermly(currentPageTermly);
        }

        renderPageTermly(currentPageTermly);

        const rowsPerPageAnnually = 5;
        let currentPageAnnually = 1;
        const rowsAnnually = document.querySelectorAll("#paymentTableAnnually tbody tr");
        const totalPagesAnnually = Math.ceil(rowsAnnually.length / rowsPerPageAnnually);

        function renderPageAnnually(page) {
            const start = (page - 1) * rowsPerPageAnnually;
            const end = page * rowsPerPageAnnually;

            rowsAnnually.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function changePageAnnually(direction) {
            currentPageAnnually += direction;
            if (currentPageAnnually < 1) currentPageAnnually = 1;
            if (currentPageAnnually > totalPagesAnnually) currentPageAnnually = totalPagesAnnually;
            renderPageAnnually(currentPageAnnually);
        }

        renderPageAnnually(currentPageAnnually);
    </script>

@endsection