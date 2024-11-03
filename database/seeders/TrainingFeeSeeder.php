<?php

namespace Database\Seeders;

use App\Models\TrainingFee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TrainingFee::factory()->count(3)->create();
    }
}
