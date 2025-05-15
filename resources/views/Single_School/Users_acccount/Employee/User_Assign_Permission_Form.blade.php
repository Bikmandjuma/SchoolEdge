@extends('Single_School.Users_acccount.Employee.Cover')

@section('content')

<div class="text-center text-2xl font-semibold text-gray-700 mb-6">
    Assign permissions/tasks to <b>{{ $user->firstname }} - {{ $user->lastname }}</b>
</div>

<form id="permissionForm" action="{{ route('user_assign_permissions', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($user->id)]) }}" method="POST">
    @csrf
    <input type="hidden" name="permissions" id="permissions_hidden">

    <!-- Tabs for groups -->
    <div class="flex flex-wrap justify-center space-x-2 mb-6">
        @foreach($permissionGroups as $group)
            <button type="button" class="group-tab px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" data-group="{{ $group->id }}">
                {{ $group->name }}
            </button>
        @endforeach
    </div>

    <!-- Container where permission table will render -->
    <div id="permissionTableContainer" class="w-full overflow-x-auto px-4"></div>

    <!-- Pagination -->
    <div id="paginationControls" class="flex justify-center items-center space-x-2 my-6"></div>

    <!-- Save -->
    <div class="flex justify-center">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-md shadow transition duration-300">
            Save Permissions
        </button>
    </div>
</form>

<script>
    const permissionsPerPage = 10;
    const groups = @json($permissionGroups);
    const preChecked = @json($user->permissions->pluck('id')->toArray());
    let currentGroupId = groups.length ? groups[0].id : null;
    let currentPage = 1;
    let selectedPermissions = new Set(preChecked);

    function renderTable(groupId, page = 1) {
        const group = groups.find(g => g.id == groupId);
        if (!group) return;

        currentGroupId = groupId;
        currentPage = page;

        const container = document.getElementById('permissionTableContainer');
        const start = (page - 1) * permissionsPerPage;
        const end = start + permissionsPerPage;
        const paged = group.permissions.slice(start, end);

        let html = '';

        if (group.permissions.length === 0) {
            html = `<div class="text-center text-gray-500 italic py-6">
                No permissions found for this group.
            </div>`;
        } else {
            html = `<table class="min-w-[80%] mx-auto mb-6 border border-gray-300 shadow rounded divide-y divide-gray-200">
                <thead class="bg-blue-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3 text-center">Select</th>
                        <th class="px-6 py-3 text-left">Permission Name</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">`;

            paged.forEach(p => {
                html += `
                    <tr class="hover:bg-gray-50">
                        <td class="text-center px-6 py-3">
                            <input type="checkbox" class="permission-box" value="${p.id}" ${selectedPermissions.has(p.id) ? 'checked' : ''}>
                        </td>
                        <td class="px-6 py-3 text-gray-800">${p.name}</td>
                    </tr>`;
            });

            html += '</tbody></table>';
        }

        container.innerHTML = html;

        renderPagination(group.permissions.length);
        attachCheckboxListeners();
    }

    function renderPagination(totalPermissions) {
        const totalPages = Math.ceil(totalPermissions / permissionsPerPage);
        const container = document.getElementById('paginationControls');
        container.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = `px-3 py-1 rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300'}`;
            btn.addEventListener('click', () => renderTable(currentGroupId, i));
            container.appendChild(btn);
        }
    }

    function attachCheckboxListeners() {
        document.querySelectorAll('.permission-box').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const val = parseInt(checkbox.value);
                if (checkbox.checked) {
                    selectedPermissions.add(val);
                } else {
                    selectedPermissions.delete(val);
                }
            });
        });
    }

    document.querySelectorAll('.group-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            const groupId = tab.getAttribute('data-group');
            renderTable(groupId, 1);
        });
    });

    document.getElementById('permissionForm').addEventListener('submit', function (e) {
        if (selectedPermissions.size === 0) {
            alert("Please select at least one permission.");
            e.preventDefault();
        } else {
            document.getElementById('permissions_hidden').value = Array.from(selectedPermissions).join(',');
        }
    });

    // Initial load
    if (currentGroupId) {
        renderTable(currentGroupId, 1);
    }
</script>

@endsection
