@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
        </div>
    </div>

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Users</a>
</div>
@endsection
