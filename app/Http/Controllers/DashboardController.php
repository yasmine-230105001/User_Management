<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $averageGPA = Grade::avg('grade') ?? 0;
        $users = User::paginate(10);
        $grades = Grade::with('user')->paginate(10);

        return view('dashboard', compact('totalUsers', 'averageGPA', 'users', 'grades'));
    }
}

