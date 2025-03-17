@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p>What would you like to do?</p>

                    <div class="list-group mt-4">
                        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
                            Go to Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action">
                            View Profile
                        </a>
                        <a href="{{ route('grades.index') }}" class="list-group-item list-group-item-action">
                            View Grades
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 