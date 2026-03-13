<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Students Registrar System',
            'description' => 'A comprehensive system for managing student enrollments, records, and profiles.',
            'technology' => 'PHP, Laravel, Vue.js' ,// <--- Add this line
           'github_link' => 'https://github.com/amanbir21/my-portfolio'
        ]);

        Project::create([
            'title' => 'Attendance System with Biometric Signature & GPS',
            'description' => ' secure attendance tracking application featuring geofencing (GPS) to verify user location and digital signature capture for identity verification.',
            'technology' => 'PHP, Laravel, Vue.js, GPS API',// <--- Add this line
            'github_link' => 'https://github.com/amanbir21/my-portfolio'
        ]);
    }
}
