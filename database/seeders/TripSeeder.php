<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    public function run()
    {
        Trip::query()->delete();

        $trips = [
            [
                'name' => 'Viaggio in  Grecia',
                'description' => 'Un meraviglioso viaggio attraverso la Grecia.',
                'image_path' => 'images/GgxYdx5yEiEpRvxgcDP3Me3usgyea4aqAV4f3xLC.jpg',
            ],
            [
                'name' => 'Viaggio in Italia',
                'description' => 'Esplora le meraviglie dell\'Italia.',
                'image_path' => 'images/7R6QbJ3XXtkFjW9aE0Sj085b1lMkHJLHM3u90mzO.jpg',
            ],
            [
                'name' => 'Viaggio in Guatemala',
                'description' => 'Scopri le bellezze naturali e culturali del Guatemala.',
                'image_path' => 'images/PV8EqF8mw65lgiJlVI4ZJSKUOHXhXUFe6aJMBt6n.jpg',
            ],
            [
                'name' => 'Viaggio in Africa',
                'description' => 'Un\'avventura nel deserto del Sahara.',
                'image_path' => 'images/kBx4ydhBnmmkk6vUxbO5jr503jZYgdNRdhlCiQpS.jpg',
            ],
        ];

        foreach ($trips as $tripData) {
            Trip::create($tripData); 
        }
    }
}