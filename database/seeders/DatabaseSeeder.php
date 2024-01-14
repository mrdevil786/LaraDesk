<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'user_role' => '1',
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin'),
        //     'status' => 'active',
        // ]);

        // Create an Admin user
        User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
                'user_role' => '1', // '1' represents the Admin role
                'name' => 'Admin',
                'password' => Hash::make('admin'),
                'status' => 'active',
            ]
        );

        // Create an Editor user
        User::updateOrCreate(
            [
                'email' => 'manager@gmail.com',
                'user_role' => '2', // '2' represents the Editor role
                'name' => 'Manager',
                'password' => Hash::make('admin'),
                'status' => 'active',
            ]
        );

        // Create a Viewer user
        User::updateOrCreate(
            [
                'email' => 'member@gmail.com',
                'user_role' => '3', // '3' represents the Viewer role
                'name' => 'Member',
                'password' => Hash::make('admin'),
                'status' => 'active',
            ]
        );
    }
}
