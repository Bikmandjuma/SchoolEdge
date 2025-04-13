@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')
@php
    $user = auth()->guard('school_employee')->user();
@endphp

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-600 px-6 py-4">
            <h2 class="text-white text-lg font-semibold">All School Employees</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-xs font-bold uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left">Employee / Role</th>
                        <th class="px-6 py-3 text-left">Contact</th>
                        <th class="px-6 py-3 text-left">DoB / Gender</th>
                        @if($user->hasPermission('Edit_user_info') || $user->hasPermission('View_user_info') || $user->hasPermission('Manage_user_permission') || $user->role->role_name === 'Admin')
                            <th class="px-6 py-3 text-center" colspan="3">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($all_users_data as $data)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <img src="{{ URL::to('/') }}/Single_school_account/assets/img/users_profiles_pictures/{{ $data->image }}"
                                     alt="User Image"
                                     class="w-12 h-12 rounded-full border border-gray-300 object-cover">
                                <div>
                                    <div class="font-medium text-gray-900">{{ $data->firstname }} {{ $data->middle_name }} {{ $data->lastname }}</div>
                                    <div class="text-sm text-gray-500">{{ $data->role->role_name ?? 'No Role Assigned' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div>{{ $data->email }}</div>
                                <div>{{ $data->phone }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div>{{ $data->dob }}</div>
                                <div>{{ $data->gender }}</div>
                            </td>

                            @if($user->hasPermission('Edit_user_info') || $user->hasPermission('View_user_info') || $user->hasPermission('Manage_user_permission') || $user->role->role_name === 'Admin')
                                <td class="px-4 py-4 text-center space-x-2 whitespace-nowrap">
                                    @if($user->hasPermission('Edit_user_info') || $user->role->role_name === 'Admin')
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full transition">
                                            Edit
                                        </button>
                                    @endif

                                    @if($user->hasPermission('View_user_info') || $user->role->role_name === 'Admin')
                                        <a href="{{ route('view_specific_user_info', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($data->id)]) }}"
                                           class="bg-gray-500 hover:bg-gray-600 text-white text-xs font-semibold px-3 py-1 rounded-full transition">
                                            View
                                        </a>
                                    @endif

                                    @if($user->hasPermission('Manage_user_permission') || $user->role->role_name === 'Admin')
                                        <a href="{{ route('user_permission_form', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($data->id)]) }}"
                                           class="bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full transition">
                                            Permission
                                        </a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
