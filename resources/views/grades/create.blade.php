@extends('layouts.app')

@section('content')
    <h2>Add Grade</h2>
    <form method="POST" action="{{ route('grades.store') }}">
        @csrf
        <label>Course Name:</label>
        <input type="text" name="course_name" required>

        <label>Course Code:</label>
        <input type="text" name="course_code" required>

        <label>Credit Hours:</label>
        <input type="number" name="credit_hours" required min="1">

        <label>Grade:</label>
        <input type="number" name="grade" required step="0.01" min="0" max="4">

        <label>Term:</label>
        <input type="text" name="term" required placeholder="e.g., Fall 2024">

        <button type="submit">Save</button>
    </form>
@endsection
