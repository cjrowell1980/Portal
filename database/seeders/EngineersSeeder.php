<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Engineers;
use Illuminate\Database\Seeder;

class EngineersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Engineers::create([
            'name'      => 'Chris Rowell',
            'email'     => 'c.j.rowell@sky.com',
            'mobile'    => '07508 448 120',
            'invoice'   => 'APS',
            'Shipping'  => 'APS',
        ]);
    }
}
