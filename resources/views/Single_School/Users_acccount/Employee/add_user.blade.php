@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')

<div class="py-10 px-4 sm:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg">
            <div class="bg-gray-700 text-white text-center py-3 rounded-t-xl">
                <h2 class="text-lg font-semibold">Add new employee</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('school_employee_submit_user_data', $school_id) }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-medium mb-1">First Name</label>
                            <input type="text" name="firstname" class="w-full border-gray-300 bg-blue-100 p-1 rounded-md shadow-sm focus:ring focus:ring-blue-200" value="{{ old('firstname') }}">
                            @error('firstname')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Middle Name -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Middle Name</label>
                            <input type="text" name="middle_name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 bg-blue-100 p-1" value="{{ old('middle_name') }}">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Last Name</label>
                            <input type="text" name="lastname" class="w-full border-gray-300 rounded-md bg-blue-100 p-1 shadow-sm focus:ring focus:ring-blue-200" value="{{ old('lastname') }}">
                            @error('lastname')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Username</label>
                            <input type="text" name="username" class="w-full border-gray-300 rounded-md shadow-sm bg-blue-100 p-1 focus:ring focus:ring-blue-200" value="{{ old('username') }}">
                            @error('username')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" class="w-full border-gray-300 bg-blue-100 p-1 rounded-md shadow-sm focus:ring focus:ring-blue-200" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <input type="text" name="phone" class="w-full border-gray-300 rounded-md bg-blue-100 p-1 shadow-sm focus:ring focus:ring-blue-200" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- DOB -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Date of Birth</label>
                            <input type="date" name="dob" class="w-full border-gray-300 rounded-md shadow-sm bg-blue-100 p-1 focus:ring focus:ring-blue-200" value="{{ old('dob') }}">
                            @error('dob')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="block text-sm font-medium mb-1">User Role</label>
                            <select name="user_role" class="w-full border-gray-300 bg-blue-100 p-1 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                                <option value="">Select user_role</option>
                                @foreach($user_role_data as $data)
                                    <option value="{{ $data->id }}">{{ $data->role_name }}</option>
                                @endforeach
                            </select>
                            @error('user_role')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Password</label>
                            <input type="password" name="password" class="w-full border-gray-300 rounded-md bg-blue-100 p-1 shadow-sm focus:ring focus:ring-blue-200">
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm bg-blue-100 p-1 focus:ring focus:ring-blue-200">
                            @error('password_confirmation')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Gender</label>
                            <div class="flex items-center space-x-4 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Male" class="form-radio text-blue-500 bg-blue-100 p-1">
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female" class="form-radio bg-blue-100 p-1 text-pink-500">
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                            @error('gender')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow">
                            <i class="fa fa-plus mr-1"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
