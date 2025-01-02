<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        Role::create([
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'Staff',
        ]);

        Role::create([
            'name' => 'Candidate',
        ]);

        Permission::create([
            'name' => 'add_user',
        ]);

        Permission::create([
            'name' => 'view_user',
        ]);
    }
}
