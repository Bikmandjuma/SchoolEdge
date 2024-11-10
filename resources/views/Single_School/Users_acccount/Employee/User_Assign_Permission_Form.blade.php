@extends('Single_School.Users_acccount.Employee.Cover')
@section('content')

    <form action="{{ route('user_assign_permissions', $user->id) }}" method="POST">

    @csrf
    <div class="form-group">
        <label for="permissions">Select Permissions</label>
        @foreach($permissions as $permission)
            <div>
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                    @if($user->permissions->contains($permission->id)) checked @endif>
                {{ $permission->name }}
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Save Permissions</button>
</form>
@endsection