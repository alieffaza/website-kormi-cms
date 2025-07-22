<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder user admin dan role admin
        $adminRole = \App\Models\Role::firstOrCreate(['name' => 'admin']);
        $admin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@kormikaltim.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'is_active' => 1,
                'phone' => '08123456789'
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        // Seeder user admin baru
        \App\Models\User::updateOrCreate(
            [ 'email' => 'admin@kormi.test' ],
            [
                'name' => 'Admin KORMI',
                'email' => 'admin@kormi.test',
                'phone' => '08123456789',
                'password' => bcrypt('password'),
                'is_active' => true,
            ]
        );
        $admin = \App\Models\User::where('email', 'admin@kormi.test')->first();
        if ($admin) {
            $role = \App\Models\Role::where('name', 'admin')->first();
            if ($role && !$admin->roles()->where('name', 'admin')->exists()) {
                $admin->roles()->attach($role->id);
            }
        }

        // Seeder roles
        Role::firstOrCreate(['name' => 'editor']);
        Role::firstOrCreate(['name' => 'user']);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
