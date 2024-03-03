<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Engineers;
use App\Models\Jobs;
use App\Models\Machines;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engineer = Engineers::create([
            'name'      => 'Chris Rowell',
            'email'     => 'c.j.rowell@sky.com',
            'mobile'    => '07508 448 120',
            'invoice'   => 'APS',
            'Shipping'  => 'APS',
        ]);
        $customer = Customers::create([
            'name'      => 'APS Stock Machine',
            'syrinx'    => 'APSSTOCK',
        ]);
        $machine = Machines::create([
            'stock'     => '804/0001',
            'serial'    => 'LWJAZ140AN0730012',
            'make'      => 'LGMG',
            'model'     => 'AR14J',
            'yom'       => '2023',
            'customer'  => $customer->id,
        ]);
        $job = Jobs::create([
            'machine'   => $machine->id,
            'number'    => rand(10000, 99999),
            'fault'     => 'its proper broken!',
            'address'   => 'somewhere',
            'contactName'   => 'someone',
            'contactNo'     => '01480 891 251',
            'engineer'      => $engineer->id,
            'status'        => true,
        ]);
    }
}
