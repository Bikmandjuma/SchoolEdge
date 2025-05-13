@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

@php
    $user = auth()->guard('school_employee')->user();
@endphp

<div class="py-6 px-4 max-w-7xl mx-auto">
    <div class="flex flex-col lg:flex-row gap-6 justify-center">
        
        @if($user->hasPermission('Add_course') || $user->role->role_name === 'Admin')
        <div class="w-full lg:w-1/3">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-gray-600 to-gray-700 p-3 text-center">
                    <h6 class="text-white text-lg font-semibold">Add new course</h6>
                </div>
                <div class="p-4">
                    <form action="{{ route('school_employee_add_new_course',$school_id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Course name</label>
                            <input type="text" name="course_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-info focus:border-info bg-blue-100 p-1">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-info-dark transition">
                                <i class="fa fa-plus mr-2"></i> Add course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if($user->hasPermission('View_course') || $user->role->role_name === 'Admin')
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-gray-600 to-gray-700 p-3 text-center">
                    <h6 class="text-white text-lg font-semibold">All courses</h6>
                </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <tbody>
                                @foreach($course_data as $data)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $data->course_name }}</td>
                                        @if($user->hasPermission('Edit_course') || $user->role->role_name === 'Admin')
                                        <td class="py-2 px-4">
                                            <button 
                                                type="button"
                                                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition edit-btn float-right" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editCourseModal" 
                                                data-id="{{ $data->id }}" 
                                                data-course="{{ $data->course_name }}">
                                                <i class="fa fa-edit mr-1"></i>Edit
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @if($count_course_data == 0)
                                <tr>
                                    <td colspan="2" class="text-center py-3 text-gray-500">No Course data found!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-lg shadow-lg">
            <div class="modal-header bg-gray-100">
                <h5 class="modal-title font-semibold text-lg" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form id="editCourseForm" method="POST" action="{{ route('school_employee_update_course') }}">
                    @csrf
                    <input type="hidden" id="courseId" name="course_id">

                    <div class="mb-4">
                        <label for="courseName" class="block text-gray-700 mb-1">Course Name</label>
                        <input type="text" class="form-control w-full border border-gray-300 px-3 py-2 rounded-md" id="courseName" name="course_name" required>
                    </div>

                    <div class="modal-footer flex justify-end gap-2 mt-4">
                        <button type="button" class="btn btn-secondary px-4 py-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 transition">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const courseId = this.getAttribute('data-id');
                const courseName = this.getAttribute('data-course');

                document.getElementById('courseId').value = courseId;
                document.getElementById('courseName').value = courseName;
            });
        });
    });
</script>

@endsection
