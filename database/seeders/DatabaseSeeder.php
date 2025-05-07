<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'superAdmin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'karyawan', 'guard_name' => 'web']);

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123')
        ]);


        $admin =  User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123')
        ]);

        $karyawan =  User::create([
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123')
        ]);

        $superAdmin->assignRole('superAdmin');
        $admin->assignRole('admin');
        $karyawan->assignRole('karyawan');
    }
}
