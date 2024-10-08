<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $roles = Role::all();
        $permissions = Permission::all();

        foreach ($users as $user) {
            $user->roles()->attach($roles->random()->id);
            $user->permissions()->attach($permissions->random()->id);
        }
    }
}
