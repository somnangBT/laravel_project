<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Major;
use App\Models\StudentClass;
use App\Models\Subject;
class showContainer extends Controller
{
 
// filepath: c:\xampp\htdocs\week1\app\Http\Controllers\showContainer.php
 public function showContainer()
    {
        // Get the data for students created per month
        $students = Student::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        // Prepare data for all months
        $monthData = collect(range(1, 12))->mapWithKeys(function ($month) use ($students) {
            $studentCount = $students->where('month', $month)->first()->count ?? 0;
            return [$month => $studentCount];
        });

        // Calculate the average number of students created per month
        $average = $monthData->avg();

        // Return the view with the students and average data
        return view('students.container', compact('monthData', 'average'));
    }

}