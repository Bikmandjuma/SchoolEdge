@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

@php
    $user = auth()->guard('school_employee')->user();
@endphp

<div class="container mx-auto px-4 py-6">

  <div class="px-4 py-2 border-b flex flex-wrap gap-3 bg-gray-100">
      <a href="" class="flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-blue-100 hover:bg-blue-200 text-blue-800">
        All Students <span class="ml-1 bg-blue-500 text-white rounded-full px-2">{{ $students_count }}</span>
      </a>
      <a href="" class="flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 hover:bg-indigo-200 text-indigo-800">
        By Acad_Year <span class="ml-1 bg-indigo-500 text-white rounded-full px-2">{{ $acad_year_count ?? 0 }}</span>
      </a>
      <a href="" class="flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 hover:bg-yellow-200 text-yellow-800">
        Unfinished Info <span class="ml-1 bg-yellow-500 text-white rounded-full px-2">{{ $unfinished_count ?? 0 }}</span>
      </a>
      <a href="" class="flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-red-100 hover:bg-red-200 text-red-800">
        Unclassified <span class="ml-1 bg-red-500 text-white rounded-full px-2">{{ $unclassified_count ?? 0 }}</span>
      </a>
  </div>

  <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-gray-800 to-gray-600 p-4 text-white flex flex-col md:flex-row justify-between items-center">
      <h2 class="text-xl font-semibold text-center md:text-left mb-2 md:mb-0">All Students Info <span class="bg-blue-500 rounded-2xl pl-2 pr-2">{{ $students_count }}</span> </h2>
      <div class="w-full md:w-1/3">
        <input type="text" id="search_input" placeholder="Search..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700">
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
          <tr>
            <th class="px-6 py-3 text-center">N<sub>o</sub></th>
            <th class="px-6 py-3">Student Info</th>
            <th class="px-6 py-3">Address</th>
            <th class="px-6 py-3 text-center">DOB</th>
            @if($user->hasPermission('View_student_info') || $user->hasPermission('Edit_student') || $user->role->role_name === 'Admin')
            <th class="px-6 py-3 text-center">Actions</th>
            @endif
          </tr>
        </thead>
        <tbody id="student_table">
          @if($students_count == 0)
            <tr>
              <td colspan="5" class="text-center px-6 py-4">No data found in our database</td>
            </tr>
          @else
            @foreach($school_students as $index => $data)
              <tr class="student_row border-t hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                <td class="px-6 py-4 flex items-center gap-4">
                  <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}" alt="Student" class="w-10 h-10 rounded-full object-cover" style="border: 3px solid #eee;">
                  <div>
                    <div class="font-semibold">{{ $data->firstname }} {{ $data->middle_name }} {{ $data->lastname }}</div>
                    <div class="text-xs text-gray-500">{{ $data->student_number }} , {{ $data->gender }}</div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm">{{ $data->province }} - {{ $data->district }} - {{ $data->sector }}</div>
                  <div class="text-xs text-gray-500">{{ $data->cell }} - {{ $data->village }}</div>
                </td>
                <td class="px-6 py-4 text-center">{{ $data->dob }}</td>
                @if($user->hasPermission('Edit_student') || $user->role->role_name === 'Admin' || $user->hasPermission('View_student'))
                <td class="px-6 py-4 text-center">
                  <div class="flex justify-center gap-2">
                    @if($user->hasPermission('Edit_student') || $user->role->role_name === 'Admin')
                      <!-- <a href="#" class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded-full">Edit</a> -->
                      <a href="javascript:void(0)"
                         onclick='openEditModal(@json($data))'
                         class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded-full">Edit</a>

                    @endif
                    @if($user->hasPermission('View_student') || $user->role->role_name === 'Admin')
                      <a href="{{ url('/school/view_student_data') }}/{{ Crypt::encrypt($data->id) }}/{{ Crypt::encrypt($school_id) }}/" class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-full">View</a>
                    @endif
                  </div>
                </td>
                @endif
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Edit Student Modal -->
<div id="editStudentModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 overflow-x-auto">
  <div class="bg-white w-full max-w-3xl rounded-xl p-6 relative">
    <button onclick="closeModal()" class="absolute top-2 right-4 text-xl font-bold">&times;</button>
    <h2 class="text-lg font-semibold mb-4">Edit Student Info</h2>

    <form id="editStudentForm" method="POST">
      @csrf
      @method('PUT')

      <input type="hidden" name="student_id" id="edit_student_id">

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label>Firstname</label>
          <input type="text" name="firstname" id="edit_firstname" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Middle Name</label>
          <input type="text" name="middle_name" id="edit_middle_name" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Lastname</label>
          <input type="text" name="lastname" id="edit_lastname" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Province</label>
          <input type="text" name="province" id="edit_province" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>District</label>
          <input type="text" name="district" id="edit_district" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Sector</label>
          <input type="text" name="sector" id="edit_sector" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Cell</label>
          <input type="text" name="cell" id="edit_cell" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Village</label>
          <input type="text" name="village" id="edit_village" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Gender</label>
          <select name="gender" id="edit_gender" class="w-full border p-2 rounded">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div>
          <label>DOB</label>
          <input type="date" name="dob" id="edit_dob" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Father's Name</label>
          <input type="text" name="father_names" id="edit_father_names" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Father's Phone</label>
          <input type="text" name="father_phone" id="edit_father_phone" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Mother's Name</label>
          <input type="text" name="mother_names" id="edit_mother_names" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Mother's Phone</label>
          <input type="text" name="mother_phone" id="edit_mother_phone" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Guardian's Name</label>
          <input type="text" name="guardian_names" id="edit_guardian_names" class="w-full border p-2 rounded">
        </div>
        <div>
          <label>Guardian's Phone</label>
          <input type="text" name="guardian_phone" id="edit_guardian_phone" class="w-full border p-2 rounded">
        </div>
      </div>

      <div class="mt-4 text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openEditModal(student) {
    // Set form action
    document.getElementById('editStudentForm').action = `/school/students/update/${student.id}`;

    // Populate fields
    document.getElementById('edit_student_id').value = student.id;
    document.getElementById('edit_firstname').value = student.firstname;
    document.getElementById('edit_middle_name').value = student.middle_name;
    document.getElementById('edit_lastname').value = student.lastname;
    document.getElementById('edit_province').value = student.province;
    document.getElementById('edit_district').value = student.district;
    document.getElementById('edit_sector').value = student.sector;
    document.getElementById('edit_cell').value = student.cell;
    document.getElementById('edit_village').value = student.village;
    document.getElementById('edit_gender').value = student.gender;
    document.getElementById('edit_dob').value = student.dob;
    document.getElementById('edit_father_names').value = student.father_names;
    document.getElementById('edit_father_phone').value = student.father_phone;
    document.getElementById('edit_mother_names').value = student.mother_names;
    document.getElementById('edit_mother_phone').value = student.mother_phone;
    document.getElementById('edit_guardian_names').value = student.guardian_names;
    document.getElementById('edit_guardian_phone').value = student.guardian_phone;

    // Show modal
    document.getElementById('editStudentModal').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('editStudentModal').classList.add('hidden');
  }

  document.getElementById('search_input').addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('.student_row');

    rows.forEach(row => {
      const nameText = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
      if (nameText.includes(searchTerm)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>
@endsection
