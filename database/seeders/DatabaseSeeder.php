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
            'email' => 'dev@rpg.game',
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
        //admin User creeation
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@rpg.game',
            'password' => Bcrypt('administrator'),
            'current_team_id' => 2,
        ]);
        //admin Team creation
        \App\Models\Team::factory()->create([
            'name' => 'Admin',
            'user_id' => 2,
            'personal_team' => true,
        ]);
        //admin Role creation
        \App\Models\Role::factory()->create([
            'name' => 'Admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator',
        ]);
        //user User creation
        \App\Models\User::factory()->create([
            'name' => 'Dev',
            'email' => 'user@rpg.game',
            'password' => Bcrypt('administrator'),
            'current_team_id' => 1,
        ]);
        //user Team creation
        \App\Models\Team::factory()->create([
            'name' => 'Developer',
            'user_id' => 1,
            'personal_team' => true,
        ]);
        //user Role creation
        $role=\App\Models\Role::create([
            'name' => 'User',
            'display_name' => 'User',
            'description' => 'User',
        ]);
        for($x=0;$x<3;$x++){
            $user=\App\Models\User::find($x+1);
            $user->attachRole($x+1);
        }
        
        
    }
}
