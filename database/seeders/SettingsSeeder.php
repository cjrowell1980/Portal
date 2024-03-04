<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = Settings::create([
            'status_1'  => 5,
            'status_2'  => 8,
            'status_3'  => 12,
            'status_4'  => 15,
        ]);
    }
}
