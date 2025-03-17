@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Update User Form --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update User</button>
    </form>

    <hr>

    {{-- Change Password Form --}}
    <h3>Change Password</h3>
    <form action="{{ route('users.changePassword', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required>

    <button type="submit">Change Password</button>
</form>
</div>
@endsection
