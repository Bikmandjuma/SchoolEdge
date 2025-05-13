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
      <h2 class="text-xl font-semibold text-center md:text-left mb-2 md:mb-0">All Students Info <span class="bg-blue-500 rounded-2xl pl-2 pr-2">{{ $students_count }}k</span> </h2>
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
                      <a href="#" class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded-full">Edit</a>
                    @endif
                    @if($user->hasPermission('View_student') || $user->role->role_name === 'Admin')
                      <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-full">View</a>
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

{{-- Search Script --}}
<script>
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
