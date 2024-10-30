<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stop;
use App\Models\Day;

class StopSeeder extends Seeder
{
    public function run()
    {
        // Recupera gli ID dei giorni esistenti
        $dayIds = Day::pluck('id')->toArray();

        // Abbastanza giorni
        if (count($dayIds) < 7) {
            throw new \Exception('Non ci sono abbastanza giorni nel database per associare le fermate.');
        }

        // Crea le fermate associando ogni giorno alle fermate desiderate
        $stops = [
            // Associa ogni fermata a un giorno specifico
            ['day_id' => $dayIds[0], 'location' => 'Atene', 'latitude' => 37.9838, 'longitude' => 23.7275],
            ['day_id' => $dayIds[1], 'location' => 'Plaka', 'latitude' => 37.9643, 'longitude' => 23.9991],
            ['day_id' => $dayIds[2], 'location' => 'Roma', 'latitude' => 41.9028, 'longitude' => 12.4964],
            ['day_id' => $dayIds[3], 'location' => 'Firenze', 'latitude' => 43.7696, 'longitude' => 11.2558],
            ['day_id' => $dayIds[4], 'location' => 'Città del Guatemala', 'latitude' => 14.6349, 'longitude' => -90.5069],
            ['day_id' => $dayIds[5], 'location' => 'Antigua', 'latitude' => 14.5507, 'longitude' => -90.7338],
            ['day_id' => $dayIds[6], 'location' => 'Marrakech', 'latitude' => 31.6295, 'longitude' => -7.9811],
        ];

        // Crea i record per le fermate nel database
        foreach ($stops as $stopData) {
            Stop::create($stopData);
        }
    }
}
