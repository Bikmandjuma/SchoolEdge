@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')
<style>
    /* Centering the user name section */
    .user_name {
        text-align: center;
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    /* Permissions container */
    .permissions-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px; /* Adjust space between items */
        justify-content: center; /* Center align checkboxes */
    }

    /* Each permission item */
    .permission-item {
        display: flex;
        align-items: center;
        font-size: 18px; /* Adjust font size for labels */
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    /* Styling the checkbox */
    .permission-item input[type="checkbox"] {
        margin-right: 10px;
        font-size: 24px;
        transition: transform 0.3s ease;
    }

    /* Adding hover effect to the permission item */
    .permission-item:hover {
        background-color: #e2e6ea;
        transform: scale(1.05);
    }

    /* Button container */
    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Button styling */
    button[type="submit"] {
        width: 20%;
        padding: 12px;
        background-color: #007bff;
        color: white;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Small screen adjustments for permissions */
    @media (max-width: 768px) {
        .permissions-container {
            flex-direction: column;
        }

        .permission-item {
            font-size: 16px;
            margin: 5px 0;
        }

        .permission-item input[type="checkbox"] {
            font-size: 20px;
        }

        /* Button width on small screens */
        button[type="submit"] {
            width: 50%;
        }
    }

    .pagination-container{
        position: relative;
        margin: 30px 20px;
        text-align: center;
        justify-content: center;
        justify-items: center;
        justify-self: center;
    }
</style>

<!-- Display User Name -->
<div class="user_name">
    Assign permissions/tasks to <b>{{ $user->firstname }} - {{ $user->lastname }}</b>
</div>

<!-- Form to Assign Permissions -->
<form action="{{ route('user_assign_permissions', ['school_id' => Crypt::encrypt($school_id), 'user_id' => Crypt::encrypt($user->id)]) }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="permissions-container">
            @foreach($permissions as $permission)
                <div class="permission-item">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                        @if($user->permissions->contains($permission->id)) checked @endif>
                    <span>{{ $permission->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Pagination Controls -->
    <div class="pagination-container">
        {{ $permissions->links() }}
    </div>

    <!-- Button Container -->
    <div class="button-container">
        <button type="submit" class="btn btn-primary">Save Permissions</button>
    </div>
</form>
@endsection
