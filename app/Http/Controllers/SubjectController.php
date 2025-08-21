<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
   public function index()
{
    // Fetch all subjects
    $subjects = Subject::all();

    // Debugging: Check if subjects are being fetched correctly
   // dd($subjects);

    // Pass subjects to the view
    return view('subjects.index', compact('subjects'));
}

}