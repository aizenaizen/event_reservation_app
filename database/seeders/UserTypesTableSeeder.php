<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'type' => 'God'
            ],
            [
                'type' => 'Admin'
            ],
            [
                'type' => 'Organizer'
            ],
            [
                'type' => 'User'
            ]
        ];

        foreach ($types as $type) {
            UserType::create($type);
        }
    }
}
