<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'applicants', 'email' => 'applicants@example.com', 'password' => bcrypt('applicants'), 'role_id' => 4]);
        User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('admin'), 'role_id' => 1]);
        User::create(['name' => 'marketing', 'email' => 'marketing@example.com', 'password' => bcrypt('marketing'), 'role_id' => 2]);
        User::create(['name' => 'finance', 'email' => 'finance@example.com', 'password' => bcrypt('finance'), 'role_id' => 3]);
        User::create(['name' => 'user', 'email' => 'user@example.com', 'password' => bcrypt('user'), 'role_id' => 5]);
    }

}
