<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::factory(5)->create();

        $permissions = Permission::all();

        foreach ($roles as $role) {
            $role->permissions()->attach(
                $permissions->random(rand(1, 5))->pluck('id')->toArray()
            );
        }
    }
}
