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
        <img class="w-32 h-32 rounded-xl shadow-md object-cover" src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $student->image }}" alt="profile_image">
      </div>

      <!-- Student Info -->
      <div class="flex flex-col justify-center">
        <h2 class="text-2xl font-semibold text-gray-800">
          {{ $student->firstname }} {{ $student->lastname }}
        </h2>
        <p class="text-sm text-gray-600 mt-1">
          Gender: <span class="font-medium">{{ $student->gender }}</span>
        </p>
      </div>
    </div>

    <!-- Main Info Grid -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Student Info Card -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Information</h3>
        <ul class="space-y-2 text-sm text-gray-700">
          <li><strong>Names:</strong> {{ $student->firstname }} {{ $student->middle_name }} {{ $student->lastname }}</li>
          <li><strong>Gender:</strong> {{ $student->gender }}</li>
          <li><strong>Date of Birth:</strong> {{ $student->dob }}</li>
          <li><strong>Province:</strong> {{ $student->province }}</li>
          <li><strong>District:</strong> {{ $student->district }}</li>
          <li><strong>Sector:</strong> {{ $student->sector }}</li>
          <li><strong>Cell:</strong> {{ $student->cell }}</li>
          <li><strong>Village:</strong> {{ $student->village }}</li>
        </ul>
      </div>

      <!-- Parent/Guardian Info -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Parent/Guardian Info</h3>
        <ul class="space-y-2 text-sm text-gray-700">
          <li><strong>Father's Name:</strong> {{ $student->father_names }}</li>
          <li><strong>Father's Phone:</strong> {{ $student->father_phone }}</li>
          <li><strong>Mother's Name:</strong> {{ $student->mother_names }}</li>
          <li><strong>Mother's Phone:</strong> {{ $student->mother_phone }}</li>
          @if($student->guardian_names)
            <li><strong>Guardian's Name:</strong> {{ $student->guardian_names }}</li>
          @endif
          @if($student->guardian_phone)
            <li><strong>Guardian's Phone:</strong> {{ $student->guardian_phone }}</li>
          @endif
        </ul>
      </div>

      <!-- Classes to Study -->
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Classes to Study</h3>
        <ul class="text-sm text-gray-700">
          @forelse ($student->studentClasses as $class)
            <li>
              Class: {{ $class->classCourseFn->levelClassFn->name }} -
              Course: {{ $class->classCourseFn->course_name }}
            </li>
          @empty
            <li>No class assigned</li>
          @endforelse
        </ul>
      </div>

    </div>
  </div>
</div>

@endsection
