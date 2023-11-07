<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Shanmuga\LaravelEntrust\Models\EntrustRole;


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
            'name' => 'demianz',
            'email' => 'user@rpg.game',
            'password' => Bcrypt('administrator'),
            'current_team_id' => 3,
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
        //user management permissions
        $permission=\App\Models\Permission::create([
            'name' => 'user_create',
            'display_name' => 'User Create',
            'description' => 'enables the ability to create new users',
        ]);
        
        
        $permission=\App\Models\Permission::create([
            'name' => 'user_update',
            'display_name' => 'User update',
            'description' => 'enables the ability to update users',
        ]);
        
        $permission=\App\Models\Permission::create([
            'name' => 'user_delete',
            'display_name' => 'team delete',
            'description' => 'enables the ability to delete users',
        ]);
        
        $permission=\App\Models\Permission::create([
            'name' => 'team_create',
            'display_name' => 'team Create',
            'description' => 'enables the ability to create new teams',
        ]);
      
        $permission=\App\Models\Permission::create([
            'name' => 'team_update',
            'display_name' => 'team update',
            'description' => 'enables the ability to update teams',
        ]);
        
        $permission=\App\Models\Permission::create([
            'name' => 'team_delete',
            'display_name' => 'team delete',
            'description' => 'enables the ability to delete teams',
        ]);
       
        $role=\App\Models\Permission::create([
            'name' => 'manage_team_members',
            'display_name' => 'manage team members',
            'description' => 'enables the ability to add or delete team members',
        ]);
    //finds and gives all permissions to DEV role  
        $role=\App\Models\Role::find(1)->permissions()->sync(\App\Models\Permission::all());
       
    }
}
