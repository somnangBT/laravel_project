<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
class StudentController extends Controller
{
public function index()
{
    // Fetch all students with their related major and subjects
    $students = Student::with('major', 'subjects')->get();

    // Fetch all subjects
    $majors = Major::all();

    // Return the view with students and subjects
    return view('students.index', compact('students', 'majors'));
}


// In your StudentController



public function create()
{
    $majors = Major::all();        // Get all majors
    $subjects = Subject::all();    // Get all subjects

    return view('students.create', compact('majors', 'subjects'));
}



public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'major_id' => 'required|exists:majors,id',
            'date_of_birth' => 'required|date',
        ]);

        // Create the student
        $student = Student::create($validated); // Directly use validated data

        // Get all subjects under the selected major
        $subjects = Subject::where('major_id', $validated['major_id'])->pluck('id');

        // Attach those subjects to the student
        $student->subjects()->attach($subjects);

        // Redirect to the student list page with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

// StudentController.php
// In StudentController.php
// In StudentController.php
// Show the edit form (GET request)
public function edit($id)
{
    $student = Student::with('major', 'subjects')->findOrFail($id);
    $majors = Major::all();
    $allSubjects = Subject::all();

    return view('students.edit', compact('student', 'majors', 'allSubjects'));
}

// Update the student (PUT request)

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // Update student info
    $student->name = $request->name;
    $student->email = $request->email;
    $student->date_of_birth = $request->date_of_birth;
    $student->major_id = $request->major_id;
    $student->save();

    // Automatically assign subjects from the new major
    $major = Major::with('subjects')->find($request->major_id);
    if ($major) {
        $subjectIds = $major->subjects->pluck('id')->toArray();
        $student->subjects()->sync($subjectIds); // This will update the student's subjects
    }

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}

public function destroy($id)
{
    $student = Student::find($id);
    if ($student) {
        $student->delete(); // Delete the student record
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    } else {
        return redirect()->route('students.index')->with('error', 'Student not found');
    }
}

 public function show($id)
    {
        $student = Student::findOrFail($id);  // Get the student by 'id'
        return view('students.show', compact('student'));
    }



    public function progress()
    {
        // Total number of majors
        $totalMajors = Major::count();

        // Total number of subjects
        $totalSubjects = Subject::count();

        // Total number of students
        $totalStudents = Student::count();

        // Students by major with student count
        $studentsByMajor = Major::withCount('students')->get();

        // Subjects by major with subject count
        $subjectsByMajor = Major::withCount('subjects')->get();

        // Prepare managerData for chart
        $managerData = $studentsByMajor->map(function ($major) {
            return [
                'name' => $major->name,
                'count' => $major->students_count,
            ];
        });

        // Return the view with all the necessary data
        return view('students.progress', compact(
            'totalMajors', 'totalSubjects', 'totalStudents', 'studentsByMajor', 'subjectsByMajor', 'managerData'
        ));
    }
}



