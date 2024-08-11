<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    public function registerUser($data)
    {
        $user = $this->createUser($data);
        $this->assignRole($user, 'user');
        return $user;
    }

    public function registerChef($data)
    {
        $user = $this->createUser($data);
        $this->assignChefDetails($user, $data);
        $this->assignRole($user, 'chef');
        return $user;
    }

    protected function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
        ]);
    }

    protected function assignRole($user, $roleName)
    {
        $role = Role::where('name', $roleName)->first();
        $user->roles()->attach($role);
    }

    protected function assignChefDetails($user, $data)
    {
        $user->update([
            'restaurant_name' => $data['restaurant_name'],
            'restaurant_address' => $data['restaurant_address'],
            'restaurant_city' => $data['restaurant_city'],
            'restaurant_state' => $data['restaurant_state'],
            'specialty' => $data['specialty'],
            'experience' => $data['experience'],
        ]);
    }
}
