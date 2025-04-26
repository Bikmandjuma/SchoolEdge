@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

<div class="w-full px-4 py-6">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-4">
        <div class="xl:col-span-2"></div>

        <div class="xl:col-span-8">
            <div class="bg-white rounded-2xl shadow">
                <div class="bg-gradient-to-r from-gray-400 to-gray-500 text-center rounded-lg py-2">
                    <h6 class="text-white text-lg font-semibold uppercase">Add new academic year</h6>
                </div>
                <div class="mt-4">
                    <form action="{{ route('school_add_academic_year', Crypt::encrypt($school_id)) }}" method="POST">
                        @csrf
                        <div class="max-w-md mx-auto">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">New academic year ex:2020-2021</label>
                                <input type="hidden" name="academic_id">
                                <input 
                                      type="text" 
                                      name="academic_year_name" 
                                      id="academic_year_input"
                                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                      value="{{ old('academic_name') }}" 
                                      placeholder="e.g. 2021-2022"
                                      pattern="^\d{4}-\d{4}$"
                                      required
                                      oninput="validateAcademicYear(this)"
                                >

                                @error('academic_year_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center p-2">
                                <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="xl:col-span-2"></div>
    </div>

    <div class="mt-10 grid grid-cols-1 xl:grid-cols-12 gap-4">
        <div class="xl:col-span-1"></div>

        <div class="xl:col-span-10">
            <div class="bg-white rounded-2xl shadow">
                <div class="bg-gradient-to-r from-gray-600 to-gray-500 text-white rounded-lg px-4 py-2">
                    @if($academic_year)
                        <div class="flex justify-between items-center">
                            <h6 class="text-white font-semibold">Acad_year: {{ $academic_year->academic_year_name }}</h6>
                            <button class="bg-white text-gray-800 px-4 py-2 rounded hover:bg-gray-100 transition" data-bs-toggle="modal" data-bs-target="#addTermModal">
                                <i class="fa fa-plus mr-1"></i> Add term
                            </button>
                        </div>
                    @else
                        <p class="text-white mt-2 text-center">No academic year found for this school.</p>
                        <style>
                            #card_body_id { display: none; }
                        </style>
                    @endif
                </div>

                @if($academic_term_count == 0)
                    <p class="text-center text-gray-600 mt-4 pb-4">No data of terms found</p>
                @else

                    @foreach($fetch_academic_term as $term)
                        <div class="bg-white rounded-lg shadow mt-4 px-4 py-3">
                            <div class="flex justify-between items-center">
                                <p class="font-bold text-gray-700">
                                    {{ $term->term_name }}
                                    <i 
                                      class="fa fa-edit text-blue-500 hover:cursor-pointer ml-2" 
                                      title="edit {{ $term->term_name }}" 
                                      data-bs-toggle="modal" 
                                      data-bs-target="#editTermModal"
                                      onclick="openEditModal('{{ $term->id }}', '{{ $term->term_name }}', '{{ $term->start_date }}', '{{ $term->end_date }}')"
                                    ></i>
                                </p>
                                <a href="{{url('school/Single_School_view_Add_level')}}/{{ crypt::encrypt($term->id) }}/{{crypt::encrypt($school_id)}}" class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-400 transition">
                                    <i class="fa fa-eye mr-1"></i> View
                                </a>
                            </div>
                        </div>
                    @endforeach

                @endif

                <div class="p-4" id="card_body_id"></div>
            </div>
        </div>

        <div class="xl:col-span-1"></div>
    </div>
</div>

<!-- Edit Term Modal -->
<div class="modal fade" id="editTermModal" tabindex="-1" aria-labelledby="editTermLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTermLabel">Edit Term</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editTermForm" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="term_id" id="edit_term_id">
          <div class="mb-3">
            <label class="form-label">Term Name</label>
            <input type="text" class="form-control" name="term_name" id="edit_term_name" required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Start Date</label>
              <input type="date" class="form-control" name="start_date" id="edit_start_date" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">End Date</label>
              <input type="date" class="form-control" name="end_date" id="edit_end_date" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addTermModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-full text-center font-semibold">Add term</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($academic_year)
                    <form method="POST" action="{{ url('school/school_add_term') }}/{{ Crypt::encrypt($academic_year->id) }}/{{ Crypt::encrypt($school_id) }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-1">Term Name</label>
                            <input type="text" name="term_names" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter term_name ex : Term 1 ,Term 2 ..." required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1">Start date</label>
                                <input type="date" name="start_date" class="w-full border border-gray-300 rounded px-3 py-2" required>
                            </div>
                            <div>
                                <label class="block mb-1">End date</label>
                                <input type="date" name="end_date" class="w-full border border-gray-300 rounded px-3 py-2" required>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i> Close
                            </button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>


<script>
    function validateAcademicYear(input) {
      const pattern = /^\d{4}-\d{4}$/;
      if (!pattern.test(input.value)) {
        input.setCustomValidity("Please enter a valid format like 2021-2022");
      } else {
        input.setCustomValidity("");
      }
    }

    function openEditModal(id, name, start, end) {
      const form = document.getElementById('editTermForm');
      form.action = `/school/edit_term/${id}`;
      document.getElementById('edit_term_id').value = id;
      document.getElementById('edit_term_name').value = name;
      document.getElementById('edit_start_date').value = start;
      document.getElementById('edit_end_date').value = end;
    }
</script>
@endsection
