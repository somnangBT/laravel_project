<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Major;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Create Students
        $student1 = Student::create(['name' => 'John Doe', 'email' => 'john@example.com']);
        $student2 = Student::create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);

        // Assign Majors to Students
        $student1->majors()->attach([1]); // Assign Computer Science to John
        $student2->majors()->attach([2]); // Assign Business Administration to Jane
    }
}