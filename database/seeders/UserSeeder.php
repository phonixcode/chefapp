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
        $chefs = [
            [
                'name' => 'John Delaney',
                'email' => 'j.delaney@delaneycuisine.com',
                'restaurant_name' => 'The Golden Plate',
                'restaurant_address' => '123 Culinary Lane',
                'restaurant_city' => 'New York',
                'restaurant_state' => 'New York',
                'specialty' => 'Contemporary American Cuisine',
                'experience' => 'Over 15 years, known for innovative fusion dishes and modern American flavors',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Sophia Marchetti',
                'email' => 's.marchetti@marchettis.com',
                'restaurant_name' => 'La Dolce Vita',
                'restaurant_address' => '456 Roma Street',
                'restaurant_city' => 'San Francisco',
                'restaurant_state' => 'California',
                'specialty' => 'Italian Cuisine',
                'experience' => '20+ years, renowned for traditional Italian dishes with a modern twist',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Miguel Alvarez',
                'email' => 'm.alvarez@alvarezgrill.com',
                'restaurant_name' => 'El Sabor de la Tierra',
                'restaurant_address' => '789 Fiesta Avenue',
                'restaurant_city' => 'Miami',
                'restaurant_state' => 'Florida',
                'specialty' => 'Latin American Cuisine',
                'experience' => 'Over 18 years, celebrated for authentic Latin American flavors and vibrant, bold dishes',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Olivia Hartman',
                'email' => 'o.hartman@hartmangarden.com',
                'restaurant_name' => 'The Garden Bistro',
                'restaurant_address' => '101 Greenway Drive',
                'restaurant_city' => 'Seattle',
                'restaurant_state' => 'Washington',
                'specialty' => 'Farm-to-Table, Organic Cuisine',
                'experience' => '12+ years, dedicated to sustainable, organic, and locally sourced ingredients',
                'password' => bcrypt('password'),
            ]
        ];
        
        foreach ($chefs as $chef) {
            $user = User::create($chef);
            $role = Role::where('name', 'chef')->first();
            $user->roles()->attach($role);
        }        
    }
}
