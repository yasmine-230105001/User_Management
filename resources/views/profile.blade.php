@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>User Profile</h2>
        <p>Welcome, {{ auth()->user()->name }}!</p>
        <p>Email: {{ auth()->user()->email }}</p>

        <h4>Update Email</h4>
        <form method="POST" action="{{ route('profile.updateEmail') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="new_email" class="form-label">New Email:</label>
                <input type="email" name="new_email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Email</button>
        </form>

        <h4 class="mt-4">Update Password</h4>
        <form method="POST" action="{{ route('profile.updatePassword') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password:</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password:</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
