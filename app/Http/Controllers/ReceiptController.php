<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Receipt;
use App\Models\Student; 
use App\Models\Major;    
use Illuminate\Http\Request;
use mPDF;
class ReceiptController extends Controller
{
    public function downloadReceipt($student_id)
{
    try {
        $student = Student::with('major')->findOrFail($student_id);
        $pdf = PDF::loadView('students.receipt', ['student' => $student]);
        return $pdf->download("receipt_{$student->name}.pdf");
    } catch (\Exception $e) {
        // Handle the error, e.g., log the error and show a message
        return response()->json(['error' => 'Student not found'], 404);
    }
}

}