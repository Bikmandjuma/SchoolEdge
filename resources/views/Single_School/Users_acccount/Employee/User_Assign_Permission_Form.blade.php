@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')
<style>
    /* Tailwind handles most styling, but use inline styles if needed */
</style>

<div class="text-center text-2xl font-semibold text-gray-700 mb-6">
    Assign permissions/tasks to <b>{{ $user->firstname }} - {{ $user->lastname }}</b>
</div>

<!-- 🔍 Search GroupBy -->
<form method="GET" action="" class="flex justify-center mb-6">
    <input type="hidden" name="search" value="{{ request('search') }}">
    <input type="text" name="search" value="{{ request('search') }}"
        placeholder="Search Permission Group..."
        class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-md focus:ring focus:border-blue-300">
    <button type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">
        Search
    </button>
</form>

<!-- 🔐 Permissions Form -->
<form action="{{ route('user_assign_permissions', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($user->id)]) }}" method="POST">
    @csrf

    @foreach($permissionGroups as $group)
        <h4 class="text-center text-lg font-bold text-gray-800 mt-8 mb-2">{{ $group->name }}</h4>

        <div class="overflow-x-auto w-full">
            <table class="min-w-[80%] mx-auto mb-6 border border-gray-300 shadow-lg rounded-lg divide-y divide-gray-200">
                <thead class="bg-blue-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-center">Select</th>
                        <th class="px-6 py-3 text-left">Permission Name</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($group->permissions as $permission)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="text-center px-6 py-3">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    @if($user->permissions->contains($permission->id)) checked @endif
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </td>
                            <td class="px-6 py-3 text-gray-800">{{ $permission->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-gray-500 py-4 italic">
                                No data found yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach

    <!-- Tailwind pagination centered -->
    <div class="w-full flex justify-center mt-4 mb-6">
        {{ $permissionGroups->links() }}
    </div>

    <!-- Button Container -->
    <div class="flex justify-center">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-md shadow transition duration-300">
            Save Permissions
        </button>
    </div>
</form>
@endsection
