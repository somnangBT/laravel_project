<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    public function run()
    {
        $majors = ['Information Technology', 'Education'];

        foreach ($majors as $majorName) {
            Major::firstOrCreate(['name' => $majorName]);
        }
    }
} 
