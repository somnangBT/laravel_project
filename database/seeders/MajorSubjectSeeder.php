<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Subject;

class MajorSubjectSeeder extends Seeder
{
    public function run()
    {
        // Create Majors
        $major1 = Major::firstOrCreate(['name' => 'Information Technology']);
        $major2 = Major::firstOrCreate(['name' => 'Education']);

        // Create Subjects for Information Technology
        $itSubjects = [
            'Programming',
            'Data Structures',
            'Networking',
            'Database Management',
            'Cybersecurity',
        ];

        // Create Subjects for Education
        $educationSubjects = [
            'Teaching Methods',
            'Curriculum Design',
            'Educational Psychology',
            'Classroom Management',
            'Assessment Strategies',
        ];

        // Insert subjects into the database and attach them to the majors
        foreach ($itSubjects as $subjectName) {
            // Check if the subject already exists
            $subject = Subject::firstOrCreate(['name' => $subjectName]);

            // Attach the subject to the major, but avoid duplicates using syncWithoutDetaching
            $major1->subjects()->syncWithoutDetaching($subject->id);
        }

        foreach ($educationSubjects as $subjectName) {
            // Check if the subject already exists
            $subject = Subject::firstOrCreate(['name' => $subjectName]);

            // Attach the subject to the major, but avoid duplicates using syncWithoutDetaching
            $major2->subjects()->syncWithoutDetaching($subject->id);
        }
    }
}
