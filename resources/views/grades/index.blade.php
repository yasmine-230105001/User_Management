@extends('layouts.app')

@section('content')
    <h2>My Grades</h2>
    @foreach ($grades as $term => $termGrades)
        <h3>{{ $term }}</h3>
        <table border="1">
            <tr>
                <th>Course</th>
                <th>Code</th>
                <th>Credit Hours</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
            @foreach ($termGrades as $grade)
                <tr>
                    <td>{{ $grade->course_name }}</td>
                    <td>{{ $grade->course_code }}</td>
                    <td>{{ $grade->credit_hours }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>
                        <a href="{{ route('grades.edit', $grade->id) }}">Edit</a> |
                        <form method="POST" action="{{ route('grades.destroy', $grade->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this grade?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <h2>Cumulative CGPA: {{ round($cumulativeCGPA, 2) }}</h2>
        <h2>Cumulative Credit Hours: {{ $cumulativeCH }}</h2>

        @foreach ($grades as $term => $termGrades)
            <h3>{{ $term }} (Total CH: {{ $termGrades->totalCH }}, GPA: {{ $termGrades->termGPA }})</h3>
        @endforeach

    @endforeach
@endsection
