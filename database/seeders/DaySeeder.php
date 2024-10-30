<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;
use App\Models\Trip;

class DaySeeder extends Seeder
{
    public function run()
    {
        $tripIds = Trip::pluck('id')->toArray();

        $days = [
            ['trip_id' => $tripIds[0], 'date' => '2024-08-28'],
            ['trip_id' => $tripIds[0], 'date' => '2024-08-29'],
            ['trip_id' => $tripIds[1], 'date' => '2024-09-01'],
            ['trip_id' => $tripIds[1], 'date' => '2024-09-02'],
            ['trip_id' => $tripIds[2], 'date' => '2024-10-03'],
            ['trip_id' => $tripIds[2], 'date' => '2024-10-04'],
            ['trip_id' => $tripIds[3], 'date' => '2025-01-05'],
        ];

        foreach ($days as $dayData) {
            Day::create($dayData);
        }
    }
}