@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

<div class="w-full px-4 py-6">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-4">
        <div class="xl:col-span-2"></div>

        <div class="xl:col-span-8">
            <div class="bg-white rounded-2xl shadow">
                <div class="bg-gradient-to-r from-gray-400 to-gray-500 text-center rounded-lg py-2">
                    <h6 class="text-white text-lg font-semibold">Add new level in <b>{{ $academic_term }}</b> , acad_year -><b>{{ $academic_year }}</b></h6>
                </div>
                <div class="mt-4">
                    <form action="" method="POST">
                        @csrf
                        <div class="max-w-md mx-auto">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-1">Add level/Senior ex:Level 1 / L1</label>
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
