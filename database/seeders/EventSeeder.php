<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'title' => 'FISIB FACE 2024',
                'event_date' => '2024-12-14',
                'location' => 'SENTUL OTOPARK BELKLO | Jl. Sentul',
                'price' => 25000,
                'image' => 'assets/tiket1.png'
            ],
            [
                'title' => 'DAYAK NITE',
                'event_date' => '2024-11-09',
                'location' => 'Auditorium Driyarkara | DRIYARKARA',
                'price' => 20000,
                'image' => 'assets/tiket2.png'
            ],
            // ... tambahkan data event lainnya
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}