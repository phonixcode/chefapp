<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin#1234'),
        ]);

        // Assign a role to the admin
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Create a regular user
        $user = User::create([
            'name' => 'Veronica Umar',
            'email' => 'vero.user@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign a role to the user
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role);

        // Create a chef user
        $user = User::create([
            'name' => 'Chef Vero1',
            'email' => 'vero1.chef@example.com',
            'password' => bcrypt('password'),
            'photo' => 'team-1.jpg'
        ]);

        // Assign a role to the user
        $role = Role::where('name', 'chef')->first();
        $user->roles()->attach($role);

        $user = User::create([
            'name' => 'Chef Vero2',
            'email' => 'vero2.chef@example.com',
            'password' => bcrypt('password'),
            'photo' => 'team-2.jpg'
        ]);

        // Assign a role to the user
        $role = Role::where('name', 'chef')->first();
        $user->roles()->attach($role);

        $user = User::create([
            'name' => 'Chef Vero3',
            'email' => 'vero3.chef@example.com',
            'password' => bcrypt('password'),
            'photo' => 'team-3.jpg'
        ]);

        // Assign a role to the user
        $role = Role::where('name', 'chef')->first();
        $user->roles()->attach($role);

        $user = User::create([
            'name' => 'Chef Vero4',
            'email' => 'vero4.chef@example.com',
            'password' => bcrypt('password'),
            'photo' => 'team-4.jpg'
        ]);

        // Assign a role to the user
        $role = Role::where('name', 'chef')->first();
        $user->roles()->attach($role);
    }
}
