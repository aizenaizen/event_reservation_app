<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $user_type = new UserType;
        
        $user = User::create([
            'name' => 'Organizer Organizer',
            'email' => 'org@org.org',
            'password' => bcrypt('password'),
            'user_type_id' => $user_type->getTypeId('Organizer')
        ]);

        $user = User::create([
            'name' => 'User User',
            'email' => 'user@user.user',
            'password' => bcrypt('password'),
            'user_type_id' => $user_type->getTypeId('User')
        ]);

        User::factory()->count(3)->create([
            'user_type_id' => $user_type->getTypeId('User')
        ]);

    }
}
