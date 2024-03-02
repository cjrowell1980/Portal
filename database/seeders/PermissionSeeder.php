<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',

            'create-user',
            'edit-user',
            'delete-user',

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
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name'  => $permission,
            ]);
        }
    }
}
