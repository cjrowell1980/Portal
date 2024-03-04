<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-role',
            'edit-role',
            'delete-role',
            'create-status',
            'edit-status',
            'delete-status',
            'create-customer',
            'edit-customer',
            'delete-customer',
            'create-machines',
            'edit-machines',
            'delete-machines',
            'create-jobs',
            'edit-jobs',
            'delete-jobs',
            'create-engineers',
            'edit-engineers',
            'delete-engineers',
            'edit-settings',
        ]);
    }
}
