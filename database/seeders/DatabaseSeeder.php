<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        //dev User creation
        \App\Models\User::factory()->create([
            'name' => 'Dev',
            'email' => 'admin@rpg.game',
            'password' => Bcrypt('administrator'),
            'current_team_id' => 1,
        ]);
        //dev Team creation
        \App\Models\Team::factory()->create([
            'name' => 'Developer',
            'user_id' => 1,
            'personal_team' => true,
        ]);
        //dev Role creation
        \App\Models\Role::factory()->create([
            'name' => 'DEV',
            'display_name' => 'Developer',
            'description' => 'Developer',
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'Admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator',
        ]);
        $role=\App\Models\Role::create([
            'name' => 'User',
            'display_name' => 'User',
            'description' => 'User',
        ]);
        $user=\App\Models\User::find(1);
        $user->attachRole(1);
        
    }
}
