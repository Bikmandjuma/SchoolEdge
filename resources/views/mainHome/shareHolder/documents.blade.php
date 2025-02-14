@extends('mainHome.shareHolder.cover')
@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Documents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">

            @if($errors->any())
                <ul style="text-decoration: none;">
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                </ul>
            @endif
          
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Upload File</h5>
                    <form action="{{ route('main.storeFile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload File</label>
                            <input type="file" name="UploadFile" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
        <div class="col-lg-2"></div>
      </div>

      <br>

      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 text-center">
          
          <div class="container">
              <h2 class="text-center">Uploaded Files</h2>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>File</th>
                          <!-- <th>Action</th> -->
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($files as $file)
                      <tr>
                          <td>{{ $file->title }}</td>
                          <td>{{ $file->description }}</td>
                          <td>
                              @php
                                  $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                              @endphp
                              
                              @if(in_array($fileExtension, ['jpg', 'png']))
                                  <img src="{{ asset('storage/' . $file->file_path) }}" width="100">
                              @elseif(in_array($fileExtension, ['pdf', 'docx']))
                                  <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" download>View File</a>
                              @else
                                  <span>Unsupported File Type</span>
                              @endif
                          </td>
                          <!-- <td>
                              <form action="{{ route('main.deleteFile', $file->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </form>
                          </td> -->
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>


        </div>
        <div class="col-lg-2"></div>
      </div>
    </section>

@endsection
