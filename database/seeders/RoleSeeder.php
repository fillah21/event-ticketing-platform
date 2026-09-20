<?php

namespace Database\Seeders;

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
        $roles = [
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'vendor', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
            ['name' => 'owner', 'guard_name' => 'web'],
            ['name' => 'member', 'guard_name' => 'web'],
            ['name' => 'event_manager', 'guard_name' => 'web'],
            ['name' => 'staff', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}
