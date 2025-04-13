@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

@php
    $user = auth()->guard('school_employee')->user();
@endphp

<div class="px-4 py-6 sm:px-6 lg:px-8">
  <div class="bg-white shadow rounded-2xl p-6">
    <div class="flex flex-wrap gap-6 items-start">
      <!-- Profile Picture -->
      <div class="flex-shrink-0">
        <img class="w-32 h-32 rounded-xl shadow-md object-cover" src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $school_employees->image }}" alt="profile_image">
      </div>

      <!-- User Info -->
      <div class="flex flex-col justify-center">
        <h2 class="text-2xl font-semibold text-gray-800">
          {{ $school_employees->firstname }} {{ $school_employees->lastname }}
        </h2>
        <p class="text-sm text-gray-600 mt-1">
          Role: <span class="font-medium">{{ $school_employees->role ? $school_employees->role->role_name : 'No Role Assigned' }}</span>
        </p>
      </div>

      <!-- Tabs -->
      <div class="ml-auto">
        <div class="flex gap-4">
          <button class="flex items-center px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700">
            <i class="fa fa-file mr-2"></i> My Documents
          </button>
        </div>
      </div>
    </div>

    <!-- Main Info Grid -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      
      <!-- Information Card -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Information</h3>
        <ul class="space-y-2 text-sm text-gray-700">
          <li><strong>Names:</strong> {{ $school_employees->firstname }} {{ $school_employees->middle_name }} {{ $school_employees->lastname }}</li>
          <li><strong>Gender:</strong> {{ $school_employees->gender }}</li>
          <li><strong>Phone:</strong> {{ $school_employees->phone }}</li>
          <li><strong>Email:</strong> {{ $school_employees->email }}</li>
          <li><strong>DoB:</strong> {{ $school_employees->dob }}</li>
          <li><strong>Joined:</strong> {{ $joined }}</li>
          <li class="flex items-center gap-2">
            <strong>Social:</strong>
            <div class="flex gap-2 text-lg text-blue-500">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-whatsapp"></i></a>
              <a href="#"><i class="fa fa-envelope"></i></a>
            </div>
          </li>
        </ul>
      </div>

      <!-- Permissions/Tasks -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Permissions/Tasks</h3>
        <div class="max-h-48 overflow-auto pr-2 text-sm text-gray-700 space-y-1">
          @if($school_employees->role->role_name === "Admin")
            <p class="text-blue-600">As the admin, you have unrestricted access to all system functions. You can manage tasks independently, including setting and resetting them at your discretion!</p>
          @else
            @if($count_permission == 0)
              <p>No permission!</p>
            @else
              <ul class="list-disc list-inside space-y-1">
                @foreach($user_permission as $permissionName)
                  <li>{{ $permissionName }}</li>
                @endforeach
              </ul>
            @endif
          @endif
        </div>
      </div>

      <!-- Classes to Teach -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Classes to Teach</h3>
        <ul class="text-sm text-gray-700">
          <li>No class</li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
