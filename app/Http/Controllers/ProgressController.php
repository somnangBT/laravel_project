<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Major;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function progress()
    {
        // Fetch the count of students for each major
        $majorData = Student::select('majors.name', DB::raw('COUNT(*) as count'))
            ->join('majors', 'students.major_id', '=', 'majors.id')
            ->whereIn('majors.name', ['Computer Science', 'Electrical'])
            ->groupBy('majors.name')
            ->get();

        return view('students.progress', compact('majorData'));
    }
}