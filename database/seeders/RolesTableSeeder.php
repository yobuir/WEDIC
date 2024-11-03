<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['id'=>1,'name' => 'admin']);
        Role::create(['id'=>2,'name' => 'marketing']);
        Role::create(['id' => 3, 'name' => 'finance']);
        Role::create(['id' => 4, 'name' => 'applicants']);
        Role::create(['id' => 5, 'name' => 'user']);
    }
}
