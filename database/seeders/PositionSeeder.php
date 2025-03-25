<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['name' => 'HR Manager',       'id_department' => '1'],
            ['name' => 'HR Assistant',     'id_department' => '1'],
            ['name' => 'Accountant',       'id_department' => '2'],
            ['name' => 'Financial Analyst','id_department' => '2'],
            ['name' => 'IT Support',       'id_department' => '3'],
            ['name' => 'Software Engineer','id_department' => '3'],
            ['name' => 'Marketing Lead',   'id_department' => '4'],
            ['name' => 'Sales Executive',  'id_department' => '5'],
        ];

        
        Position::insert($positions);
    }
}
