<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory()->count(10)->create([
            'organizer_id' => 1,
            'attendees' => 2,
            'event_date' => date('Y-m-d H:i:s', strtotime('+1 day', time()))
        ]);
    }
}
