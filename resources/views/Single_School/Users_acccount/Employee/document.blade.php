@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')    
    @php
        $user = auth()->guard('school_employee')->user();
    @endphp
    <style type="text/css">
      #fileName{
        max-height:43px;
      }

      #btn_id{
        max-height: 43px;
      }

      .my_document_place {
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          grid-template-rows: repeat(2, 1fr);
          gap: 10px;
          position: relative;
          width: 400px; /* Adjust width as needed */
          height: 400px; /* Adjust height as needed */
      }

      .grid-image {
          width: 100%;
          height: 100%;
          object-fit: cover;
          display: block;
      }

      .my_document_place img:nth-child(4) {
          grid-column: 1 / span 2;
          grid-row: 1 / span 2;
      }

      .image-overlay {
          position: absolute;
          bottom: 0;
          right: 0;
          background-color: rgba(0, 0, 0, 0.6);
          color: white;
          padding: 10px;
          font-size: 20px;
          font-weight: bold;
          border-radius: 8px;
      }

      /* Responsive styling */
      @media (max-width: 576px) {
        .my_document_place {
            max-width: 100%;
        }
        .grid-image {
            border-radius: 5px;
        }
      }

    </style>
    <span>

    <div class="container-fluid px-2 px-md-4">
      
      <div class="card card-body mx-3 mx-md-4 mt-4">
        <div class="row gx-4 mb-2">
          
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item" onclick="window.location.href='{{ route('my_document', ['school_id' => Crypt::encrypt($school_id)]) }}'">                   
                    <a class="nav-link mb-0 px-0 py-1 {{ request()->segment(2) === 'documents' ? 'bg-info text-white' : '' }}" data-bs-toggle="tab" role="tab" aria-selected="true">                     
                        <i class="fa fa-file text-lg position-relative"></i>                     
                        <span class="ms-1">My documents</span>                   
                    </a>                 
                </li>


                <li class="nav-item" onclick="window.location.href='{{ route('my_personal_file', ['school_id' => Crypt::encrypt($school_id)]) }}'">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" role="tab" aria-selected="false">
                        <i class="fa fa-file text-lg position-relative"></i>
                        <span class="ms-1">Personal files</span>
                    </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="row">
            
            <div class="col-12 col-xl-12 text-center">
              <div class="card card-plain h-100">
                <div class="card-body pb-0 p-3 text-center mb-3">
                  <h6 class="mb-4 mt-4 text-center">Documents</h6>
                    <div class="row">
                        <div class="col-md-6">
                          <form action="" method="POST" class="p-4 border rounded shadow-sm" style="max-width: 400px;">
                            <div class="mb-3 text-center">
                                <label for="fileUpload" class="form-label text-muted">Upload Your File</label>
                                <div class="input-group">
                                    <input type="file" name="firstname" class="form-control d-none" id="fileUpload" required onchange="updateFileName()">
                                    <input type="text" class="form-control" id="fileName" placeholder="No file selected" readonly>
                                    <button type="button" id="btn_id" class="btn btn-info" onclick="document.getElementById('fileUpload').click()">
                                        <i class="fa fa-folder-open"></i> Browse
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info w-100 mt-3">
                                    <i class="fa fa-paper-plane"></i> Submit
                                </button>
                            </div>
                        </form>
                        </div>
                        <div class="col-md-6">
                          <div class="my_document_place">
                              <!-- Images will be added here dynamically or statically -->
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 1">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 2">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 3">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 4">
                              <!-- Additional images for testing -->
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 5">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 5">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 5">
                              <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/download.png" class="grid-image" alt="Image 5">
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
        </div>
       </div>

      </div>
    </div>

    <script>
        function updateFileName() {
            var fileInput = document.getElementById('fileUpload');
            var fileNameDisplay = document.getElementById('fileName');
            fileNameDisplay.value = fileInput.files.length > 0 ? fileInput.files[0].name : 'No file selected';
        }

        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.my_document_place .grid-image');
            if (images.length > 4) {
                const overlay = document.createElement('div');
                overlay.className = 'image-overlay';
                overlay.textContent = `+${images.length - 4}`;
                document.querySelector('.my_document_place').appendChild(overlay);
                
                // Hide all images after the fourth one
                images.forEach((img, index) => {
                    if (index > 3) img.style.display = 'none';
                });
            }
        });
    </script>

@endsection