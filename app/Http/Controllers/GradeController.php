<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::where('user_id', auth()->id())
            ->orderBy('term', 'desc')
            ->get()
            ->groupBy('term');
    
        $cumulativeCH = 0;
        $cumulativePoints = 0;
    
        foreach ($grades as $term => $termGrades) {
            $termCH = $termGrades->sum('credit_hours');
            $termGPA = $termGrades->sum(fn($g) => $g->grade * $g->credit_hours) / max(1, $termCH);
    
            // Update cumulative values
            $cumulativeCH += $termCH;
            $cumulativePoints += $termGPA * $termCH;
    
            // Store per-term values
            $grades[$term]->totalCH = $termCH;
            $grades[$term]->termGPA = round($termGPA, 2);
        }
    
        // Calculate Cumulative CGPA
        $cumulativeCGPA = $cumulativePoints / max(1, $cumulativeCH);
    
        return view('grades.index', compact('grades', 'cumulativeCH', 'cumulativeCGPA'));
    }
    

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:grades',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|numeric|between:0,4',
            'term' => 'required'
        ]);

        Grade::create([
            'user_id' => auth()->id(),
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'credit_hours' => $request->credit_hours,
            'grade' => $request->grade,
            'term' => $request->term,
        ]);

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:grades,course_code,' . $grade->id,
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|numeric|between:0,4',
            'term' => 'required'
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
