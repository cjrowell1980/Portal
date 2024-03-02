<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name'  => 'Super Admin',
            'email' => 'admin@admin.admin',
            'password'  => Hash::make('Assail78'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'c.j.rowell@sky.com',
            'password'  => Hash::make('Assail78'),
        ]);
        $admin->assignRole('Admin');
    }
}
