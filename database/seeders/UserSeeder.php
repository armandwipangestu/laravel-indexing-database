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
        $randomCount = random_int(1000, 3000);
        $users = User::factory($randomCount)->create();

        $roles = Role::all();
        $permissions = Permission::all();

        foreach ($users as $user) {
            $user->roles()->attach($roles->random()->id);
            $user->permissions()->attach($permissions->random()->id);
        }
    }
}
