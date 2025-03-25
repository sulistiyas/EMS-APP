<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'id_user' => 1,
            'id_department' => 3,
            'id_position' => 1,
            'name' => 'Admin',
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1'
        ]);
    }
}
